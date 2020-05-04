<!-- upload file -->
<div class="modal fade upload-file-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
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
                <h5 class="modal-title" style="color: #ffffff !important">Upoad Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
            </div>
            <div class="modal-body">
                <div class="upload-response"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select a folder</label>
                            
                            <select class="form-control folder-select">
                                <option value="">-- option --</option>
                                @foreach($folder as $f)
                                <option value="{{$f->id}}">{{$f->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Password Control</label>
                            
                            <input type="password" name="password" class="drive-password form-control">
                        </div>
                    </div>
                </div>

                <form action="{{url('drive/create')}}" class="dropzone upload-box" id="my-awesome-dropzone">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>