$(document).ready(function () {
    $('#player').hide();
    $('#play_vid').click(function () {
        $('#player').show();
        $('#play_vid').hide();
        $('.videoWrapper').removeClass('videoWrapper169');
    });
    loadPlayer();
});

let width, height;

$(window).resize(function () {
    imgSize();
});

function imgSize() {
 
    var img = document.getElementById('play_vid');
    width = img.clientWidth;
    height = img.clientHeight;

    var person = [];
    person["width"] = width;
    person["height"] = height;

    return person;
}

function getArtistId() {
    // return 'l-gQLqv9f4o';
    return 'yh7E2S0_iHQ';
}

function loadPlayer() {
    if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        window.onYouTubePlayerAPIReady = function () {
            onYouTubePlayer();
        };

    } else {

        onYouTubePlayer();

    }
}

var player;

function onYouTubePlayer() {
    player = new YT.Player('player', {
        height: imgSize()['height'],
        width: imgSize()['width'],
        videoId: getArtistId(),
        playerVars: { controls: 1, showinfo: 0, rel: 0, showsearch: 0, iv_load_policy: 3 },
        events: {

            'onStateChange': onPlayerStateChange,
            'onError': catchError,
            'onReady': onPlayerReady,


        }
    });
}



var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        // setTimeout(stopVideo, 6000);
        done = true;
    } else if (event.data == YT.PlayerState.ENDED) {
        location.reload();
    }
}

function onPlayerReady(event) {
    $('#play_vid').click(function () {
        event.target.playVideo();
    });
}
function catchError(event) {
    if (event.data == 100) console.log("Error loading");
}

function stopVideo() {
    player.stopVideo();
}