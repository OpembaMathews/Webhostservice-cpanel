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
                                    <h4 class="page-title"><i class="mdi mdi-music" style="margin: 0 10px 0 3px;"></i>Audios <small>({{$count_audio}})</small></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row default-files-audio">
                            @foreach($data as $d)
                            <div class="col-sm-6 col-lg-2">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset('img/music.svg')}}" alt="{{$d->name}}">
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$d->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$d->name}}.{{$d->type}}">
                                                {{strlen($d->name) > 15 ? substr($d->name,0,14).'...' : $d->name}}
                                            </span> 
                                            @if($d->password)
                                            <i class="mdi mdi-lock"></i>
                                            @endif
                                            <br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($d->created_at,'M d, Y h:i A')}}
                                            </small>
                                            @if($d->folder_name)
                                            <br>
                                            <small style="line-height: 2.5; font-weight: bold;">
                                                <i class="mdi mdi-folder"></i>
                                                {{$d->folder_name}}
                                            </small>
                                            @endif
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">
                                                    @include('drive.layouts.file-action')
                                                </div>
                                            </div>
                                        </h5>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endforeach
                        </div>

                        <div class="row search-files-audio" style="display: none">
                            <div class='alert alert-info search-response' style='width:100%'>
                                <strong><span style='vertical-align:super' class='ml-1'>No file found</span></strong>
                            </div>

                            @foreach($data as $d)
                            <div class="col-sm-6 col-lg-2 search-col" data-name="{{$d->name}}">
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset('img/music.svg')}}" alt="{{$d->name}}">
                                    <div class="card-body" style="padding-bottom: 0">
                                        <h6 class="card-title">
                                            <span style="line-height: 2.5; color: #c51c4a;cursor:pointer" title="{{$d->name}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$d->name}}.{{$d->type}}">
                                                {{strlen($d->name) > 15 ? substr($d->name,0,14).'...' : $d->name}}
                                            </span>
                                            @if($d->password)
                                            <i class="mdi mdi-lock"></i>
                                            @endif
                                            <br>
                                            <small style="line-height: 2.5;">
                                                <i class="mdi mdi-clock-outline"></i>
                                                {{date_format($d->created_at,'M d, Y h:i A')}}
                                            </small>
                                            @if($d->folder_name)
                                            <br>
                                            <small style="line-height: 2.5; font-weight: bold;">
                                                <i class="mdi mdi-folder"></i>
                                                {{$d->folder_name}}
                                            </small>
                                            @endif
                                            <div class="btn-group mt-1 mr-1 float-right">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal" style="font-size: 1.5em"></i>
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);">
                                                   @include('drive.layouts.file-action')
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


        <!-- confirm audio file -->
        <div class="modal fade media-player-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
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
                        <h5 class="modal-title" style="color: #ffffff !important"><i class="mdi mdi-music"></i> <span class="media-title"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
                    </div>
                    <div class="modal-body">
                        <audio controls src="" class="media-player"></audio>

                        <div class="form-group mt-5">
                            <label>Copy File URL</label>
                            <div class="input-group">
                                <input class="form-control drive-url" value="">
                                <span class="input-group-append">
                                    <button type="button" id="copy-btn" class="btn btn-dark waves-effect waves-light" style="background-color: #e51c4a;" data-clipboard-action="copy" data-clipboard-target=".drive-url"><strong><i class=" mdi mdi-clipboard-text"></i> Copy</strong></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        @include('drive.layouts.general')

        @include('drive.scripts.index')
    </body>
<html>