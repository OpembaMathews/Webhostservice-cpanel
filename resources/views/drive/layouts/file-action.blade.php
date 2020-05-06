@if($d->file_type == 'audio')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'audio');" data-url="{{url('drive/share/'.$d->drive_code)}}">Play</a>

<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" onclick="getMedia(this,'audio');">Copy File URL</a>

<a class="dropdown-item" href="#" onclick="moveToTrash(this,'audio');" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{asset('img/music.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Move to trash</a>


@elseif($d->file_type == 'video')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'video');" data-url="{{url('drive/share/'.$d->drive_code)}}">Play</a>

<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" onclick="getMedia(this,'video');">Copy File URL</a>

<a class="dropdown-item" href="#" onclick="moveToTrash(this,'video');" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{asset('img/video.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Move to trash</a>


@elseif($d->file_type == 'photo')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'photo');" data-url="{{url('drive/share/'.$d->drive_code)}}">View</a>

<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" onclick="getMedia(this,'photo');">Copy File URL</a>

<a class="dropdown-item" href="#" onclick="moveToTrash(this,'photo');" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{$d->path}}" data-id="{{$d->id}}" title="{{$d->name}}">Move to trash</a>


@elseif($d->file_type == 'document')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'document');" data-url="{{url('drive/share/'.$d->drive_code)}}">Open</a>

<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" onclick="getMedia(this,'document');">Copy File URL</a>

<a class="dropdown-item" href="#" onclick="moveToTrash(this,'document');" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{asset('img/document.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Move to trash</a>

@elseif($d->file_type == 'compress')

<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="{{asset('img/archive.svg')}}" title="{{$d->name}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" onclick="getMedia(this,'compress');">Copy File URL</a>

<a class="dropdown-item" href="#" onclick="moveToTrash(this,'compress');" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{asset('img/archive.svg')}}" data-id="{{$d->id}}" title="{{$d->name}}">Move to trash</a>

@endif

@if($d->password)
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".password-control-modal" data-id="{{$d->id}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" title="{{$d->name}}" onclick="getMedia(this,'remove password');">Remove Password Control</a>
@else
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".password-control-modal" data-id="{{$d->id}}"  data-url="{{url('drive/share/'.$d->drive_code)}}" title="{{$d->name}}" onclick="getMedia(this,'add password');">Add Password Control</a>
@endif

<a class="dropdown-item" href="{{url('drive/download/'.$d->path)}}">Download</a>

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
