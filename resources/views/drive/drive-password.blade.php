@include('drive.layouts.header')
    @include('drive.layouts.topbar')
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row" style="margin-top: 5rem">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                @if(!$isLocked)
                                <div>
                                    @if($drive->file_type == 'photo')
                                    <img src="{{asset('img/archive.svg')}}" class="m-image" alt="Photo" />
                                    @elseif($drive->file_type == 'audio')
                                    <audio controls src="" class="media-a-player m-audio"></audio>
                                    @elseif($drive->file_type == 'video')
                                    <video src="" class="media-vv-player m-video" controls></video>
                                    @elseif($drive->file_type == 'doument')
                                    <iframe class="m-document" src="" style="width: 100%; height: 35rem" allowfullscreen="true"></iframe>
                                    @elseif($drive->file_type == 'compress')
                                    <img src="" class="m-image" alt="Photo" />
                                    @endif
                                </div>
                                @else
                                <div>
                                    <div class="account-card-box drive-password-box">
                                        <div class="mb-0">
                                            <div class="card-body p-4">
                                                <form class="drive-password-form">
                                                    <div class="pwd-response"></div>
                
                                                    <div class="form-group mb-3">
                                                        <input name="code" type="hidden" value="{{$code}}">

                                                        <input class="form-control" name="password" type="password" placeholder="Enter file password">
                                                    </div>
                
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-success btn-block waves-effect waves-light" type="button" onclick="checkDrivePassword(this)" style="background-color: #e51c4a; border-color: #e51c4a"> <strong>Send</strong> </button>
                                                    </div>
                                                </form>
                
                                            </div> <!-- end card-body -->
                                        </div>
                                    </div>

                                    <div class="drive-file" style="display: none;">
                                        <img src="" class="m-photo" alt="Photo" style="display: none;"/>

                                        <audio src="" class="media-player m-audio" style="display: none;" controls></audio>

                                        <video src="" class="media-v-player m-video" style="display: none;" controls></video>

                                        <iframe class="m-document" src="" style="width: 100%; height: 35rem;display: none;" allowfullscreen="true"></iframe>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-3"></div>
                        </div>                        
                    </div> 
                    <!-- end container-fluid -->
                </div> 
                <!-- end content -->

                <form action="{{url('drive/create')}}" class="dropzone upload-box" style="display: none;">
                </form>
            </div>
        </div>

        @include('drive.scripts.index')
        
    </body>
<html>