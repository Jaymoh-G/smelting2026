@if ($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-info pr10"></i>
        {{ Session::get('success') }}
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
