<div class="modal fade" id="delete_resource" role="dialog">
    <div class="modal-dialog" role="">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-uppercase">Delete User</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="resource_uid" id="resource_uid">
                <p class="center">Are you sure you want to delete this user ? </p>
            </div>
            <div class="modal-footer">
{{--                <p class="ajax_status"><i class="fa fa-spinner fa-spin"></i><span></span></p>--}}
                <button type="button" class="btn btn-secondary modal_cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete_resource_yes" class="btn btn-warning">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
