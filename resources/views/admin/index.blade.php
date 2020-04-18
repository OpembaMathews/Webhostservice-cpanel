@include('admin.layouts.header')
    @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
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
                                    <h4 class="page-title">
                                        <i class="mdi mdi-barcode-scan" style="margin: 0 10px 0 3px;"></i>Dashboard
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card-box tilebox-two">
                                    <i class="icon-people float-right text-muted"></i>
                                    <h6 class="text-success text-uppercase">Customers</h6>
                                    <h3><span data-plugin="counterup">{{$users_count}}</span></h3>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    <!-- end container-fluid -->
                </div> 
                <!-- end content -->

                @include('admin.layouts.footer')
            </div>
        </div>

       @include('admin.layouts.upload')

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

        @include('admin.scripts.index')
        
    </body>
<html>