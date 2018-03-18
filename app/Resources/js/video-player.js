var VideoPlayer = {

    videoTag: null,
    afterVideoRedirectPath: null,

    init: function () {
        this.videoTag = $("#doomVideo");

        if (this.videoTag.length) {
            this.clickListener();
        }

        // if (this.afterVideoRedirectPath.length) {
        //     this.endListener();
        // }
    },

    // endListener: function () {
    //     var $this = this;
    //     $this.videoTag.on('ended', function() {
    //         window.location.href = $this.afterVideoRedirectPath.attr('href');
    //     })
    // },

    clickListener: function () {
        this.videoTag.on('click', function () {
            var video = $(this).get(0);

            if (video.paused === false) {
                video.pause();
            } else {
                video.play();
            }
        });
    }
};

VideoPlayer.init();