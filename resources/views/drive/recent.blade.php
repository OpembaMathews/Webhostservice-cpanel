@include('drive.layouts.header')
    @include('drive.layouts.topbar')
        @include('drive.layouts.sidebar')
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title"><i class="mdi mdi-folder-clock-outline" style="margin: 0 10px 0 3px;"></i>Recent Files ({{$count_recent}})</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            @foreach($data as $d)
                            <div class="col-sm-6 col-lg-2">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" alt="Card image cap">
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a" title="{{$d->name}}">{{substr($d->name,0,20)}}</span>
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">
                                                    <!-- <a class="dropdown-item" href="#">View</a> -->
                                                    <a class="dropdown-item" href="{{url('drive/download/'.$d->path)}}">Download</a>
                                                    <a class="dropdown-item" href="#" onclick="moveToTrash(this);" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{$d->path}}" data-id="{{$d->id}}">Move to trash</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this);" data-toggle="modal" data-target=".delete-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}">Delete</a>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endforeach

                        </div>
                        
                    </div> 
                    <!-- end container-fluid -->
                </div> 
                <!-- end content -->

                @include('drive.layouts.footer')
            </div>
        </div>

        @include('drive.layouts.upload')

        <!-- confirm move to trash -->
        <div class="modal fade move-to-trash-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #e51c4a;">
                        <h5 class="modal-title" style="color: #ffffff !important">Want to move file to trash?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <div class="response"></div>
                        <img src="" style="width: 300px; height: auto; border-radius: .25rem" class="trash-file">
                        <form class="move-to-trash-form">
                            <input type="hidden" name="trash_id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn waves-effect waves-light" style="background-color: #e51c4a;" onclick="confirmMoveToTrash(this);">
                            <strong>Move</strong>
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- confirm delete file -->
        <div class="modal fade delete-file-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
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

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #e51c4a;">
                        <h5 class="modal-title" style="color: #ffffff !important">Want to delete this file?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <div class="response"></div>
                        <img src="" style="width: 300px; height: auto; border-radius: .25rem" class="trash-file">
                        <form class="delete-file-form">
                            <input type="hidden" name="trash_id">
                            <input type="hidden" name="trash_file">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn waves-effect waves-light" style="background-color: #e51c4a;" onclick="confirmDeleteFile(this);">
                            <strong>Delete</strong>
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        @include('drive.scripts.index')
    </body>
<html>