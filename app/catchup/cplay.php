<?php

// * Copyright 2021-2024 SnehTV, Inc.
// * Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
// * Created By : TechieSneh

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
if (isset($_GET['data'])) {
    $data = base64_decode($_GET['data']);
    $data = explode('=?=', $data);
    $name = $data[0];
    $name = str_replace("_", " ", $name);
    $id = $data[1];
    $showtime = $data[2];
    $pid = $data[3];
    $result = substr($pid, 0, 6);
    $dates = "20" . substr($result, 0, 2) . "-" . substr($result, 2, 2) . "-" . substr($result, 4, 5);
    $begin = $data[4];
    $end = $data[5];
    $link = "cpapi.php?id=" . $id . "&st=" . $showtime . "&pid=" . $pid . '&begin=' . $begin . '&end=' . $end . '&e=.m3u8';
    $logo = "https://jiotv.catchup.cdn.jio.com/dare_images/shows/" . $dates . "/" . $pid . ".jpg";

    echo <<<GFG
     <html lang="en">

     <head>
         <title>$name | JioTV +</title>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <meta name="description" content="ENJOY FREE LIVE TV">
         <meta name="keywords" content="LIVETV, SPORTS, MOVIES, MUSIC">
         <meta name="author" content="TSNEH">
         <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
         <script src="https://cdn.plyr.io/3.6.3/plyr.js"></script>
         <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BcjC6R8/jiotv.png">
         <script type='text/javascript' src='https://content.jwplatform.com/libraries/IDzF9Zmk.js'></script>
     
     </head>
     
     <body>
         <style>
             .jw-svg-icon-pause {
                 background-image: url("assets/img/jwplay/pause.svg");
             }
     
             [class~=jw-svg-icon-pause] path,
             [class~=jw-svg-icon-replay] path,
             [class~=jw-svg-icon-next] path,
             .jw-state-paused .jw-svg-icon-play path,
             [class~=jw-svg-icon-volume-0] path,
             [class~=jw-svg-icon-buffer] path,
             [class~=jw-svg-icon-volume-100] path,
             [class~=jw-svg-icon-rewind] path {
                 display: none;
             }
     
             html {
                 font-family: Poppins;
             }
     
             [class~=jw-svg-icon-fullscreen-on],
             [class~=jw-svg-icon-fullscreen-off],
             .jw-svg-icon-pause,
             [class~=jw-svg-icon-cc-off],
             .jw-svg-icon-close,
             [class~=jw-state-paused] [class~=jw-svg-icon-play],
             .jw-svg-icon-rewind,
             .jw-svg-icon-volume-100,
             [class~=jw-svg-icon-replay],
             [class~=jw-svg-icon-playlist],
             [class~=jw-svg-icon-buffer],
             [class~=jw-svg-icon-quality-100],
             [class~=jw-svg-icon-volume-0],
             [class~=jw-svg-icon-settings],
             [class~=jw-svg-icon-next] {
                 background-size: contain;
             }
     
             [class~=jw-svg-icon-quality-100],
             [class~=jw-svg-icon-replay],
             .jw-svg-icon-pause,
             .jw-svg-icon-rewind,
             [class~=jw-svg-icon-buffer],
             [class~=jw-svg-icon-fullscreen-on],
             .jw-svg-icon-close,
             [class~=jw-svg-icon-playlist],
             [class~=jw-svg-icon-cc-off],
             .jw-svg-icon-volume-100,
             [class~=jw-state-paused] [class~=jw-svg-icon-play],
             [class~=jw-svg-icon-next],
             [class~=jw-svg-icon-settings],
             [class~=jw-svg-icon-fullscreen-off],
             [class~=jw-svg-icon-volume-0] {
                 background-repeat: no-repeat;
             }
     
             [class~=jw-svg-icon-buffer] {
                 background-image: url("assets/img/jwplay/buffer.svg");
             }
     
             html {
                 background: #000;
             }
     
             [class~=jw-icon-playback]:hover [class~=jw-svg-icon-pause] {
                 background-image: url("assets/img/jwplay/pause-hover.svg");
             }
     
             [class~=jw-icon-replay]:hover [class~=jw-svg-icon-replay] {
                 background-image: url("assets/img/jwplay/replay-hover.svg");
             }
     
             [class~=jw-svg-icon-replay] {
                 background-image: url("assets/img/jwplay/replay.svg");
             }
     
             .jw-svg-icon-rewind {
                 background-image: url("assets/img/jwplay/rewind.svg");
             }
     
             .loading-text span:nth-child(1),
             .loading-text span:nth-child(4),
             [class~=loading-text] span:nth-child(2),
             [class~=loading-text] span:nth-child(3) {
                 filter: blur(0px);
             }
     
             [class~=jw-state-paused] [class~=jw-svg-icon-play] {
                 background-image: url("assets/img/jwplay/play.svg");
             }
     
             .jw-state-paused .jw-icon-playback:hover .jw-svg-icon-play {
                 background-image: url("assets/img/jwplay/play-hover.svg");
             }
     
             [class~=jw-svg-icon-next] {
                 background-image: url("assets/img/jwplay/next.svg");
             }
     
             html {
                 margin-left: 0;
             }
     
             .loading-text span:nth-child(1) {
                 animation: blur-text 1.5s 0s infinite linear alternate;
             }
     
             [class~=jw-icon-rewind]:hover [class~=jw-svg-icon-rewind] {
                 background-image: url("assets/img/jwplay/rewind-hover.svg");
             }
     
             [class~=jw-icon-next]:hover [class~=jw-svg-icon-next] {
                 background-image: url("assets/img/jwplay/next-hover.svg");
             }
     
             .jw-svg-icon-volume-100 {
                 background-image: url("assets/img/jwplay/volume-on.svg");
             }
     
             html {
                 margin-bottom: 0;
             }
     
             .jw-icon-volume:hover .jw-svg-icon-volume-100 {
                 background-image: url("assets/img/jwplay/volume-on-hover.svg");
             }
     
             [class~=jw-svg-icon-volume-0] {
                 background-image: url("assets/img/jwplay/volume-off.svg");
             }
     
             [class~=jw-svg-icon-cc-off] {
                 background-image: url("assets/img/jwplay/captions.svg");
             }
     
             [class~=loading-text] span:nth-child(2) {
                 animation: blur-text 1.5s .2s infinite linear alternate;
             }
     
             [class~=jw-icon-volume]:hover [class~=jw-svg-icon-volume-0] {
                 background-image: url("assets/img/jwplay/volume-off-hover.svg");
             }
     
             html {
                 margin-right: 0;
             }
     
             [class~=jw-svg-icon-playlist] {
                 background-image: url("assets/img/jwplay/playlist.svg");
             }
     
             [class~=loading-text] span:nth-child(3) {
                 animation: blur-text 1.5s .4s infinite linear alternate;
             }
     
             html {
                 margin-top: 0;
             }
     
             [class~=jw-svg-icon-close] path,
             .jw-svg-icon-cc-off path,
             [class~=jw-svg-icon-playlist] path,
             [class~=jw-svg-icon-quality-100] path,
             [class~=jw-svg-icon-fullscreen-off] path,
             [class~=jw-svg-icon-settings] path,
             [class~=jw-svg-icon-fullscreen-on] path {
                 display: none;
             }
     
             [class~=jw-icon-cc-off]:hover [class~=jw-svg-icon-cc-off] {
                 background-image: url("assets/img/jwplay/captions-hover.svg");
             }
     
             [class~=jw-svg-icon-settings] {
                 background-image: url("assets/img/jwplay/settings.svg");
             }
     
             [class~=jw-svg-icon-quality-100] {
                 background-image: url("assets/img/jwplay/quality.svg");
             }
     
             [class~=jw-playlist-btn]:hover [class~=jw-svg-icon-playlist] {
                 background-image: url("assets/img/jwplay/playlist-hover.svg");
             }
     
             #myElement {
                 position: reletive;
             }
     
             .jw-svg-icon-close {
                 background-image: url("assets/img/jwplay/close.svg");
             }
     
             [class~=jw-icon-settings]:hover [class~=jw-svg-icon-settings] {
                 background-image: url("assets/img/jwplay/settings-hover.svg");
             }
     
             [class~=jw-svg-icon-fullscreen-on] {
                 background-image: url("assets/img/jwplay/fullscreen-on.svg");
             }
     
             .jw-settings-quality:hover .jw-svg-icon-quality-100 {
                 background-image: url("assets/img/jwplay/quality-hover.svg");
             }
     
             [class~=jw-settings-close]:hover [class~=jw-svg-icon-close] {
                 background-image: url("assets/img/jwplay/close-hover.svg");
             }
     
             #myElement {
                 width: 100% !important;
             }
     
             html {
                 padding-left: 0;
             }
     
             .loading-text span:nth-child(4) {
                 animation: blur-text 1.5s .6s infinite linear alternate;
             }
     
             [class~=loading-text] span:nth-child(7),
             [class~=loading-text] span:nth-child(6),
             [class~=loading-text] span:nth-child(8),
             [class~=loading-text] span:nth-child(5) {
                 filter: blur(0px);
             }
     
             html {
                 padding-bottom: 0;
             }
     
             #myElement {
                 height: 100% !important;
             }
     
             [class~=loading-text] span {
                 display: inline-block;
             }
     
             [class~=loading-text] span {
                 margin-left: .052083333in;
             }
     
             [class~=loading-text] span:nth-child(5) {
                 animation: blur-text 1.5s .8s infinite linear alternate;
             }
     
             [class~=jw-svg-icon-fullscreen-off] {
                 background-image: url("assets/img/jwplay/fullscreen-off.svg");
             }
     
             [class~=loading-text] span:nth-child(6) {
                 animation: blur-text 1.5s 1s infinite linear alternate;
             }
     
             [class~=loading] {
                 position: fixed;
             }
     
             [class~=loading],
             .loading-text {
                 top: 0;
             }
     
             [class~=loading-text] span {
                 margin-bottom: 0;
             }
     
             html {
                 padding-right: 0;
             }
     
             [class~=jw-icon-fullscreen]:hover [class~=jw-svg-icon-fullscreen-on] {
                 background-image: url("assets/img/jwplay/fullscreen-on-hover.svg");
             }
     
             .loading-text,
             [class~=loading] {
                 left: 0;
             }
     
             [class~=loading],
             .loading-text {
                 width: 100%;
             }
     
             [class~=loading] {
                 height: 100%;
             }
     
             [class~=loading] {
                 background: #000;
             }
     
             [class~=loading] {
                 z-index: 9999;
             }
     
             .loading-text {
                 position: absolute;
             }
     
             [class~=loading-text] span {
                 margin-right: .052083333in;
             }
     
             html {
                 padding-top: 0;
             }
     
             [class~=loading-text] span {
                 margin-top: 0;
             }
     
             [class~=loading-text] span {
                 font-size: 37.5pt;
             }
     
             [class~=loading-text] span {
                 font-weight: bold;
             }
     
             [class~=loading-text] span {
                 color: #ffffff;
             }
     
             .loading-text {
                 bottom: 0;
             }
     
             [class~=loading-text] span {
                 font-family: "Quattrocento Sans", sans-serif;
             }
     
             .loading-text {
                 right: 0;
             }
     
             [class~=jw-icon-fullscreen]:hover [class~=jw-svg-icon-fullscreen-off] {
                 background-image: url("assets/img/jwplay/fullscreen-off-hover.svg");
             }
     
             .loading-text {
                 margin-left: auto;
             }
     
             .loading-text {
                 margin-bottom: auto;
             }
     
             .loading-text {
                 margin-right: auto;
             }
     
             .loading-text {
                 margin-top: auto;
             }
     
             .loading-text {
                 text-align: center;
             }
     
             [class~=loading-text] span:nth-child(7) {
                 animation: blur-text 1.5s 1.2s infinite linear alternate;
             }
     
             .loading-text {
                 height: 100px;
             }
     
             .loading-text {
                 line-height: 1.041666667in;
             }
     
             [class~=loading-text] span:nth-child(8) {
                 animation: blur-text 1.5s 1.4s infinite linear alternate;
             }
     
             @keyframes blur-text {
                 0% {
                     filter: blur(0px);
                 }
     
                 100% {
                     filter: blur(4px);
                 }
             }
     
             [class~=scrollbar-track-y] {
                 background: #131720 !important;
             }
     
             [class~=scrollbar-track-y] {
                 top: .625pc !important;
             }
     
             [class~=scrollbar-track-y],
             [class~=scrollbar-track-x] {
                 bottom: 10px !important;
             }
     
             [class~=scrollbar-track-y] {
                 height: auto !important;
             }
     
             [class~=scrollbar-track-y],
             .scrollbar-thumb-y {
                 width: 4px !important;
             }
     
             .scrollbar-thumb-y,
             [class~=scrollbar-track-x],
             [class~=scrollbar-thumb-x],
             [class~=scrollbar-track-y] {
                 border-radius: .041666667in !important;
             }
     
             #videoContainer {
                 position: absolute;
             }
     
             [class~=scrollbar-track-x],
             [class~=scrollbar-track-y] {
                 right: 7.5pt !important;
             }
     
             [class~=scrollbar-track-y],
             [class~=scrollbar-track-x] {
                 overflow: hidden;
             }
     
             .scrollbar-thumb-y {
                 background: #000000 !important;
             }
     
             [class~=scrollbar-track-x] {
                 background: #131720 !important;
             }
     
             [class~=scrollbar-track-x] {
                 left: 10px !important;
             }
     
             [class~=scrollbar-track-x],
             [class~=scrollbar-thumb-x] {
                 height: 4px !important;
             }
     
             [class~=scrollbar-track-x] {
                 width: auto !important;
             }
     
             [class~=scrollbar-thumb-x] {
                 background: #000000 !important;
             }
     
             #videoContainer {
                 width: 100% !important;/br>
             }
     
             #videoContainer {
                 height: 100% !important;
             }
             
         </style>
         <video id="myElement"></video>
         <script type="text/javascript">
             jwplayer.key = 'Khpp2dHxlBJHC8MCmLnBuV2jK/DwDnJMniwF6EO9HC/riJ712ZmbHg==';
         </script>
         <script type="text/JavaScript">
             jwplayer("myElement").setup({
                 title: "$name",
                 description: "SnehTV",
                 image: "$logo",
                 aspectratio: '16:9',
                 width: '100%',
                 mute: false,
                 autostart: true,
                 file: "$link",
                 type: "mp4",
                 captions: {color: '#ffb800',fontSize: 30,backgroundOpacity: 0},
                 sharing: {
                     sites: ['facebook','twitter']
                 }
             })
         </script>
         <style>
        .jw-settings-item-active,
        .jw-settings-item-hover {
            color: #BA3B46 !important;
        }
        .jw-breakpoint-7,
        .jw-settings-menu {
            width: 150px;
        }
        .jw-svg-icon-buffer {
            background-image: url("data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMMyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiCiAgdmlld0JveD0iMCAwIDEwMCAxMDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDAgMCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxjaXJjbGUgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjQiIGN4PSI1MCIgY3k9IjUwIiByPSI0NCIgc3R5bGU9Im9wYWNpdHk6MC41OyIvPgogIDxjaXJjbGUgZmlsbD0iI2ZmZiIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjMiIGN4PSI4IiBjeT0iNTQiIHI9IjYiID4KICAgIDxhbmltYXRlVHJhbnNmb3JtCiAgICAgIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIKICAgICAgZHVyPSIycyIKICAgICAgdHlwZT0icm90YXRlIgogICAgICBmcm9tPSIwIDUwIDQ4IgogICAgICB0bz0iMzYwIDUwIDUyIgogICAgICByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgLz4KICAgIAogIDwvY2lyY2xlPgo8L3N2Zz4=");
            background-size: contain;
            background-repeat: no-repeat;
        }
        
        
        
        .jwplayer:hover {
            position: relative;
        }
        
        .jwplayer:hover::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 20%;
            background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.5));
            pointer-events: none; /* Ensure the overlay doesn't interfere with mouse events */
        }
        
        .jw-svg-icon-volume-100 path {
          display: none;
        }
        
        .jw-svg-icon-volume-100 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjUwMDIgMTIuNzg3MUMxMy4zODAyIDEyLjc4NzEgMTMuMjY3NyAxMi43NTA2IDEzLjE2MjcgMTIuNjc3N0MxMi45MTUyIDEyLjQ5NTIgMTIuODYyNyAxMi4xNTIzIDEzLjA1MDIgMTEuOTExNEMxNC4yMjc3IDEwLjM4NjMgMTQuMjI3NyA4LjI1NTUgMTMuMDUwMiA2LjczMDM3QzEyLjg2MjcgNi40ODk1NiAxMi45MTUyIDYuMTQ2NTggMTMuMTYyNyA1Ljk2NDE1QzEzLjQxMDIgNS43ODE3MiAxMy43NjI3IDUuODMyOCAxMy45NTAyIDYuMDczNjFDMTUuNDIwMiA3Ljk4NTUgMTUuNDIwMiAxMC42NTYzIDEzLjk1MDIgMTIuNTY4MkMxMy44Mzc3IDEyLjcxNDIgMTMuNjcyNyAxMi43ODcxIDEzLjUwMDIgMTIuNzg3MVoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xNC44NzMzIDE0LjYxMTVDMTQuNzUzMyAxNC42MTE1IDE0LjY0MDcgMTQuNTc1IDE0LjUzNTcgMTQuNTAyMUMxNC4yODgyIDE0LjMxOTYgMTQuMjM1OCAxMy45NzY3IDE0LjQyMzMgMTMuNzM1OUMxNi40MjU4IDExLjEzOCAxNi40MjU4IDcuNTAzOTYgMTQuNDIzMyA0LjkwNjE0QzE0LjIzNTggNC42NjUzMyAxNC4yODgyIDQuMzIyMzYgMTQuNTM1NyA0LjEzOTkzQzE0Ljc4MzIgMy45NTc1IDE1LjEzNTggNC4wMDg1OCAxNS4zMjMzIDQuMjQ5MzlDMTcuNjI1OCA3LjIzMzk2IDE3LjYyNTggMTEuNDA4IDE1LjMyMzMgMTQuMzkyNkMxNS4yMTgzIDE0LjUzODYgMTUuMDQ1OCAxNC42MTE1IDE0Ljg3MzMgMTQuNjExNVoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik05LjU3NzUgMy4zMjMzNkM4LjczNzUgMi44NzA5MiA3LjY2NSAyLjk4NzY4IDYuNTcgMy42NTE3M0w0LjM4IDQuOTg3MTRDNC4yMyA1LjA3NDcxIDQuMDU3NSA1LjEyNTc5IDMuODg1IDUuMTI1NzlIMy4xODc1SDIuODEyNUMwLjk5NzUgNS4xMjU3OSAwIDYuMDk2MzQgMCA3Ljg2MjI5VjEwLjc4MTJDMCAxMi41NDcyIDAuOTk3NSAxMy41MTc3IDIuODEyNSAxMy41MTc3SDMuMTg3NUgzLjg4NUM0LjA1NzUgMTMuNTE3NyA0LjIzIDEzLjU2ODggNC4zOCAxMy42NTYzTDYuNTcgMTQuOTkxN0M3LjIzIDE1LjM5MzEgNy44NzUgMTUuNTkwMSA4LjQ3NSAxNS41OTAxQzguODY1IDE1LjU5MDEgOS4yNCAxNS41MDI2IDkuNTc3NSAxNS4zMjAxQzEwLjQxIDE0Ljg2NzcgMTAuODc1IDEzLjkyNjMgMTAuODc1IDEyLjY3MTJWNS45NzIyOUMxMC44NzUgNC43MTcxNCAxMC40MSAzLjc3NTc5IDkuNTc3NSAzLjMyMzM2WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-volume:hover .jw-svg-icon-volume-100 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjUwMDIgMTIuNzg3MUMxMy4zODAyIDEyLjc4NzEgMTMuMjY3NyAxMi43NTA2IDEzLjE2MjcgMTIuNjc3N0MxMi45MTUyIDEyLjQ5NTIgMTIuODYyNyAxMi4xNTIzIDEzLjA1MDIgMTEuOTExNEMxNC4yMjc3IDEwLjM4NjMgMTQuMjI3NyA4LjI1NTUgMTMuMDUwMiA2LjczMDM3QzEyLjg2MjcgNi40ODk1NiAxMi45MTUyIDYuMTQ2NTggMTMuMTYyNyA1Ljk2NDE1QzEzLjQxMDIgNS43ODE3MiAxMy43NjI3IDUuODMyOCAxMy45NTAyIDYuMDczNjFDMTUuNDIwMiA3Ljk4NTUgMTUuNDIwMiAxMC42NTYzIDEzLjk1MDIgMTIuNTY4MkMxMy44Mzc3IDEyLjcxNDIgMTMuNjcyNyAxMi43ODcxIDEzLjUwMDIgMTIuNzg3MVoiIGZpbGw9IiNCQTNCNDYiLz4KPHBhdGggZD0iTTE0Ljg3MzMgMTQuNjExNUMxNC43NTMzIDE0LjYxMTUgMTQuNjQwNyAxNC41NzUgMTQuNTM1NyAxNC41MDIxQzE0LjI4ODIgMTQuMzE5NiAxNC4yMzU4IDEzLjk3NjcgMTQuNDIzMyAxMy43MzU5QzE2LjQyNTggMTEuMTM4IDE2LjQyNTggNy41MDM5NiAxNC40MjMzIDQuOTA2MTRDMTQuMjM1OCA0LjY2NTMzIDE0LjI4ODIgNC4zMjIzNiAxNC41MzU3IDQuMTM5OTNDMTQuNzgzMiAzLjk1NzUgMTUuMTM1OCA0LjAwODU4IDE1LjMyMzMgNC4yNDkzOUMxNy42MjU4IDcuMjMzOTYgMTcuNjI1OCAxMS40MDggMTUuMzIzMyAxNC4zOTI2QzE1LjIxODMgMTQuNTM4NiAxNS4wNDU4IDE0LjYxMTUgMTQuODczMyAxNC42MTE1WiIgZmlsbD0iI0JBM0I0NiIvPgo8cGF0aCBkPSJNOS41Nzc1IDMuMzIzMzZDOC43Mzc1IDIuODcwOTIgNy42NjUgMi45ODc2OCA2LjU3IDMuNjUxNzNMNC4zOCA0Ljk4NzE0QzQuMjMgNS4wNzQ3MSA0LjA1NzUgNS4xMjU3OSAzLjg4NSA1LjEyNTc5SDMuMTg3NUgyLjgxMjVDMC45OTc1IDUuMTI1NzkgMCA2LjA5NjM0IDAgNy44NjIyOVYxMC43ODEyQzAgMTIuNTQ3MiAwLjk5NzUgMTMuNTE3NyAyLjgxMjUgMTMuNTE3N0gzLjE4NzVIMy44ODVDNC4wNTc1IDEzLjUxNzcgNC4yMyAxMy41Njg4IDQuMzggMTMuNjU2M0w2LjU3IDE0Ljk5MTdDNy4yMyAxNS4zOTMxIDcuODc1IDE1LjU5MDEgOC40NzUgMTUuNTkwMUM4Ljg2NSAxNS41OTAxIDkuMjQgMTUuNTAyNiA5LjU3NzUgMTUuMzIwMUMxMC40MSAxNC44Njc3IDEwLjg3NSAxMy45MjYzIDEwLjg3NSAxMi42NzEyVjUuOTcyMjlDMTAuODc1IDQuNzE3MTQgMTAuNDEgMy43NzU3OSA5LjU3NzUgMy4zMjMzNloiIGZpbGw9IiNCQTNCNDYiLz4KPC9zdmc+Cg==");
        }
        
        .jw-svg-icon-volume-50 path {
          display: none;
        }
        
        .jw-svg-icon-volume-50 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjUwMDIgMTIuNzg3MUMxMy4zODAyIDEyLjc4NzEgMTMuMjY3NyAxMi43NTA2IDEzLjE2MjcgMTIuNjc3N0MxMi45MTUyIDEyLjQ5NTIgMTIuODYyNyAxMi4xNTIzIDEzLjA1MDIgMTEuOTExNEMxNC4yMjc3IDEwLjM4NjMgMTQuMjI3NyA4LjI1NTUgMTMuMDUwMiA2LjczMDM3QzEyLjg2MjcgNi40ODk1NiAxMi45MTUyIDYuMTQ2NTggMTMuMTYyNyA1Ljk2NDE1QzEzLjQxMDIgNS43ODE3MiAxMy43NjI3IDUuODMyOCAxMy45NTAyIDYuMDczNjFDMTUuNDIwMiA3Ljk4NTUgMTUuNDIwMiAxMC42NTYzIDEzLjk1MDIgMTIuNTY4MkMxMy44Mzc3IDEyLjcxNDIgMTMuNjcyNyAxMi43ODcxIDEzLjUwMDIgMTIuNzg3MVoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik05LjU3NzUgMy4zMjMzNkM4LjczNzUgMi44NzA5MiA3LjY2NSAyLjk4NzY4IDYuNTcgMy42NTE3M0w0LjM4IDQuOTg3MTRDNC4yMyA1LjA3NDcxIDQuMDU3NSA1LjEyNTc5IDMuODg1IDUuMTI1NzlIMy4xODc1SDIuODEyNUMwLjk5NzUgNS4xMjU3OSAwIDYuMDk2MzQgMCA3Ljg2MjI5VjEwLjc4MTJDMCAxMi41NDcyIDAuOTk3NSAxMy41MTc3IDIuODEyNSAxMy41MTc3SDMuMTg3NUgzLjg4NUM0LjA1NzUgMTMuNTE3NyA0LjIzIDEzLjU2ODggNC4zOCAxMy42NTYzTDYuNTcgMTQuOTkxN0M3LjIzIDE1LjM5MzEgNy44NzUgMTUuNTkwMSA4LjQ3NSAxNS41OTAxQzguODY1IDE1LjU5MDEgOS4yNCAxNS41MDI2IDkuNTc3NSAxNS4zMjAxQzEwLjQxIDE0Ljg2NzcgMTAuODc1IDEzLjkyNjMgMTAuODc1IDEyLjY3MTJWNS45NzIyOUMxMC44NzUgNC43MTcxNCAxMC40MSAzLjc3NTc5IDkuNTc3NSAzLjMyMzM2WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-volume:hover .jw-svg-icon-volume-50 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjUwMDIgMTIuNzg3MUMxMy4zODAyIDEyLjc4NzEgMTMuMjY3NyAxMi43NTA2IDEzLjE2MjcgMTIuNjc3N0MxMi45MTUyIDEyLjQ5NTIgMTIuODYyNyAxMi4xNTIzIDEzLjA1MDIgMTEuOTExNEMxNC4yMjc3IDEwLjM4NjMgMTQuMjI3NyA4LjI1NTUgMTMuMDUwMiA2LjczMDM3QzEyLjg2MjcgNi40ODk1NiAxMi45MTUyIDYuMTQ2NTggMTMuMTYyNyA1Ljk2NDE1QzEzLjQxMDIgNS43ODE3MiAxMy43NjI3IDUuODMyOCAxMy45NTAyIDYuMDczNjFDMTUuNDIwMiA3Ljk4NTUgMTUuNDIwMiAxMC42NTYzIDEzLjk1MDIgMTIuNTY4MkMxMy44Mzc3IDEyLjcxNDIgMTMuNjcyNyAxMi43ODcxIDEzLjUwMDIgMTIuNzg3MVoiIGZpbGw9IiNCQTNCNDYiLz4KPHBhdGggZD0iTTkuNTc3NSAzLjMyMzM2QzguNzM3NSAyLjg3MDkyIDcuNjY1IDIuOTg3NjggNi41NyAzLjY1MTczTDQuMzggNC45ODcxNEM0LjIzIDUuMDc0NzEgNC4wNTc1IDUuMTI1NzkgMy44ODUgNS4xMjU3OUgzLjE4NzVIMi44MTI1QzAuOTk3NSA1LjEyNTc5IDAgNi4wOTYzNCAwIDcuODYyMjlWMTAuNzgxMkMwIDEyLjU0NzIgMC45OTc1IDEzLjUxNzcgMi44MTI1IDEzLjUxNzdIMy4xODc1SDMuODg1QzQuMDU3NSAxMy41MTc3IDQuMjMgMTMuNTY4OCA0LjM4IDEzLjY1NjNMNi41NyAxNC45OTE3QzcuMjMgMTUuMzkzMSA3Ljg3NSAxNS41OTAxIDguNDc1IDE1LjU5MDFDOC44NjUgMTUuNTkwMSA5LjI0IDE1LjUwMjYgOS41Nzc1IDE1LjMyMDFDMTAuNDEgMTQuODY3NyAxMC44NzUgMTMuOTI2MyAxMC44NzUgMTIuNjcxMlY1Ljk3MjI5QzEwLjg3NSA0LjcxNzE0IDEwLjQxIDMuNzc1NzkgOS41Nzc1IDMuMzIzMzZaIiBmaWxsPSIjQkEzQjQ2Ii8+Cjwvc3ZnPgo=");
        }
        
        .jw-svg-icon-volume-0 path {
          display: none;
        }
        
        .jw-svg-icon-volume-0 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTkuNTc3NSAzLjMzNTI4QzguNzM3NSAyLjg3MDI4IDcuNjY1IDIuOTkwMjggNi41NyAzLjY3Mjc4TDQuMzggNS4wNDUyOEM0LjIzIDUuMTM1MjggNC4wNTc1IDUuMTg3NzggMy44ODUgNS4xODc3OEgzLjE4NzVIMi44MTI1QzAuOTk3NSA1LjE4Nzc4IDAgNi4xODUzMSAwIDguMDAwMzFWMTEuMDAwM0MwIDEyLjgxNTMgMC45OTc1IDEzLjgxMjggMi44MTI1IDEzLjgxMjhIMy4xODc1SDMuODg1QzQuMDU3NSAxMy44MTI4IDQuMjMgMTMuODY1MyA0LjM4IDEzLjk1NTNMNi41NyAxNS4zMjc4QzcuMjMgMTUuNzQwMyA3Ljg3NSAxNS45NDI4IDguNDc1IDE1Ljk0MjhDOC44NjUgMTUuOTQyOCA5LjI0IDE1Ljg1MjggOS41Nzc1IDE1LjY2NTNDMTAuNDEgMTUuMjAwMyAxMC44NzUgMTQuMjMyOCAxMC44NzUgMTIuOTQyOFY2LjA1NzgxQzEwLjg3NSA0Ljc2Nzc4IDEwLjQxIDMuODAwMjggOS41Nzc1IDMuMzM1MjhaIiBmaWxsPSJ3aGl0ZSIvPgo8cGF0aCBkPSJNMTQuNzI1MSAxMS4zODRDMTQuNTkzIDExLjM4NCAxNC40NjA4IDExLjMzNTMgMTQuMzU2NSAxMS4yMzFMMTEuNjAyNCA4LjQ3Njg1QzExLjQwMDcgOC4yNzUxNSAxMS40MDA3IDcuOTQxMzUgMTEuNjAyNCA3LjczOTY1QzExLjgwNDEgNy41Mzc5NSAxMi4xMzc5IDcuNTM3OTUgMTIuMzM5NiA3LjczOTY1TDE1LjA5MzcgMTAuNDkzOEMxNS4yOTU0IDEwLjY5NTUgMTUuMjk1NCAxMS4wMjkzIDE1LjA5MzcgMTEuMjMxQzE0Ljk4OTQgMTEuMzI4NCAxNC44NTczIDExLjM4NCAxNC43MjUxIDExLjM4NFoiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik0xMS45NDM3IDExLjQxMThDMTEuODExNiAxMS40MTE4IDExLjY3OTQgMTEuMzYzMSAxMS41NzUxIDExLjI1ODhDMTEuMzczNCAxMS4wNTcxIDExLjM3MzQgMTAuNzIzMyAxMS41NzUxIDEwLjUyMTZMMTQuMzI5MiA3Ljc2NzQ5QzE0LjUzMDkgNy41NjU3OSAxNC44NjQ4IDcuNTY1NzkgMTUuMDY2NSA3Ljc2NzQ5QzE1LjI2ODIgNy45NjkxNCAxNS4yNjgyIDguMzAyOTkgMTUuMDY2NSA4LjUwNDY5TDEyLjMxMjMgMTEuMjU4OEMxMi4yMDggMTEuMzYzMSAxMi4wNzU5IDExLjQxMTggMTEuOTQzNyAxMS40MTE4WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-volume:hover .jw-svg-icon-volume-0 {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTkuNTc3NSAzLjMzNTI4QzguNzM3NSAyLjg3MDI4IDcuNjY1IDIuOTkwMjggNi41NyAzLjY3Mjc4TDQuMzggNS4wNDUyOEM0LjIzIDUuMTM1MjggNC4wNTc1IDUuMTg3NzggMy44ODUgNS4xODc3OEgzLjE4NzVIMi44MTI1QzAuOTk3NSA1LjE4Nzc4IDAgNi4xODUzMSAwIDguMDAwMzFWMTEuMDAwM0MwIDEyLjgxNTMgMC45OTc1IDEzLjgxMjggMi44MTI1IDEzLjgxMjhIMy4xODc1SDMuODg1QzQuMDU3NSAxMy44MTI4IDQuMjMgMTMuODY1MyA0LjM4IDEzLjk1NTNMNi41NyAxNS4zMjc4QzcuMjMgMTUuNzQwMyA3Ljg3NSAxNS45NDI4IDguNDc1IDE1Ljk0MjhDOC44NjUgMTUuOTQyOCA5LjI0IDE1Ljg1MjggOS41Nzc1IDE1LjY2NTNDMTAuNDEgMTUuMjAwMyAxMC44NzUgMTQuMjMyOCAxMC44NzUgMTIuOTQyOFY2LjA1NzgxQzEwLjg3NSA0Ljc2Nzc4IDEwLjQxIDMuODAwMjggOS41Nzc1IDMuMzM1MjhaIiBmaWxsPSIjQkEzQjQ2Ii8+CjxwYXRoIGQ9Ik0xNC43MjUxIDExLjM4NEMxNC41OTMgMTEuMzg0IDE0LjQ2MDggMTEuMzM1MyAxNC4zNTY1IDExLjIzMUwxMS42MDI0IDguNDc2ODVDMTEuNDAwNyA4LjI3NTE1IDExLjQwMDcgNy45NDEzNSAxMS42MDI0IDcuNzM5NjVDMTEuODA0MSA3LjUzNzk1IDEyLjEzNzkgNy41Mzc5NSAxMi4zMzk2IDcuNzM5NjVMMTUuMDkzNyAxMC40OTM4QzE1LjI5NTQgMTAuNjk1NSAxNS4yOTU0IDExLjAyOTMgMTUuMDkzNyAxMS4yMzFDMTQuOTg5NCAxMS4zMjg0IDE0Ljg1NzMgMTEuMzg0IDE0LjcyNTEgMTEuMzg0WiIgZmlsbD0iI0JBM0I0NiIvPgo8cGF0aCBkPSJNMTEuOTQzNyAxMS40MTE4QzExLjgxMTYgMTEuNDExOCAxMS42Nzk0IDExLjM2MzEgMTEuNTc1MSAxMS4yNTg4QzExLjM3MzQgMTEuMDU3MSAxMS4zNzM0IDEwLjcyMzMgMTEuNTc1MSAxMC41MjE2TDE0LjMyOTIgNy43Njc0OUMxNC41MzA5IDcuNTY1NzkgMTQuODY0OCA3LjU2NTc5IDE1LjA2NjUgNy43Njc0OUMxNS4yNjgyIDcuOTY5MTQgMTUuMjY4MiA4LjMwMjk5IDE1LjA2NjUgOC41MDQ2OUwxMi4zMTIzIDExLjI1ODhDMTIuMjA4IDExLjM2MzEgMTIuMDc1OSAxMS40MTE4IDExLjk0MzcgMTEuNDExOFoiIGZpbGw9IiNCQTNCNDYiLz4KPC9zdmc+Cg==");
        }
        .jw-svg-icon-fullscreen-on path {
          display: none;
        }
        
        .jw-svg-icon-fullscreen-on {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyLjE0MjUgMS41SDUuODU3NUMzLjEyNzUgMS41IDEuNSAzLjEyNzUgMS41IDUuODU3NVYxMi4xMzVDMS41IDE0Ljg3MjUgMy4xMjc1IDE2LjUgNS44NTc1IDE2LjVIMTIuMTM1QzE0Ljg2NSAxNi41IDE2LjQ5MjUgMTQuODcyNSAxNi40OTI1IDEyLjE0MjVWNS44NTc1QzE2LjUgMy4xMjc1IDE0Ljg3MjUgMS41IDEyLjE0MjUgMS41Wk04LjY0NzUgMTAuMTQ3NUw1Ljg1NzUgMTIuOTM3NUg3LjVDNy44MDc1IDEyLjkzNzUgOC4wNjI1IDEzLjE5MjUgOC4wNjI1IDEzLjVDOC4wNjI1IDEzLjgwNzUgNy44MDc1IDE0LjA2MjUgNy41IDE0LjA2MjVINC41QzQuNDI1IDE0LjA2MjUgNC4zNSAxNC4wNDc1IDQuMjgyNSAxNC4wMTc1QzQuMTQ3NSAxMy45NTc1IDQuMDM1IDEzLjg1MjUgMy45NzUgMTMuNzFDMy45NTI1IDEzLjY0MjUgMy45Mzc1IDEzLjU3NSAzLjkzNzUgMTMuNVYxMC41QzMuOTM3NSAxMC4xOTI1IDQuMTkyNSA5LjkzNzUgNC41IDkuOTM3NUM0LjgwNzUgOS45Mzc1IDUuMDYyNSAxMC4xOTI1IDUuMDYyNSAxMC41VjEyLjE0MjVMNy44NTI1IDkuMzUyNUM4LjA3IDkuMTM1IDguNDMgOS4xMzUgOC42NDc1IDkuMzUyNUM4Ljg2NSA5LjU3IDguODY1IDkuOTMgOC42NDc1IDEwLjE0NzVaTTE0LjA2MjUgNy41QzE0LjA2MjUgNy44MDc1IDEzLjgwNzUgOC4wNjI1IDEzLjUgOC4wNjI1QzEzLjE5MjUgOC4wNjI1IDEyLjkzNzUgNy44MDc1IDEyLjkzNzUgNy41VjUuODU3NUwxMC4xNDc1IDguNjQ3NUMxMC4wMzUgOC43NiA5Ljg5MjUgOC44MTI1IDkuNzUgOC44MTI1QzkuNjA3NSA4LjgxMjUgOS40NjUgOC43NiA5LjM1MjUgOC42NDc1QzkuMTM1IDguNDMgOS4xMzUgOC4wNyA5LjM1MjUgNy44NTI1TDEyLjE0MjUgNS4wNjI1SDEwLjVDMTAuMTkyNSA1LjA2MjUgOS45Mzc1IDQuODA3NSA5LjkzNzUgNC41QzkuOTM3NSA0LjE5MjUgMTAuMTkyNSAzLjkzNzUgMTAuNSAzLjkzNzVIMTMuNUMxMy41NzUgMy45Mzc1IDEzLjY0MjUgMy45NTI1IDEzLjcxNzUgMy45ODI1QzEzLjg1MjUgNC4wNDI1IDEzLjk2NSA0LjE0NzUgMTQuMDI1IDQuMjlDMTQuMDQ3NSA0LjM1NzUgMTQuMDYyNSA0LjQyNSAxNC4wNjI1IDQuNVY3LjVaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-fullscreen:hover .jw-svg-icon-fullscreen-on {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyLjE0MjUgMS41SDUuODU3NUMzLjEyNzUgMS41IDEuNSAzLjEyNzUgMS41IDUuODU3NVYxMi4xMzVDMS41IDE0Ljg3MjUgMy4xMjc1IDE2LjUgNS44NTc1IDE2LjVIMTIuMTM1QzE0Ljg2NSAxNi41IDE2LjQ5MjUgMTQuODcyNSAxNi40OTI1IDEyLjE0MjVWNS44NTc1QzE2LjUgMy4xMjc1IDE0Ljg3MjUgMS41IDEyLjE0MjUgMS41Wk04LjY0NzUgMTAuMTQ3NUw1Ljg1NzUgMTIuOTM3NUg3LjVDNy44MDc1IDEyLjkzNzUgOC4wNjI1IDEzLjE5MjUgOC4wNjI1IDEzLjVDOC4wNjI1IDEzLjgwNzUgNy44MDc1IDE0LjA2MjUgNy41IDE0LjA2MjVINC41QzQuNDI1IDE0LjA2MjUgNC4zNSAxNC4wNDc1IDQuMjgyNSAxNC4wMTc1QzQuMTQ3NSAxMy45NTc1IDQuMDM1IDEzLjg1MjUgMy45NzUgMTMuNzFDMy45NTI1IDEzLjY0MjUgMy45Mzc1IDEzLjU3NSAzLjkzNzUgMTMuNVYxMC41QzMuOTM3NSAxMC4xOTI1IDQuMTkyNSA5LjkzNzUgNC41IDkuOTM3NUM0LjgwNzUgOS45Mzc1IDUuMDYyNSAxMC4xOTI1IDUuMDYyNSAxMC41VjEyLjE0MjVMNy44NTI1IDkuMzUyNUM4LjA3IDkuMTM1IDguNDMgOS4xMzUgOC42NDc1IDkuMzUyNUM4Ljg2NSA5LjU3IDguODY1IDkuOTMgOC42NDc1IDEwLjE0NzVaTTE0LjA2MjUgNy41QzE0LjA2MjUgNy44MDc1IDEzLjgwNzUgOC4wNjI1IDEzLjUgOC4wNjI1QzEzLjE5MjUgOC4wNjI1IDEyLjkzNzUgNy44MDc1IDEyLjkzNzUgNy41VjUuODU3NUwxMC4xNDc1IDguNjQ3NUMxMC4wMzUgOC43NiA5Ljg5MjUgOC44MTI1IDkuNzUgOC44MTI1QzkuNjA3NSA4LjgxMjUgOS40NjUgOC43NiA5LjM1MjUgOC42NDc1QzkuMTM1IDguNDMgOS4xMzUgOC4wNyA5LjM1MjUgNy44NTI1TDEyLjE0MjUgNS4wNjI1SDEwLjVDMTAuMTkyNSA1LjA2MjUgOS45Mzc1IDQuODA3NSA5LjkzNzUgNC41QzkuOTM3NSA0LjE5MjUgMTAuMTkyNSAzLjkzNzUgMTAuNSAzLjkzNzVIMTMuNUMxMy41NzUgMy45Mzc1IDEzLjY0MjUgMy45NTI1IDEzLjcxNzUgMy45ODI1QzEzLjg1MjUgNC4wNDI1IDEzLjk2NSA0LjE0NzUgMTQuMDI1IDQuMjlDMTQuMDQ3NSA0LjM1NzUgMTQuMDYyNSA0LjQyNSAxNC4wNjI1IDQuNVY3LjVaIiBmaWxsPSIjQkEzQjQ2Ii8+Cjwvc3ZnPgo=");
        }
        
        .jw-svg-icon-fullscreen-off path {
          display: none;
        }
        
        .jw-svg-icon-fullscreen-off {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyLjE0MjUgMS41SDUuODU3NUMzLjEyNzUgMS41IDEuNSAzLjEyNzUgMS41IDUuODU3NVYxMi4xMzVDMS41IDE0Ljg3MjUgMy4xMjc1IDE2LjUgNS44NTc1IDE2LjVIMTIuMTM1QzE0Ljg2NSAxNi41IDE2LjQ5MjUgMTQuODcyNSAxNi40OTI1IDEyLjE0MjVWNS44NTc1QzE2LjUgMy4xMjc1IDE0Ljg3MjUgMS41IDEyLjE0MjUgMS41Wk03LjY2NSAxNS43NUg1LjkzMjVDMy45IDE1Ljc1IDIuMjUgMTQuMSAyLjI1IDEyLjA2NzVWMTAuMzM1QzIuMjUgMTAuMDI3NSAyLjUwNSA5Ljc3MjUgMi44MTI1IDkuNzcyNUMzLjEyIDkuNzcyNSAzLjM3NSAxMC4wMjc1IDMuMzc1IDEwLjMzNVYxMi4wNjc1QzMuMzc1IDEzLjQ3NzUgNC41MjI1IDE0LjYyNSA1LjkzMjUgMTQuNjI1SDcuNjY1QzcuOTcyNSAxNC42MjUgOC4yMjc1IDE0Ljg4IDguMjI3NSAxNS4xODc1QzguMjI3NSAxNS40OTUgNy45OCAxNS43NSA3LjY2NSAxNS43NVpNNy42NjUgMy4zNzVINS45MzI1QzQuNTIyNSAzLjM3NSAzLjM3NSA0LjUyMjUgMy4zNzUgNS45MzI1VjcuNjY1QzMuMzc1IDcuOTcyNSAzLjEyIDguMjI3NSAyLjgxMjUgOC4yMjc1QzIuNTA1IDguMjI3NSAyLjI1IDcuOTggMi4yNSA3LjY2NVY1LjkzMjVDMi4yNSAzLjkgMy45IDIuMjUgNS45MzI1IDIuMjVINy42NjVDNy45NzI1IDIuMjUgOC4yMjc1IDIuNTA1IDguMjI3NSAyLjgxMjVDOC4yMjc1IDMuMTIgNy45OCAzLjM3NSA3LjY2NSAzLjM3NVpNMTUuNzUgMTIuMDY3NUMxNS43NSAxNC4xIDE0LjEgMTUuNzUgMTIuMDY3NSAxNS43NUgxMS4wMjVDMTAuNzE3NSAxNS43NSAxMC40NjI1IDE1LjQ5NSAxMC40NjI1IDE1LjE4NzVDMTAuNDYyNSAxNC44OCAxMC43MTc1IDE0LjYyNSAxMS4wMjUgMTQuNjI1SDEyLjA2NzVDMTMuNDc3NSAxNC42MjUgMTQuNjI1IDEzLjQ3NzUgMTQuNjI1IDEyLjA2NzVWMTEuMDI1QzE0LjYyNSAxMC43MTc1IDE0Ljg4IDEwLjQ2MjUgMTUuMTg3NSAxMC40NjI1QzE1LjQ5NSAxMC40NjI1IDE1Ljc1IDEwLjcxNzUgMTUuNzUgMTEuMDI1VjEyLjA2NzVaTTE1Ljc1IDcuNjY1QzE1Ljc1IDcuOTcyNSAxNS40OTUgOC4yMjc1IDE1LjE4NzUgOC4yMjc1QzE0Ljg4IDguMjI3NSAxNC42MjUgNy45NzI1IDE0LjYyNSA3LjY2NVY1LjkzMjVDMTQuNjI1IDQuNTIyNSAxMy40Nzc1IDMuMzc1IDEyLjA2NzUgMy4zNzVIMTAuMzM1QzEwLjAyNzUgMy4zNzUgOS43NzI1IDMuMTIgOS43NzI1IDIuODEyNUM5Ljc3MjUgMi41MDUgMTAuMDIgMi4yNSAxMC4zMzUgMi4yNUgxMi4wNjc1QzE0LjEgMi4yNSAxNS43NSAzLjkgMTUuNzUgNS45MzI1VjcuNjY1WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-fullscreen:hover .jw-svg-icon-fullscreen-off {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyLjE0MjUgMS41SDUuODU3NUMzLjEyNzUgMS41IDEuNSAzLjEyNzUgMS41IDUuODU3NVYxMi4xMzVDMS41IDE0Ljg3MjUgMy4xMjc1IDE2LjUgNS44NTc1IDE2LjVIMTIuMTM1QzE0Ljg2NSAxNi41IDE2LjQ5MjUgMTQuODcyNSAxNi40OTI1IDEyLjE0MjVWNS44NTc1QzE2LjUgMy4xMjc1IDE0Ljg3MjUgMS41IDEyLjE0MjUgMS41Wk03LjY2NSAxNS43NUg1LjkzMjVDMy45IDE1Ljc1IDIuMjUgMTQuMSAyLjI1IDEyLjA2NzVWMTAuMzM1QzIuMjUgMTAuMDI3NSAyLjUwNSA5Ljc3MjUgMi44MTI1IDkuNzcyNUMzLjEyIDkuNzcyNSAzLjM3NSAxMC4wMjc1IDMuMzc1IDEwLjMzNVYxMi4wNjc1QzMuMzc1IDEzLjQ3NzUgNC41MjI1IDE0LjYyNSA1LjkzMjUgMTQuNjI1SDcuNjY1QzcuOTcyNSAxNC42MjUgOC4yMjc1IDE0Ljg4IDguMjI3NSAxNS4xODc1QzguMjI3NSAxNS40OTUgNy45OCAxNS43NSA3LjY2NSAxNS43NVpNNy42NjUgMy4zNzVINS45MzI1QzQuNTIyNSAzLjM3NSAzLjM3NSA0LjUyMjUgMy4zNzUgNS45MzI1VjcuNjY1QzMuMzc1IDcuOTcyNSAzLjEyIDguMjI3NSAyLjgxMjUgOC4yMjc1QzIuNTA1IDguMjI3NSAyLjI1IDcuOTggMi4yNSA3LjY2NVY1LjkzMjVDMi4yNSAzLjkgMy45IDIuMjUgNS45MzI1IDIuMjVINy42NjVDNy45NzI1IDIuMjUgOC4yMjc1IDIuNTA1IDguMjI3NSAyLjgxMjVDOC4yMjc1IDMuMTIgNy45OCAzLjM3NSA3LjY2NSAzLjM3NVpNMTUuNzUgMTIuMDY3NUMxNS43NSAxNC4xIDE0LjEgMTUuNzUgMTIuMDY3NSAxNS43NUgxMS4wMjVDMTAuNzE3NSAxNS43NSAxMC40NjI1IDE1LjQ5NSAxMC40NjI1IDE1LjE4NzVDMTAuNDYyNSAxNC44OCAxMC43MTc1IDE0LjYyNSAxMS4wMjUgMTQuNjI1SDEyLjA2NzVDMTMuNDc3NSAxNC42MjUgMTQuNjI1IDEzLjQ3NzUgMTQuNjI1IDEyLjA2NzVWMTEuMDI1QzE0LjYyNSAxMC43MTc1IDE0Ljg4IDEwLjQ2MjUgMTUuMTg3NSAxMC40NjI1QzE1LjQ5NSAxMC40NjI1IDE1Ljc1IDEwLjcxNzUgMTUuNzUgMTEuMDI1VjEyLjA2NzVaTTE1Ljc1IDcuNjY1QzE1Ljc1IDcuOTcyNSAxNS40OTUgOC4yMjc1IDE1LjE4NzUgOC4yMjc1QzE0Ljg4IDguMjI3NSAxNC42MjUgNy45NzI1IDE0LjYyNSA3LjY2NVY1LjkzMjVDMTQuNjI1IDQuNTIyNSAxMy40Nzc1IDMuMzc1IDEyLjA2NzUgMy4zNzVIMTAuMzM1QzEwLjAyNzUgMy4zNzUgOS43NzI1IDMuMTIgOS43NzI1IDIuODEyNUM5Ljc3MjUgMi41MDUgMTAuMDIgMi4yNSAxMC4zMzUgMi4yNUgxMi4wNjc1QzE0LjEgMi4yNSAxNS43NSAzLjkgMTUuNzUgNS45MzI1VjcuNjY1WiIgZmlsbD0iI0JBM0I0NiIvPgo8L3N2Zz4K");
        }
        .jw-state-paused .jw-svg-icon-play path {
          display: none;
        }
        
        .jw-state-paused .jw-svg-icon-play {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjExNzUgNy41Njk2OUw0LjIgMTIuODAxOUMzLjY3NSAxMy4xMDgzIDMgMTIuNzQzNSAzIDEyLjE0NTFWNi4zMDcyNkMzIDMuNzYwNDkgNS44Mjc1IDIuMTY5NjggOC4xIDMuNDM5NDFMMTEuNTQyNSA1LjM2NTkxTDEzLjExIDYuMjQxNThDMTMuNjI3NSA2LjU0MDc3IDEzLjYzNSA3LjI3MDUgMTMuMTE3NSA3LjU2OTY5WiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZD0iTTEzLjU2NjYgMTEuODQ2MkwxMC41MjkxIDEzLjU1MzhMNy40OTkxMyAxNS4yNTQxQzYuNDExNjMgMTUuODU5NyA1LjE4MTYzIDE1LjczNTcgNC4yODkxMyAxNS4xMjI3QzMuODU0MTMgMTQuODMwOCAzLjkwNjYzIDE0LjE4MTMgNC4zNjQxMyAxMy45MTg2TDEzLjg5NjYgOC4zNTgxMUMxNC4zNDY2IDguMDk1NCAxNC45MzkxIDguMzQzNTEgMTUuMDIxNiA4Ljg0NzAzQzE1LjIwOTEgOS45NzgxMSAxNC43MjkxIDExLjE5NjggMTMuNTY2NiAxMS44NDYyWiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-state-paused .jw-icon-playback:hover .jw-svg-icon-play {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEzLjExNzUgNy4wNjk2OUw0LjIgMTIuMzAxOUMzLjY3NSAxMi42MDgzIDMgMTIuMjQzNSAzIDExLjY0NTFWNS44MDcyNkMzIDMuMjYwNDkgNS44Mjc1IDEuNjY5NjggOC4xIDIuOTM5NDFMMTEuNTQyNSA0Ljg2NTkxTDEzLjExIDUuNzQxNThDMTMuNjI3NSA2LjA0MDc3IDEzLjYzNSA2Ljc3MDUgMTMuMTE3NSA3LjA2OTY5WiIgZmlsbD0iI0JBM0I0NiIvPgo8cGF0aCBkPSJNMTMuNTY2NiAxMS4zNDYyTDEwLjUyOTEgMTMuMDUzOEw3LjQ5OTEzIDE0Ljc1NDFDNi40MTE2MyAxNS4zNTk3IDUuMTgxNjMgMTUuMjM1NyA0LjI4OTEzIDE0LjYyMjdDMy44NTQxMyAxNC4zMzA4IDMuOTA2NjMgMTMuNjgxMyA0LjM2NDEzIDEzLjQxODZMMTMuODk2NiA3Ljg1ODExQzE0LjM0NjYgNy41OTU0IDE0LjkzOTEgNy44NDM1MSAxNS4wMjE2IDguMzQ3MDNDMTUuMjA5MSA5LjQ3ODExIDE0LjcyOTEgMTAuNjk2OCAxMy41NjY2IDExLjM0NjJaIiBmaWxsPSIjQkEzQjQ2Ii8+Cjwvc3ZnPgo=");
        }
        
        .jw-svg-icon-pause path {
          display: none;
        }
        
        .jw-svg-icon-pause {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTcuOTg3NSAxNC44MzI1VjQuMTY3NUM3Ljk4NzUgMy4xNTUgNy41NiAyLjc1IDYuNDggMi43NUgzLjc1NzVDMi42Nzc1IDIuNzUgMi4yNSAzLjE1NSAyLjI1IDQuMTY3NVYxNC44MzI1QzIuMjUgMTUuODQ1IDIuNjc3NSAxNi4yNSAzLjc1NzUgMTYuMjVINi40OEM3LjU2IDE2LjI1IDcuOTg3NSAxNS44NDUgNy45ODc1IDE0LjgzMjVaIiBmaWxsPSJ3aGl0ZSIvPgo8cGF0aCBkPSJNMTUuNzQ5MiAxNC44MzI1VjQuMTY3NUMxNS43NDkyIDMuMTU1IDE1LjMyMTcgMi43NSAxNC4yNDE3IDIuNzVIMTEuNTE5MkMxMC40NDY3IDIuNzUgMTAuMDExNyAzLjE1NSAxMC4wMTE3IDQuMTY3NVYxNC44MzI1QzEwLjAxMTcgMTUuODQ1IDEwLjQzOTIgMTYuMjUgMTEuNTE5MiAxNi4yNUgxNC4yNDE3QzE1LjMyMTcgMTYuMjUgMTUuNzQ5MiAxNS44NDUgMTUuNzQ5MiAxNC44MzI1WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-icon-playback:hover .jw-svg-icon-pause {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTcuOTg3NSAxNC4zMzI1VjMuNjY3NUM3Ljk4NzUgMi42NTUgNy41NiAyLjI1IDYuNDggMi4yNUgzLjc1NzVDMi42Nzc1IDIuMjUgMi4yNSAyLjY1NSAyLjI1IDMuNjY3NVYxNC4zMzI1QzIuMjUgMTUuMzQ1IDIuNjc3NSAxNS43NSAzLjc1NzUgMTUuNzVINi40OEM3LjU2IDE1Ljc1IDcuOTg3NSAxNS4zNDUgNy45ODc1IDE0LjMzMjVaIiBmaWxsPSIjQkEzQjQ2Ii8+CjxwYXRoIGQ9Ik0xNS43NDkyIDE0LjMzMjVWMy42Njc1QzE1Ljc0OTIgMi42NTUgMTUuMzIxNyAyLjI1IDE0LjI0MTcgMi4yNUgxMS41MTkyQzEwLjQ0NjcgMi4yNSAxMC4wMTE3IDIuNjU1IDEwLjAxMTcgMy42Njc1VjE0LjMzMjVDMTAuMDExNyAxNS4zNDUgMTAuNDM5MiAxNS43NSAxMS41MTkyIDE1Ljc1SDE0LjI0MTdDMTUuMzIxNyAxNS43NSAxNS43NDkyIDE1LjM0NSAxNS43NDkyIDE0LjMzMjVaIiBmaWxsPSIjQkEzQjQ2Ii8+Cjwvc3ZnPgo=");
        }
        .jw-svg-icon-settings
        {
          background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzciIGhlaWdodD0iMzciIHZpZXdCb3g9IjAgMCAzNyAzNyIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTMzLjM1NzQgMjQuNDE3M0wzMy4zNTc0IDExLjg0NzNDMzMuMzU3NCA2LjM4NzMyIDMwLjEwMjQgMy4xMzIzMiAyNC42NDI0IDMuMTMyMzJMMTIuMDg3NCAzLjEzMjMyQzYuNjEyNDIgMy4xMzIzMiAzLjM1NzQyIDYuMzg3MzIgMy4zNTc0MiAxMS44NDczTDMuMzU3NDIgMjQuNDAyM0MzLjM1NzQyIDI5Ljg2MjMgNi42MTI0MiAzMy4xMTczIDEyLjA3MjQgMzMuMTE3M0wyNC42NDI0IDMzLjExNzNDMzAuMTAyNCAzMy4xMzIzIDMzLjM1NzQgMjkuODc3MyAzMy4zNTc0IDI0LjQxNzNaTTI4LjEwNzQgMTEuNjM3M0MyOC43MjI0IDExLjYzNzMgMjkuMjMyNCAxMi4xNDczIDI5LjIzMjQgMTIuNzYyM0MyOS4yMzI0IDEzLjM3NzMgMjguNzIyNCAxMy44ODczIDI4LjEwNzQgMTMuODg3M0wyMi4yNTc0IDEzLjg4NzNDMjEuNjQyNCAxMy44ODczIDIxLjEzMjQgMTMuMzc3MyAyMS4xMzI0IDEyLjc2MjNDMjEuMTMyNCAxMi4xNDczIDIxLjY0MjQgMTEuNjM3MyAyMi4yNTc0IDExLjYzNzNMMjguMTA3NCAxMS42MzczWk0xMS42MzgyIDE0LjI0MzFDMTEuNTU3MSAxNC4wMzU4IDExLjM2NDIgMTMuODg3MyAxMS4xNDE2IDEzLjg4NzNMOC42MDc0MiAxMy44ODczQzcuOTkyNDIgMTMuODg3MyA3LjQ4MjQyIDEzLjM3NzMgNy40ODI0MiAxMi43NjIzQzcuNDgyNDIgMTIuMTQ3MyA3Ljk5MjQyIDExLjYzNzMgOC42MDc0MiAxMS42MzczTDExLjE0MTYgMTEuNjM3M0MxMS4zNjQyIDExLjYzNzMgMTEuNTU3MSAxMS40ODg4IDExLjYzODIgMTEuMjgxNUMxMi4yMzQ3IDkuNzU3MzQgMTMuNzA0MSA4LjY4MjMyIDE1LjQzMjQgOC42ODIzMkMxNy42ODI0IDguNjgyMzIgMTkuNTI3NCAxMC41MTIzIDE5LjUyNzQgMTIuNzYyM0MxOS41Mjc0IDE1LjAxMjMgMTcuNjk3NCAxNi44NTczIDE1LjQzMjQgMTYuODU3M0MxMy43MDQgMTYuODU3MyAxMi4yMzQ2IDE1Ljc2OTMgMTEuNjM4MiAxNC4yNDMxWk04LjYwNzQyIDI0LjYyNzNDNy45OTI0MiAyNC42MjczIDcuNDgyNDIgMjQuMTE3MyA3LjQ4MjQyIDIzLjUwMjNDNy40ODI0MiAyMi44ODczIDcuOTkyNDIgMjIuMzc3MyA4LjYwNzQyIDIyLjM3NzNMMTQuNDU3NCAyMi4zNzczQzE1LjA3MjQgMjIuMzc3MyAxNS41ODI0IDIyLjg4NzMgMTUuNTgyNCAyMy41MDIzQzE1LjU4MjQgMjQuMTE3MyAxNS4wNzI0IDI0LjYyNzMgMTQuNDU3NCAyNC42MjczTDguNjA3NDIgMjQuNjI3M1pNMTcuMjAyNCAyMy41MDIzQzE3LjIwMjQgMjEuMjUyMyAxOS4wMzI0IDE5LjQwNzMgMjEuMjk3NCAxOS40MDczQzIzLjAyNTkgMTkuNDA3MyAyNC40OTUyIDIwLjQ5NTQgMjUuMDkxNyAyMi4wMjE1QzI1LjE3MjcgMjIuMjI4OCAyNS4zNjU2IDIyLjM3NzMgMjUuNTg4MiAyMi4zNzczTDI4LjEwNzQgMjIuMzc3M0MyOC43MjI0IDIyLjM3NzMgMjkuMjMyNCAyMi44ODczIDI5LjIzMjQgMjMuNTAyM0MyOS4yMzI0IDI0LjExNzMgMjguNzIyNCAyNC42MjczIDI4LjEwNzQgMjQuNjI3M0wyNS41NzMyIDI0LjYyNzNDMjUuMzUwNiAyNC42MjczIDI1LjE1NzcgMjQuNzc1OCAyNS4wNzY2IDI0Ljk4MzFDMjQuNDgwMSAyNi41MDczIDIzLjAxMDggMjcuNTgyMyAyMS4yODI0IDI3LjU4MjNDMTkuMDMyNCAyNy41ODIzIDE3LjIwMjQgMjUuNzUyMyAxNy4yMDI0IDIzLjUwMjNaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K");
          background-size: contain;
          background-repeat: no-repeat;
        }
        
        .jw-tooltip-settings:hover
        {
           background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzciIGhlaWdodD0iMzciIHZpZXdCb3g9IjAgMCAzNyAzNyIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTMzLjM1NzQgMjQuNDE3M0wzMy4zNTc0IDExLjg0NzNDMzMuMzU3NCA2LjM4NzMyIDMwLjEwMjQgMy4xMzIzMiAyNC42NDI0IDMuMTMyMzJMMTIuMDg3NCAzLjEzMjMyQzYuNjEyNDIgMy4xMzIzMiAzLjM1NzQyIDYuMzg3MzIgMy4zNTc0MiAxMS44NDczTDMuMzU3NDIgMjQuNDAyM0MzLjM1NzQyIDI5Ljg2MjMgNi42MTI0MiAzMy4xMTczIDEyLjA3MjQgMzMuMTE3M0wyNC42NDI0IDMzLjExNzNDMzAuMTAyNCAzMy4xMzIzIDMzLjM1NzQgMjkuODc3MyAzMy4zNTc0IDI0LjQxNzNaTTI4LjEwNzQgMTEuNjM3M0MyOC43MjI0IDExLjYzNzMgMjkuMjMyNCAxMi4xNDczIDI5LjIzMjQgMTIuNzYyM0MyOS4yMzI0IDEzLjM3NzMgMjguNzIyNCAxMy44ODczIDI4LjEwNzQgMTMuODg3M0wyMi4yNTc0IDEzLjg4NzNDMjEuNjQyNCAxMy44ODczIDIxLjEzMjQgMTMuMzc3MyAyMS4xMzI0IDEyLjc2MjNDMjEuMTMyNCAxMi4xNDczIDIxLjY0MjQgMTEuNjM3MyAyMi4yNTc0IDExLjYzNzNMMjguMTA3NCAxMS42MzczWk0xMS42MzgyIDE0LjI0MzFDMTEuNTU3MSAxNC4wMzU4IDExLjM2NDIgMTMuODg3MyAxMS4xNDE2IDEzLjg4NzNMOC42MDc0MiAxMy44ODczQzcuOTkyNDIgMTMuODg3MyA3LjQ4MjQyIDEzLjM3NzMgNy40ODI0MiAxMi43NjIzQzcuNDgyNDIgMTIuMTQ3MyA3Ljk5MjQyIDExLjYzNzMgOC42MDc0MiAxMS42MzczTDExLjE0MTYgMTEuNjM3M0MxMS4zNjQyIDExLjYzNzMgMTEuNTU3MSAxMS40ODg4IDExLjYzODIgMTEuMjgxNUMxMi4yMzQ3IDkuNzU3MzQgMTMuNzA0MSA4LjY4MjMyIDE1LjQzMjQgOC42ODIzMkMxNy42ODI0IDguNjgyMzIgMTkuNTI3NCAxMC41MTIzIDE5LjUyNzQgMTIuNzYyM0MxOS41Mjc0IDE1LjAxMjMgMTcuNjk3NCAxNi44NTczIDE1LjQzMjQgMTYuODU3M0MxMy43MDQgMTYuODU3MyAxMi4yMzQ2IDE1Ljc2OTMgMTEuNjM4MiAxNC4yNDMxWk04LjYwNzQyIDI0LjYyNzNDNy45OTI0MiAyNC42MjczIDcuNDgyNDIgMjQuMTE3MyA3LjQ4MjQyIDIzLjUwMjNDNy40ODI0MiAyMi44ODczIDcuOTkyNDIgMjIuMzc3MyA4LjYwNzQyIDIyLjM3NzNMMTQuNDU3NCAyMi4zNzczQzE1LjA3MjQgMjIuMzc3MyAxNS41ODI0IDIyLjg4NzMgMTUuNTgyNCAyMy41MDIzQzE1LjU4MjQgMjQuMTE3MyAxNS4wNzI0IDI0LjYyNzMgMTQuNDU3NCAyNC42MjczTDguNjA3NDIgMjQuNjI3M1pNMTcuMjAyNCAyMy41MDIzQzE3LjIwMjQgMjEuMjUyMyAxOS4wMzI0IDE5LjQwNzMgMjEuMjk3NCAxOS40MDczQzIzLjAyNTkgMTkuNDA3MyAyNC40OTUyIDIwLjQ5NTQgMjUuMDkxNyAyMi4wMjE1QzI1LjE3MjcgMjIuMjI4OCAyNS4zNjU2IDIyLjM3NzMgMjUuNTg4MiAyMi4zNzczTDI4LjEwNzQgMjIuMzc3M0MyOC43MjI0IDIyLjM3NzMgMjkuMjMyNCAyMi44ODczIDI5LjIzMjQgMjMuNTAyM0MyOS4yMzI0IDI0LjExNzMgMjguNzIyNCAyNC42MjczIDI4LjEwNzQgMjQuNjI3M0wyNS41NzMyIDI0LjYyNzNDMjUuMzUwNiAyNC42MjczIDI1LjE1NzcgMjQuNzc1OCAyNS4wNzY2IDI0Ljk4MzFDMjQuNDgwMSAyNi41MDczIDIzLjAxMDggMjcuNTgyMyAyMS4yODI0IDI3LjU4MjNDMTkuMDMyNCAyNy41ODIzIDE3LjIwMjQgMjUuNzUyMyAxNy4yMDI0IDIzLjUwMjNaIiBmaWxsPSIjQkEzQjQ2Ii8+Cjwvc3ZnPgo=");
          background-size: contain;
          background-repeat: no-repeat;
        }
        .jw-svg-icon-rewind{
            background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTkiIHZpZXdCb3g9IjAgMCAxOCAxOSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwLjgyMTYgMTMuMTkwMkg5LjEwNDFDOC43OTY2IDEzLjE5MDIgOC41NDE2IDEyLjkzNTIgOC41NDE2IDEyLjYyNzdDOC41NDE2IDEyLjMyMDIgOC43OTY2IDEyLjA2NTIgOS4xMDQxIDEyLjA2NTJIMTAuODIxNkMxMS4xNDQxIDEyLjA2NTIgMTEuNDA2NiAxMS44MDI3IDExLjQwNjYgMTEuNDgwMkMxMS40MDY2IDExLjE1NzcgMTEuMTQ0MSAxMC44OTUyIDEwLjgyMTYgMTAuODk1Mkg5LjEwNDFDOC45MjQxIDEwLjg5NTIgOC43NTE2MiAxMC44MDUyIDguNjQ2NjIgMTAuNjYyN0M4LjU0MTYyIDEwLjUyMDIgOC41MTE1OSAxMC4zMjUyIDguNTcxNTkgMTAuMTUyN0w5LjE0MTYgOC40MzUyNEM5LjIxNjYgOC4yMDI3NCA5LjQzNDExIDguMDUyNzMgOS42NzQxMSA4LjA1MjczSDExLjk2OTFDMTIuMjc2NiA4LjA1MjczIDEyLjUzMTYgOC4zMDc3MyAxMi41MzE2IDguNjE1MjNDMTIuNTMxNiA4LjkyMjczIDEyLjI3NjYgOS4xNzc3MyAxMS45NjkxIDkuMTc3NzNIMTAuMDc5MUw5Ljg4NDA5IDkuNzcwMjJIMTAuODIxNkMxMS43NjY2IDkuNzcwMjIgMTIuNTMxNiAxMC41MzUyIDEyLjUzMTYgMTEuNDgwMkMxMi41MzE2IDEyLjQyNTIgMTEuNzU5MSAxMy4xOTAyIDEwLjgyMTYgMTMuMTkwMloiIGZpbGw9IndoaXRlIi8+CjxwYXRoIGQ9Ik03LjE1NTE1IDEzLjE4OTZDNi44NDc2NSAxMy4xODk2IDYuNTkyNjUgMTIuOTM0NiA2LjU5MjY1IDEyLjYyNzFWMTAuMDg0Nkw2LjQ1MDE1IDEwLjI0OTZDNi4yNDAxNSAxMC40ODIxIDUuODg3NjUgMTAuNDk3MSA1LjY1NTE1IDEwLjI5NDZDNS40MjI2NSAxMC4wODQ2IDUuNDA3NjUgOS43MzIxMyA1LjYxMDE1IDkuNDk5NjNMNi43MzUxNSA4LjI0NzE0QzYuODkyNjUgOC4wNzQ2NCA3LjE0MDE2IDguMDE0NjMgNy4zNTc2NiA4LjA5NzEzQzcuNTc1MTYgOC4xNzk2MyA3LjcxNzY1IDguMzg5NjQgNy43MTc2NSA4LjYyMjE0VjEyLjYzNDZDNy43MTc2NSAxMi45NDIxIDcuNDcwMTUgMTMuMTg5NiA3LjE1NTE1IDEzLjE4OTZaIiBmaWxsPSJ3aGl0ZSIvPgo8cGF0aCBkPSJNMTAuNDg1OCA0LjQxNDhDMTAuMzIwOCA0LjQxNDggMTAuMTU1OCA0LjMzOTgyIDEwLjA1MDggNC4yMDQ4Mkw4LjU2NTc4IDIuMzUyM0M4LjM3MDc4IDIuMTEyMyA4LjQwODI4IDEuNzUyMyA4LjY1NTc4IDEuNTY0OEM4Ljg5NTc4IDEuMzY5OCA5LjI0ODMxIDEuNDA3MyA5LjQ0MzMxIDEuNjU0OEwxMC45MjgzIDMuNTA3MzJDMTEuMTIzMyAzLjc0NzMyIDExLjA4NTggNC4xMDczMiAxMC44MzgzIDQuMjk0ODJDMTAuNzMzMyA0LjM2OTgyIDEwLjYwNTggNC40MTQ4IDEwLjQ4NTggNC40MTQ4WiIgZmlsbD0id2hpdGUiLz4KPHBhdGggZD0iTTguOTk5NTQgMTcuNTYyNkM1LjAxNzA0IDE3LjU2MjYgMS43Njk1MyAxNC4zMjI1IDEuNzY5NTMgMTAuMzMyNkMxLjc2OTUzIDYuMzQyNTUgNS4wMDk1NCAzLjEwMjU0IDguOTk5NTQgMy4xMDI1NEM5LjUxNzA0IDMuMTAyNTQgMTAuMDQyMSAzLjE2MjU1IDEwLjYxMjEgMy4yOTc1NUMxMC45MTIxIDMuMzY1MDUgMTEuMTA3MSAzLjY3MjU2IDExLjAzMjEgMy45NzI1NkMxMC45NjQ2IDQuMjcyNTYgMTAuNjU3IDQuNDY3NTYgMTAuMzU3IDQuMzkyNTZDOS44NzcwNCA0LjI4MDA2IDkuNDI3MDQgNC4yMjc1NCA4Ljk5OTU0IDQuMjI3NTRDNS42MzIwNCA0LjIyNzU0IDIuODk0NTMgNi45NjUwNSAyLjg5NDUzIDEwLjMzMjZDMi44OTQ1MyAxMy43MDAxIDUuNjMyMDQgMTYuNDM3NiA4Ljk5OTU0IDE2LjQzNzZDMTIuMzY3IDE2LjQzNzYgMTUuMTA0NiAxMy43MDAxIDE1LjEwNDYgMTAuMzMyNkMxNS4xMDQ2IDkuMDI3NTUgMTQuNjc3IDcuNzY3NTYgMTMuODY3IDYuNjg3NTZDMTMuNjc5NSA2LjQ0MDA2IDEzLjczMjEgNi4wODc1NyAxMy45Nzk2IDUuOTAwMDdDMTQuMjI3MSA1LjcxMjU3IDE0LjU3OTUgNS43NjUwNCAxNC43NjcgNi4wMTI1NEMxNS43MjcgNy4yODc1NCAxNi4yMjk2IDguNzgwMDUgMTYuMjI5NiAxMC4zMzI2QzE2LjIyOTYgMTQuMzIyNSAxMi45ODIgMTcuNTYyNiA4Ljk5OTU0IDE3LjU2MjZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K");
            background-size: contain;
          background-repeat: no-repeat;
        }
        .jw-slider-horizontal.jw-chapter-slider-time .jw-slider-container .jw-timesegment-progress
        {
            background-color:#BA3B46;
        }
        /* Target the progress element inside the .jw-timesegment-progress */
        .jw-slider-horizontal.jw-chapter-slider-time .jw-slider-container .jw-timesegment-progress progress::-webkit-progress-bar {
            border-radius: 10px; /* Adjust the radius as needed */
        }
        
        /* Target the value part of the progress element */
        .jw-slider-horizontal.jw-chapter-slider-time .jw-slider-container .jw-timesegment-progress progress::-webkit-progress-value {
            border-radius: 10px; /* Adjust the radius as needed */
        }
        
        /* For Firefox */
        .jw-slider-horizontal.jw-chapter-slider-time .jw-slider-container .jw-timesegment-progress progress {
            border-radius: 10px; /* Adjust the radius as needed */
        }
        .jw-settings-menu {
            border-radius:8px;
        }
        .jw-svg-icon-close
        {
            background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTIiIHZpZXdCb3g9IjAgMCAxOCAxMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE0LjkxODggMi4xNzg3MUg4LjY4ODc3SDMuMDc4NzdDMi4xMTg3NyAyLjE3ODcxIDEuNjM4NzcgMy4zMzg3MSAyLjMxODc3IDQuMDE4NzFMNy40OTg3NyA5LjE5ODcxQzguMzI4NzcgMTAuMDI4NyA5LjY3ODc3IDEwLjAyODcgMTAuNTA4OCA5LjE5ODcxTDEyLjQ3ODggNy4yMjg3MUwxNS42ODg4IDQuMDE4NzFDMTYuMzU4OCAzLjMzODcxIDE1Ljg3ODggMi4xNzg3MSAxNC45MTg4IDIuMTc4NzFaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K");
            background-size: contain;
            background-repeat: no-repeat;
        }
        .jw-settings-submenu{
            padding:5px;}
            
         </style>
     </body>
     
     </html>
     GFG;
    die();
} else {
    echo "Something Went Wrong";
}
