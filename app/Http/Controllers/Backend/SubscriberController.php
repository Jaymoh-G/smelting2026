<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use App\Utilities\StaticFunctions as SF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubscriberController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
        $page_title = env('SITE_NAME') . ' - All Subscribers';
        $section_title = 'All Subscribers';

        $data = [
            'page_title'        => $page_title,
            'section_title'     => $section_title
        ];

        if ($request->ajax()) {

            $model = $this->getSubscribersData();
            return  DataTables::eloquent($model)
                ->filter(function ($query) {
                    /*if (request()->has('name')) {
                        $query->where('name', 'like', "%" . request('name') . "%");
                    }
                    if (request()->has('contact_number')) {
                        $query->where('contact_number', 'like', "%" . request('contact_number') . "%");
                    }
                    if (request()->has('digester_size_name')) {
                        $query->where('digester_size_name', 'like', "%" . request('digester_size_name') . "%");
                    }
                    if (request()->has('initial_loan_amount')) {
                        $query->where('initial_loan_amount', 'like', "%" . request('initial_loan_amount') . "%");
                    }
                    if (request()->has('current_loan_amount')) {
                        $query->where('current_loan_amount', 'like', "%" . request('current_loan_amount') . "%");
                    }
                    if (request()->has('agreed_monthly_amount')) {
                        $query->where('agreed_monthly_amount', 'like', "%" . request('agreed_monthly_amount') . "%");
                    }*/

                })
                /*->addColumn('subtable_id', function($debt) {
                    return $debt->id;
                })
                ->addColumn('comments', function($debt) {

                    $comments =  DebtComment::where('debt_id', $debt->id)->pluck('comment');
                    $comment_str = "";
                    foreach ($comments as $comment){
                        $comment_str .= $comment . "\r\n";
                    }
                    return nl2br($comment_str);
                })*/
                ->toJson();


        }

        return view("backend.subscribers.index", $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = SF::makeTitle('Subscribers', 'Create Subscriber');

        // Get digester sizes and sub types
        $data['subscriber_types'] = SubscriberType::all();
        $data['digester_sizes'] = DigesterSize::all();

        return view("admin.subscribers.create", $data);

    }

    public function createMember($id)
    {
        $group = Subscriber::find($id);
        $data = SF::makeTitle('Subscribers', 'Create Member ('.'Group: '.$group->name.')');
        $section_title = 'Members For Group - '.$group->name;
        $data['resource_id'] = $id;

        return view("admin.subscribers.create_member", $data);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $subscriber = Subscriber::findOrFail($id); //Get debt with specified id
        $data = SF::makeTitle('Subscribers', 'Edit/View Subscriber: '. $subscriber->name);

        $subscriber_types = SubscriberType::all();
        $digester_sizes = DigesterSize::all();
        // dd($subscriber);

        $data['resource'] = $subscriber;
        $data['digester_sizes'] = $digester_sizes;
        $data['subscriber_types'] = $subscriber_types;
        $is_group = false;
        $num_members = 0;
        if($subscriber->subscriber_type == 1){
            $is_group = true;
            $num_members = GroupMember::where('group_id', $id)->count();

        }
        $data['is_group']    = $is_group;
        $data['num_members'] = $num_members;

        return view("admin.subscribers.edit", $data);

    }

    public function viewMember($id)
    {

        $resource = GroupMember::findOrFail($id); //Get debt with specified id
        $data = SF::makeTitle('Subscribers', 'Edit/View Subscriber: '. $resource->name);

        $data['resource'] = $resource;
        $payments = NULL;

        $genders = [
            0 => 'MALE',
            1 => 'FEMALE'
        ];

        $data['payments'] = $payments;
        $data['genders'] = $genders;

        return view("admin.subscribers.edit_member", $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /**
         * This is just some tests
         */
        $form_data  = $request->all();
        $form_data  = $request->all();
        $form_data  = $request->all();

        $resource   = Subscriber::findOrFail($form_data['resource_id']);

        $digester   = DigesterSize::find($form_data['digester_size']);

        $resource->subscriber_type          = $form_data['subscriber_type'];
        $resource->name                     = $form_data['name'];
        $resource->digester_size            = $form_data['digester_size'];
        $resource->digester_size_name       = $digester->size;
        $resource->initial_loan_amount      = $digester->cost;
        $resource->current_loan_amount      = $digester->cost;
        $resource->agreed_monthly_amount    = $form_data['agreed_monthly_amount'];
        $resource->monthly_income           = $form_data['monthly_income'];
        $resource->contact_number           = $form_data['contact_number'];
        $resource->current_fuel_source      = $form_data['current_fuel_source'];

        if($resource->save()){
            $message = "Subscriber successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }

    }

    public function updateMember(Request $request)
    {
        $form_data  = $request->all();

        $resource   = GroupMember::findOrFail($form_data['resource_id']);

        $resource->member_name          = $form_data['member_name'];
        $resource->age                  = $form_data['age'];
        $resource->phone                = $form_data['phone'];
        $resource->gender               = $form_data['gender'];
        $resource->current_fuel_source  = $form_data['current_fuel_source'];

        if($resource->save()){
            $message = "Member successfully updated";
            $request->session()->flash('success', $message);
            return redirect()->back()->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSubscribersData(){
        $query = Subscriber::latest();

        return $query;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function getGroupMembers(Request $request, $id){

        $group = Subscriber::find($id);
        $page_title = env('SITE_NAME') . ' - Group Members';
        $section_title = 'Members For Group - '.$group->name;


        $data = [
            'page_title'        => $page_title,
            'section_title'     => $section_title,
            'resource_id'     => $id
        ];

        if ($request->ajax()) {
            $group_id = $id;
            $model = $this->getGroupMemberData($group_id);
            return  DataTables::eloquent($model)
                ->filter(function ($query) {
                    /*if (request()->has('member_name')) {
                        $query->where('member_name', 'like', "%" . request('member_name') . "%");
                    }
                    if (request()->has('phone')) {
                        $query->where('phone', 'like', "%" . request('phone') . "%");
                    }
                    if (request()->has('gender')) {
                        $query->where('gender', 'like', "%" . request('gender') . "%");
                    }
                    if (request()->has('age')) {
                        $query->where('age', 'like', "%" . request('age') . "%");
                    }
                    if (request()->has('current_fuel_source')) {
                        $query->where('current_fuel_source', 'like', "%" . request('current_fuel_source') . "%");
                    }*/

                })

                ->toJson();
        };
        return view("admin.subscribers.group_members", $data);

    }

    public function getGroupMemberData($group_id){
        $query = GroupMember::where('group_id', $group_id)->latest();

        return $query;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeMember(Request $request){
        $form_data = $request->all();

        $resource = GroupMember::create(
            [
                'group_id' => $form_data['resource_id'],
                'member_name' => $form_data['member_name'],
                'phone' => $form_data['phone'],
                'gender' => $form_data['gender'],
                'age' => $form_data['age'],
                'current_fuel_source' => $form_data['current_fuel_source'],

            ]
        );

        if($resource){
            $request->session()->flash('success', "Member successfully added");
            return redirect()->back()->withInput();
        }
    }

}
