<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <title>
            @if(Request::is('drive/file/recent/view'))
                Recent Files
            @elseif(Request::is('drive/file/all/view'))
                My Files
            @elseif(Request::is('drive/file/trash/view'))
                Trash
            @elseif(Request::is('drive/file/photo/view'))
                Photos
            @elseif(Request::is('drive/file/audio/view'))
                Audios
            @elseif(Request::is('drive/file/video/view'))
                Videos
            @elseif(Request::is('drive/file/document/view'))
                Documents
            @elseif(Request::is('drive/file/compress/view'))
                Compressed
            @else
                EurekaHostDrive
            @endif 
            | EurekaHost
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="/img/drive-icon.png">

        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/plyr.css"/>
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="/css/dropzone.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

        <style type="text/css">
            [data-toggle="tooltip"]:hover{text-decoration: underline !important;}
            .modal-body img {width: 100% !important; height: 100% !important}
        </style>

    </head>
    <body>
    	<div id="wrapper">
            @if(Request::is('drive/file/all/view'))
                <input type="hidden" class="search-type" value="all">
            @elseif(Request::is('drive/file/recent/view'))
                <input type="hidden" class="search-type" value="recent">
            @elseif(Request::is('drive/file/trash/view'))
                <input type="hidden" class="search-type" value="trash">
            @elseif(Request::is('drive/file/photo/view'))
                <input type="hidden" class="search-type" value="photo">
            @elseif(Request::is('drive/file/video/view'))
                <input type="hidden" class="search-type" value="video">
            @elseif(Request::is('drive/file/audio/view'))
                <input type="hidden" class="search-type" value="audio">
            @elseif(Request::is('drive/file/document/view'))
                <input type="hidden" class="search-type" value="document">
            @elseif(Request::is('drive/file/compress/view'))
                <input type="hidden" class="search-type" value="compress">
            @else
                <input type="hidden" class="search-type" value="">
            @endif