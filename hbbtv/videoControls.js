function showVideo(source) {
    $('#video').remove();
    $('#video-view').append('<video id="video" class="video-small"><source src = "' + source + '" type = "video/mp4" /></video>');
    playVideo();
}

function playVideo() {
    $('#video')[0].play();
    stopBroadcast();
}

function pauseVideo() {
    $('#video')[0].pause();
}

function stopVideo() {
    $('#video')[0].pause();
    $('#video')[0].currentTime = 0;
    videoSelected = false; broadbandPlaying = false;
}

function goFullScreen() {
    $('#video').addClass('video-fullscreen').removeClass('video-small');
    fullscreen = true;
}

function outFullScreen() {
    $('#video').removeClass('video-fullscreen').addClass('video-small');
    fullscreen = false;
}

function stopBroadcast() {
    $("#firetv-background-tv object")[0].volume = 0;
    $('#firetv-background-tv').css('background-color', 'transparent');
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("opacity", "0", "important");
}

function resumeBroadcast() {
    $("#firetv-background-tv object")[0].volume = 100;
    $('#firetv-background-tv').css('background-color', 'transparent');
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("opacity", "1", "important");
}

function broadcastFullScreen() {
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("width", "100%");
    rules.style.setProperty("height", "100%");
    rules.style.setProperty("right", "auto");
    rules.style.setProperty("top", "0px");
    rules.style.setProperty("left", "0px");
    rules.style.setProperty("z-index", "4");
    fullscreen = true;
}

function broadcastOutFullScreen() {
    $('#firetv-background-tv').css('background-color', 'transparent');
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("width", "560px", "important");
    rules.style.setProperty("height", "315px", "important");
    rules.style.setProperty("right", "calc((1280px - 1154px) * 0.5)", "important");
    rules.style.setProperty("top", "calc((720px - 650px) * 0.5)", "important");
    rules.style.setProperty("left", "auto", "important");

    rules = ss.cssRules[1];
    rules.style.setProperty("z-index", "1");
    fullscreen = false;
}