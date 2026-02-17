@if (Session::has('success'))
    <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        {{ Session::get('success') }}
        <p>You can now click <a href="{{route('roles.create')}}" class="partial_data_link bg-blue"> HERE </a>  to create some roles to which you will add users after they accept invites</p>
        <p><span class=" partial_data_link bg-blue">NOTE: </span>  The user will only appear on your list of users only after they accept the invite. After they appear on the list you should edit the record to assign them to a role.</p>
    </div>
@endif
@if (Session::has('failure'))
    <div class="alert alert-micro alert-border-left alert-danger pastel alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        {{ Session::get('failure') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-micro alert-border-left alert-warning pastel alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        {{ Session::get('warning') }}
    </div>
@endif
