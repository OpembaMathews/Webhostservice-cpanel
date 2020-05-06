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
                                    <h4 class="page-title"><i class="mdi mdi-trash-can-outline" style="margin: 0 10px 0 3px;"></i>Trash <small>({{$count_trash}})</small></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <h6><i class="mdi mdi-folder-information-outline"></i> Files that have been in Trash more than 7 days will be automatically deleted.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row default-files-trash">
                            @foreach($data[1] as $f)
                            <div class="col-sm-6 col-lg-2">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset('img/folder.jpg')}}" alt="Card image cap">
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$f->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$f->name}}">
                                                {{strlen($f->name) > 15 ? substr($f->name,0,14).'...' : $f->name}} <small>({{$f->count}})</small>
                                            </span><br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($f->created_at,'M d, Y h:i A')}}
                                            </small>
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">
                                                    
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/folder.jpg')}}" data-id="{{$f->id}}" title="{{$f->name}}" onclick="restoreFile(this,'folder');">Restore</a>
                                                    <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFolder(this,'folder');" data-toggle="modal" data-target=".delete-folder-modal" data-value="{{asset('img/folder.jpg')}}" data-id="{{$f->id}}" title="{{$f->name}}">Delete</a>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @foreach($data[0] as $d)
                            <div class="col-sm-6 col-lg-2">
                                <!-- Simple card -->
                                <div class="card">
                                    @if($d->file_type == 'photo')
                                    <img class="card-img-top img-fluid" src="https://eurekahostdrive.nyc3.digitaloceanspaces.com/{{$d->path}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'audio')
                                    <img class="card-img-top img-fluid" src="{{asset('img/music.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'video')
                                    <img class="card-img-top img-fluid" src="{{asset('img/video.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'document')
                                    <img class="card-img-top img-fluid" src="{{asset('img/document.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'compress')
                                    <img class="card-img-top img-fluid" src="{{asset('img/archive.svg')}}" alt="{{$d->name}}">
                                    @endif

                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$d->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$d->name}}.{{$d->type}}">
                                                {{strlen($d->name) > 15 ? substr($d->name,0,14).'...' : $d->name}}
                                            </span><br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($d->created_at,'M d, Y h:i A')}}
                                            </small>
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">

                                                    @if($d->file_type == 'photo')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'photo');">Restore</a>

                                                    @elseif($d->file_type == 'audio')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/music.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'audio');">Restore</a>

                                                    @elseif($d->file_type == 'video')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/video.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'video');">Restore</a>

                                                    @elseif($d->file_type == 'document')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/document.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'document');">Restore</a>

                                                    @elseif($d->file_type == 'compress')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/archive.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'compress');">Restore</a>
                                                    @endif

                                                    <div class="dropdown-divider"></div>

                                                    @if($d->file_type == 'audio')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'audio');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/music.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'video')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'video');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/video.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'photo')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'photo');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'document')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'document');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/document.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>

                                                    @elseif($d->file_type == 'compress')

                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'compress');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/archive.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>

                                                    @endif

                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endforeach
                        </div>

                        <div class="row search-files-trash" style="display: none">
                            <div class='alert alert-info search-response' style='width:100%'>
                                <strong><span style='vertical-align:super' class='ml-1'>No file found</span></strong>
                            </div>

                            @foreach($data[1] as $d)
                            <div class="col-sm-6 col-lg-2 search-col" data-name="{{$d->name}}">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset('img/folder.jpg')}}" alt="Card image cap">
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$f->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$f->name}}">
                                                {{strlen($d->name) > 15 ? substr($d->name,0,14).'...' : $d->name}} <small>({{$d->count}})</small>
                                            </span><br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($f->created_at,'M d, Y h:i A')}}
                                            </small>
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">
                                                    
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/folder.jpg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'folder');">Restore</a>
                                                    <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFolder(this,'folder');" data-toggle="modal" data-target=".delete-folder-modal" data-value="{{asset('img/folder.jpg')}}" data-id="{{$f->id}}" title="{{$f->name}}">Delete</a>
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @foreach($data[0] as $d)
                            <div class="col-sm-6 col-lg-2 search-col" data-name="{{$d->name}}">
                                <!-- Simple card -->
                                <div class="card">
                                    @if($d->file_type == 'photo')
                                    <img class="card-img-top img-fluid" src="https://eurekahostdrive.nyc3.digitaloceanspaces.com/{{$d->path}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'audio')
                                    <img class="card-img-top img-fluid" src="{{asset('img/music.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'video')
                                    <img class="card-img-top img-fluid" src="{{asset('img/video.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'document')
                                    <img class="card-img-top img-fluid" src="{{asset('img/document.svg')}}" alt="{{$d->name}}">
                                    @elseif($d->file_type == 'compress')
                                    <img class="card-img-top img-fluid" src="{{asset('img/archive.svg')}}" alt="{{$d->name}}">
                                    @endif
                                    
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$d->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$d->name}}.{{$d->type}}">
                                                {{strlen($d->name) > 15 ? substr($d->name,0,14).'...' : $d->name}}
                                            </span><br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($d->created_at,'M d, Y h:i A')}}
                                            </small>
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">

                                                    @if($d->file_type == 'photo')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'photo');">Restore</a>

                                                    @elseif($d->file_type == 'audio')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/music.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'audio');">Restore</a>

                                                    @elseif($d->file_type == 'video')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/video.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'video');">Restore</a>

                                                    @elseif($d->file_type == 'document')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/document.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'document');">Restore</a>

                                                    @elseif($d->file_type == 'compress')
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".restore-file-modal" data-value="{{asset('img/archive.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}" onclick="restoreFile(this,'compress');">Restore</a>
                                                    @endif

                                                    <div class="dropdown-divider"></div>

                                                    @if($d->file_type == 'audio')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'audio');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/music.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'video')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'video');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/video.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'photo')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'photo');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>


                                                    @elseif($d->file_type == 'document')
                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'document');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/document.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>

                                                    @elseif($d->file_type == 'compress')

                                                    <a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this,'compress');" data-toggle="modal" data-target=".delete-file-modal" data-value="{{asset('img/archive.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Delete</a>

                                                    @endif

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

        <!-- restore file -->
        <div class="modal fade restore-file-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
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
                        <h5 class="modal-title" style="color: #ffffff !important">
                            <i class="mdi mdi-file-document-box-outline"></i>
                            <span class="file-title"></span> - 

                            Want to restore file from trash?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <div class="response"></div>
                        <img src="" style="width: 300px; height: auto; border-radius: .25rem" class="trash-file">
                        <form class="restore-file-form">
                            <input type="hidden" name="trash_id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn waves-effect waves-light" style="background-color: #e51c4a;" onclick="confirmRestoreFile(this);">
                            <strong>Restore</strong>
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        
        @include('drive.layouts.general')
        @include('drive.scripts.index')
    </body>
<html>