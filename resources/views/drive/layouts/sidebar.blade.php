<div class="left-side-menu">
    <div class="slimScrollDiv mm-active" style="position: relative; overflow: hidden; width: auto; height: 236.4px;">
        <div class="slimscroll-menu mm-show" style="overflow: hidden; width: auto; height: 236.4px;">

            <!--- Sidemenu -->
            <div id="sidebar-menu" class="mm-active">
                <style type="text/css">
                    .btn-upload{background-color: #e51c4a; border-color: #e51c4a}
                    .btn-upload:hover{color:#fff;background-color:#c51c4a;border-color:#c51c4a}
                    .sidebar-active{background-color: #f5f8fb; color: #c51c4a !important; font-weight: bold; }
                </style>
                <div class="mm-active" style="padding: 13px 20px">
                    <button class="btn btn-lg btn-upload btn-block waves-effect waves-light" data-toggle="modal" data-target=".upload-file-modal"> 
                        <i class="mdi mdi-cloud-upload ml-1"></i> 
                        <span>Upload</span> 
                    </button>
                </div>

                <div class="mm-active" style="padding: 13px 20px">
                    <div><strong><i class="mdi mdi-server mr-2"></i> Storage</strong></div>
                    <div class="progress progress-sm ml-4" style="margin-top: 8px">
                        <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div style="color: #5f6368; margin-top: 8px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;font-size: 13px;" class="ml-4">{{$total_usage}} of {{$total_storage}} used</div>
                </div>

                <ul class="metismenu mm-show" id="side-menu">

                    <li class="mm-active">
                        <a href="{{url('drive/file/recent/view')}}" class="{{Request::is('drive/file/recent/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-folder-clock-outline"></i>
                            <span> Recent Files <small>({{$count_recent}})</small></span>
                        </a>
                    </li>


                    <li class="mm-active">
                        <a href="{{url('drive/file/all/view')}}" class="{{Request::is('drive/file/all/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-folder-multiple-outline"></i>
                            <span> My Files <small>({{$count_all}})</small></span>
                        </a>
                    </li>

                    <li class="mm-active">
                        <a href="{{url('drive/file/trash/view')}}" class="{{Request::is('drive/file/trash/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-trash-can-outline"></i>
                            <span> Trash <small>({{$count_trash}})</small></span>
                        </a>
                    </li>

                    <li class="menu-title">Quick Links</li>

                    <li class="mm-active">
                        <a href="{{url('')}}" class="{{Request::is('drive/file/photo/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-image-outline"></i>
                            <span> Photos <small>({{$count_trash}})</small></span>
                        </a>
                    </li>
                    <li class="mm-active">
                        <a href="{{url('')}}" class="{{Request::is('drive/file/audio/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-music"></i>
                            <span> Audios <small>({{$count_trash}})</small></span>
                        </a>
                    </li>
                    <li class="mm-active">
                        <a href="{{url('')}}" class="{{Request::is('drive/file/video/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-video"></i>
                            <span> Videos <small>({{$count_trash}})</small></span>
                        </a>
                    </li>
                    <li class="mm-active">
                        <a href="{{url('')}}" class="{{Request::is('drive/file/document/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-file-document-box-outline"></i>
                            <span> Documents <small>({{$count_trash}})</small></span>
                        </a>
                    </li>
                    <li class="mm-active">
                        <a href="{{url('')}}" class="{{Request::is('drive/file/compress/view') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-folder-zip"></i>
                            <span> Compressed <small>({{$count_trash}})</small></span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>

        <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: -295.962px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 71.6474px;"></div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
    <!-- Sidebar -left -->
</div>