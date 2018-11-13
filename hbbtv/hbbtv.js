redButtonPressed = false;
blueButtonPressed = true;
appRunning = false;
videoSelected = false;
broadbandPlaying = false;
broadbandPlayingId = -1;
fullscreen = true;

function initVars() {
    redButtonPressed = false;
    blueButtonPressed = true;
    appRunning = false;
    videoSelected = false;
    broadbandPlaying = false;
    broadbandPlayingId = -1;
    fullscreen = true;
    $("#firetv-background-tv object")[0].volume = 100;
}

function hideRedButton() {
    if (!redButtonPressed) {
        $('#redbuttonMsg').hide();
        console.log('hided red button');
    }
}

function showRedButton() {
    if (!redButtonPressed) {
        $('#redbuttonMsg').show();
        console.log('showed red button');
    }
}

function hideBlueButton() {
    if (!blueButtonPressed) {
        $('#bluebuttonMsg').hide();
        console.log('hided blue button');
    }
}

function showBlueButton() {
    if (!blueButtonPressed) {
        $('#bluebuttonMsg').show();
        console.log('showed blue button');
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
                blueButtonPressed = false;
                showBlueButton();
                timeouts.push(setTimeout(hideBlueButton, 5000));
            }else {
                hideBlueButton();
                timeouts.forEach(function(element) {
                    clearTimeout(element);
                });
                blueButtonPressed = true;
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

            $('#automatepin').hide();
            initVars();

            appRunning = false;
            fullscreen = true;

            timeouts.forEach(function(element) {
                clearTimeout(element);
            });
            initApp();
            resumeBroadcast();
            broadcastFullScreen();

            $('#app').hide();
            hideBlueButton();
        }
    }, false);
}