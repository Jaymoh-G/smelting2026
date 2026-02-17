<div class="row">
    <div class="col-md-6">
        @if(Session::has('flash_message'))
            <div class="alert alert-micro alert-border-left alert-success pastel alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info pr10"></i>
                {!! session('flash_message') !!}
            </div>
        @endif
    </div>
</div>
