<div class="modal fade password-control-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <style type="text/css">
        .upload-box {
            border: 2px dashed #e51c4a !important;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 54px 54px;
        }
        .dz-button{ font-weight: bold !important; font-size: 1.5em !important }
    </style>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e51c4a;">
                <h5 class="modal-title" style="color: #ffffff !important"><i class="mdi mdi-lock"></i> Password Control - <span class="media-title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
            </div>
            <div class="modal-body">
                <form class="password-control-form">
                    <div class="pwd-response"></div>
                    <div class="form-group">
                        <label class="pwd-title">Password</label>
                        <div class="input-group">
                            <input type="hidden" name="drive_id" class="drive-id">
                            <input type="password" name="password" class="form-control drive-password-input">

                            <span class="input-group-append">
                                <button type="button" id="copy-btn" class="btn btn-dark waves-effect waves-light" style="background-color: #e51c4a;" data-clipboard-action="copy" data-clipboard-target=".drive-url" onclick="addDrivePasswordControl(this)"><strong> Save</strong></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>