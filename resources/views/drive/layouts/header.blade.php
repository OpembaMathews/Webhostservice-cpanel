<!doctype html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <title>
            @if(Request::is('drive/file/recent'))
                Recent Files
            @elseif(Request::is('drive/file/all'))
                My Files
            @elseif(Request::is('drive/file/trash'))
                Trash
            @else
                EurekaHostDrive
            @endif 
            | EurekaHost
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="img/drive-icon.png">

        <!-- App css -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="/css/dropzone.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>
    <body>
    	<div id="wrapper">