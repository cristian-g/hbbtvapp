redButtonPressed = false;
appRunning = false;
videoSelected = false;
broadbandPlaying = false;
broadbandPlayingId = -1;
fullscreen = true;

function initVars() {
    redButtonPressed = false;
    appRunning = false;
    videoSelected = false;
    broadbandPlaying = false;
    broadbandPlayingId = -1;
    fullscreen = true;
}

function hideRedButton() {
    if(!redButtonPressed){
        $('#redbuttonMsg').hide();
    }
}

function showRedButton() {
    if(!redButtonPressed){
        $('#redbuttonMsg').show();
    }
}

function registerKeyEventListener() {
    document.addEventListener("keydown", function(e) {
        var kc = e.keyCode;
        if(kc == VK_RED) {
            if(appRunning){
                //play video
            }else{
                $('#redbuttonMsg').hide();
                redButtonPressed = true;
                $('#automatepin').show();
            }
        }
        if(kc == VK_YELLOW){
            pauseVideo();
        }
        if(kc == VK_BLUE){
            if(!fullscreen){
                if(broadbandPlaying){
                    goFullScreen();
                }else{
                    broadcastFullScreen();
                    resumeBroadcast();
                }
                $('#bluebuttonMsg').show();
                setTimeout(function () {
                    $('#bluebuttonMsg').hide();
                }, 5000);
            }else {
                $('#bluebuttonMsg').hide();
                if(broadbandPlaying){
                    outFullScreen();
                }else{
                    broadcastOutFullScreen();
                }
            }
        }
        if(kc == VK_GREEN){
            if(broadbandPlaying){
                stopVideo();
                resumeBroadcast();
            }
        }
        if(kc == VK_ENTER && redButtonPressed){
            $('#automatepin').hide();
            $('#app').show();
            broadcastOutFullScreen();
            appRunning = true;
            fullscreen = false;
        }
        if(kc == VK_0){
            // Destroy app
            if (broadbandPlaying) {
                stopVideo();
            }
            initVars();
            initApp();
            resumeBroadcast();
            broadcastFullScreen();
            $('#app').hide();
        }
    }, false);
}