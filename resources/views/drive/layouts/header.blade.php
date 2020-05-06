<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <title>
            @if(Request::is('drive/file/recent/view/show'))
                Recent Files
            @elseif(Request::is('drive/file/all/view/show'))
                My Files
            @elseif(Request::is('drive/file/trash/view/show'))
                Trash
            @elseif(Request::is('drive/file/photo/view/show'))
                Photos
            @elseif(Request::is('drive/file/audio/view/show'))
                Audios
            @elseif(Request::is('drive/file/video/view/show'))
                Videos
            @elseif(Request::is('drive/file/document/view/show'))
                Documents
            @elseif(Request::is('drive/file/compress/view/show'))
                Compressed
            @elseif(Request::is('drive/file/folder/view/*'))
                Folder
            @elseif(Request::is('drive/share/*'))
                Share
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
        <link href="/css/primer.css" rel="stylesheet" type="text/css" id="app-stylesheet">

        <style type="text/css">
            [data-toggle="tooltip"]:hover{text-decoration: underline !important;}
            .modal-body img {width: 50% !important;}
        </style>

    </head>
    <body>
    	<div id="wrapper">
            @if(Request::is('drive/file/all/view/show'))
                <input type="hidden" class="search-type" value="all">
            @elseif(Request::is('drive/file/recent/view/show'))
                <input type="hidden" class="search-type" value="recent">
            @elseif(Request::is('drive/file/trash/view/show'))
                <input type="hidden" class="search-type" value="trash">
            @elseif(Request::is('drive/file/photo/view/show'))
                <input type="hidden" class="search-type" value="photo">
            @elseif(Request::is('drive/file/video/view/show'))
                <input type="hidden" class="search-type" value="video">
            @elseif(Request::is('drive/file/audio/view/show'))
                <input type="hidden" class="search-type" value="audio">
            @elseif(Request::is('drive/file/document/view/show'))
                <input type="hidden" class="search-type" value="document">
            @elseif(Request::is('drive/file/compress/view/show'))
                <input type="hidden" class="search-type" value="compress">
            @elseif(Request::is('drive/file/folder/view/*'))
                <input type="hidden" class="search-type" value="folder">
            @else
                <input type="hidden" class="search-type" value="">
            @endif