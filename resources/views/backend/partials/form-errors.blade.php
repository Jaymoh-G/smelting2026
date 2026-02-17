<div class="row">
    <div class="col-md-6">
        @if($errors->any())
            <div class="alert alert-micro alert-border-left alert-danger pastel alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-exclamation-triangle pr10"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
