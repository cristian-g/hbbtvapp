var videos;
var mapVideos;

$(document).ready(function () {
    var $el = $('#actionsList'),
        actions = $el.find('.actionsList__actionbar'),
        list    = $el.find('.actionsList__group');

    // Attach selectonic
    list
        .selectonic({
            multi: true,
            keyboard: true,
            focusBlur: false,
            loop: true,
            selectionBlur: false,

            // Before any changes
            before: function(e) {
                if (e.target === actions[0] || $(e.target).is('button.actionsList__button')) {
                    this.selectonic('cancel');
                }
            },

            // When one or more items selectes
            select: function() {
                toggleActions(false);
                this.selectonic('option', 'keyboard', true);
            },

            // When all items clears selection
            unselectAll: function() { toggleActions(true); }
        });

    $el
        .on('focusin', onFocusin)
        .on('focusout', onFocusout);

    actions.on('click', 'button', function() {
        // Get selected items from list
        doAction( list.selectonic('getSelected') );
    });

    function onFocusin () {
        list.selectonic('option', 'keyboard', true);
        $el.addClass('focused');
    }

    function onFocusout () {
        list.selectonic('option', 'keyboard', false);
        $el.removeClass('focused');
    }


    function toggleActions (state) {
        if (state === void 0) {
            actions.toggleClass('disabled');
        } else {
            actions.toggleClass( 'disabled', state );
        }
    }

    function doAction (items) {
        items.each(function(index, el) {
            var $el = $(el);
            $el.addClass('animate');
            setTimeout(function() {
                $el.removeClass('animate');
            }, 300);
        });
    }

    toggleActions(true);

    $.ajax({
        url: '/api/videos',
        method: "GET",
        dataType: "json",

        success: function(response) {
            videos = response.videos;
            mapVideos = new Map(videos.map(obj => [ obj.id, obj ]));

            jQuery.each(response.videos, function(index, value) {
                $("#ul-videos").append('<li class="actionsList__option" data-video-id="' + value.id + '"><div class="video-li-container"><div class="video-thumbnail"><img src="' + value.thumbnail + '" width="90" /></div><div class="video-title">' + value.title + '<br />' + value.director + '</div><div class="video-buttons"><img src="/hbbtv/img/buttons.png" width="50" /></div><div class="video-views"><span class="views-counter"> ' + value.views + '</span></div></div></li>');
            });

            list.selectonic("focus", 0); //first element in the list

            $('#actionsList').click();
            $('#actionsList').focus();
            $('.actionsList__group').click();
            $('.actionsList__group').focus();

            selectVideo(1);
        },

        error: function(error, status) {
            console.error(error, status);
        }
    });


    $('html').keydown(function (e) {
        if (!appRunning) return;

        if ((e.keyCode == VK_UP || e.keyCode == VK_DOWN) && !fullscreen) {
            videoSelected = false;
            var videoId = parseInt($($('#ul-videos').selectonic("focus")).data('video-id'));
            if (e.keyCode == VK_UP) {
                if (videoId != 1) {
                    videoId--;
                }
                else {
                    videoId = mapVideos.size;
                }
            }
            else if (e.keyCode == VK_DOWN) {
                if (videoId != mapVideos.size) {
                    videoId++;
                }
                else {
                    videoId = 1;
                }
            }
            selectVideo(videoId);
        }
        else if ((e.keyCode == VK_RED || e.keyCode == 13) && !fullscreen) {
            $('#ul-videos').selectonic("enable");

            stopBroadcast();

            var videoId = $($('#ul-videos').selectonic("focus")).data('video-id');

            if (videoSelected || videoId === broadbandPlayingId) {
                playVideo();
            }
            else {
                var video = mapVideos.get(videoId);
                showVideo(video.source);
                incrementViews(video.id);
            }

            videoSelected = true;
            broadbandPlaying = true;
            broadbandPlayingId = videoId;
        }
    })
});

function selectVideo(videoId) {
    var video = mapVideos.get(videoId);

    $('#connected-users').html('<ul id="connected-users-list"></ul>');
    jQuery.each(video.users, function(index, value) {
        $('#connected-users-list').append('<li><i>' + value.name + ' <b>is watching this</b></i></li>');
    });
    var i = 0;
    var list = $('#connected-users ul li');
    function changeList(list) {
        list.eq(i).fadeIn(1000).fadeOut(300, function() {
            i++;
            if(i % list.length == 0) {
                i = 0;
            }
            changeList(list);
        });
    }
    changeList(list);

    $('#video-info').html('<b>' + video.description + '</b> ' + video.minutes + ' minutes <br />Cast: ' + video.cast);
}

function incrementViews(videoId) {
    var video = mapVideos.get(videoId);
    video.views = video.views + 1;
    mapVideos.set(videoId, video);
    $('li[data-video-id="' + videoId + '"]').find('.views-counter').html(video.views);

    var request = new XMLHttpRequest();
    request.open('PATCH', '/api/videos/view/' + videoId, false);
    request.setRequestHeader("Content-type", "application/json");
    request.send('{"isActive": 1}');
}