<?php
$ROOTDIR='.';
require("$ROOTDIR/base.php");
$referer = array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : '';
$i = strrpos($referer, '/');
$referer = $i>=0 ? substr($referer, 0, $i) : '';
$referer = substr(strrchr($referer, '/'), 1);
$referer = addcslashes($referer, "\0..\37'\\");

sendContentType();
openDocument();
?>
<script src="./jquery-1.7.min.js"></script>
<script type="application/javascript" src="./hbbtv.js"></script>
<script type="application/javascript" src="./base.js"></script>
<script type="application/javascript" src="./videoControls.js"></script>
<script src="./selectonic.min.js"></script>
<script type="application/javascript" src="./catalog.js"></script>

<script>
    initApp();
    var timeouts;
    $(document).ready(function () {
        registerKeyEventListener();
        initApp();
    });
    $(window).load(function() {
        // page is fully loaded, including all frames, objects and images
        console.log('$(window).load');
        $("#firetv-background-tv object")[0].volume = 100;
    });
    function initApp() {
        timeouts = new Array();
        timeouts.push(setTimeout(showRedButton, 0));
        timeouts.push(setTimeout(hideRedButton, 10000));
        timeouts.push(setTimeout(showRedButton, 15000));
        timeouts.push(setTimeout(hideRedButton, 20000));
        timeouts.push(setTimeout(showRedButton, 62000));
        timeouts.push(setTimeout(hideRedButton, 67000));
        $('#num1').html(Math.floor(Math.random() * 10));
        $('#num2').html(Math.floor(Math.random() * 10));
        $('#num3').html(Math.floor(Math.random() * 10));
        $('#num4').html(Math.floor(Math.random() * 10));
    }
</script>
<link rel="stylesheet" type="text/css" href="./hbbtv.css"></link>
<link rel="stylesheet" type="text/css" href="./catalog.css"></link>

</head><body>
<object id="appmgr" type="application/oipfApplicationManager" style="position: absolute; left: 0px; top: 0px; width: 0px; height: 0px;"></object>
<div id="app" class="wrapper" style="display: none">
    <div class="content-wrapper">
        <div class="videos">
            <div class="videos-title">
                Trailers
            </div>
            <div class="actionsList focused" id="actionsList" tabindex="1">
                <ul class="actionsList__group" id="ul-videos">
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <div class="preview" id="video-view">
            </div>
            <div class="info-wrapper">
                <div class="users" id="connected-users">
                </div>
                <div class="info" id="video-info">
                </div>
            </div>
        </div>
        <div class="footer">
            <ul id="buttons-list">
                <li><span class="red-button"></span> Play video</li>
                <li><span class="yellow-button"></span> Pause video</li>
                <li><span class="green-button"></span> Stop video</li>
                <li><span class="blue-button"></span> Fullscreen</li>

            </ul>
        </div>
    </div>
</div>
<div id="redbuttonMsg" class="over-background">
    <div class="background-msg"></div>
    <h1>Press <span class="red-button"></span> to start application</h1>
</div>
<div id="bluebuttonMsg" class="over-background">
    <div class="background-msg"></div>
    <h1>Press <span class="blue-button"></span> to go back to the app</h1>
</div>
<div id="automatepin" class="txtdiv over-background" style="width: 440px; text-align: center; display: none">
    <div class="background-msg"></div>
    <h1>Sync number<br/>
        <span id="automatepinentry"><span id="num1"></span> <span id="num2"></span> <span id="num3"></span> <span id="num4"></span></span>
        <div style=" margin: 10px"><span class="over-background" style="border-radius: 5px; padding: 5px; background-color: #0e0e0e;">OK</span></div>
    </h1>
</div>
<video style="display: none" id="video" class="video-small"></video>

</body>
</html>