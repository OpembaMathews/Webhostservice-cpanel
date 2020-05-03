@if($d->file_type == 'audio')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="{{asset('img/'.$d->path)}}" title="{{$d->name}}" onclick="getMedia(this,'audio');">Play</a>
@elseif($d->file_type == 'video')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="{{asset('img/'.$d->path)}}" title="{{$d->name}}" onclick="getMedia(this,'video');">Play</a>
@elseif($d->file_type == 'photo')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'photo');">View</a>
@elseif($d->file_type == 'document')
<a class="dropdown-item" href="#" data-toggle="modal" data-target=".media-player-modal" data-media="https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/{{$d->path}}" title="{{$d->name}}" onclick="getMedia(this,'document');">Open</a>
@endif

<a class="dropdown-item" href="{{url('drive/download/'.$d->path)}}">Download</a>
<a class="dropdown-item" href="#" onclick="moveToTrash(this);" data-toggle="modal" data-target=".move-to-trash-modal" data-value="{{$d->path}}" data-id="{{$d->id}}">Move to trash</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#" style="color: #e51c4a" onclick="deleteFile(this);" data-toggle="modal" data-target=".delete-file-modal" data-value="{{$d->path}}" data-id="{{$d->id}}">Delete</a>