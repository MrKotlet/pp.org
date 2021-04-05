@extends('layouts.app')

@section('content')
    <main class="container">
    <div id="player"  ></div>

    <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '360',
                width: '640',
                videoId: '{{$stream -> link}}',
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                setTimeout(stopVideo, 6000);
                done = true;
            }
        }
        function stopVideo() {
            player.stopVideo();
        }
        const yt = document.getElementById('player');

        function embed(){
            yt.className = 'embed-responsive';
        }
        embed();


    </script>
    </main>
<br>
{{--<div class="embed-responsive embed-responsive-16by9 container">--}}
{{-- <iframe class="embed-responsive-item " width="560" height="315" src="{{$stream -> link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
{{--</div>--}}

  <hr>

<div class="container mx-auto row">
    <div class="col-8">
        <p class="display-4">{{$stream -> name}}</p>
        <p><b>{{$event->name}}</b> {{$stream -> date}}</p>
        <hr>
        <p>{{$stream -> opis}}</p>
    </div>
    <div class="col-4">
        <h4 class="display-4" style="text-align: right">Chat</h4>

        <iframe src="https://www5.cbox.ws/box/?boxid=923427&boxtag=5KRglb" width="100%" height="450" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto" class="embed-responsive border"></iframe>
    </div>




</div>





















    @endsection
