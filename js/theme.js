bmp = {};
jQuery(document).ready(function ($) {

    String.prototype.replaceAll = function (find, replace) {
        var str = this;
        return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
    };

    $.fn.ignore = function (sel) {
        return this.clone().find(sel).remove().end();
    };

    function get_mail_from_website() {
        var regEx = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/g;
        var email = new Array();
        var elements = ["footer", ".main_content"];
        for (var i = 0; i < elements.length; i++) {
            var temp = new Array();
            $(elements[i]).filter(function () {
                email = $(this).ignore("input,a").html().match(regEx);
                $(email).each(function (index, val) {
                    var flag = true;
                    $(temp).each(function (indexT, val) {
                        if (temp[indexT] == email[index])
                            flag = false;
                    });
                    if (flag) {
                        var arr = val.split('@');
                        $(elements[i]).html($(elements[i]).html().replaceAll(val, "<a class=\"link_email\" href=\"javascript:mailto(['" + arr[0] + "','" + arr[1] + "'].join('@'))\">" + val + "</a>"));
                        temp.push(email[index]);
                    }
                });
            });
        }
    }

    get_mail_from_website();

    /*********** add class to lab template ************/
    function labTemplate() {
        if ($('main').hasClass('the-lab-content')) {
            $('body').addClass('the-lab-template');
        }
    }

    labTemplate();

    /*********** webpage overview scrollbar **********/
    $('.webpage-img').mCustomScrollbar({theme: "minimal-dark"});

    /******* table responsive ********/
    $('table.tbl_standard, table.tbl_no_heading').each(function () {
        $(this).wrapAll("<div class='table-wrapper'></div>");
    });

    //$('table.tbl_no_heading').wrapAll("<div class='table-wrapper'></div>");

    /**** add title to a tag ****/
    function addTitle2aTag() {
        $('a[target=_blank]').attr('title', 'Open in new tab');
    }

    addTitle2aTag();

    /**** iLixi Slider ****/
    function iLixiSlider() {
        $('.ilixi-slider-inner').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });

        $('.slide-item-inner').each(function () {
            $(this).tilt({
                //scale: 1.02
                glare: true,
                maxGlare: .5
            })
        });
    }

    iLixiSlider();

    /**** cursor Slider ****/
    function positionCursor() {
        $(document).bind('mousemove', function (e) {
            $('#cursor').css({
                left: e.pageX,
                top: e.pageY
            });
        });
    }

    // positionCursor();

    function detectCursor() {
        var cursor = $('#cursor');
        var slickPrev = $('.ilixi-slider .slick-prev');
        var slickNext = $('.ilixi-slider .slick-next');
        var mouseX = 0;
        var mouseY = 0;
        var prev = 0;
        var next = 0;

        // get arrow position on load, resize
        $(window).on('load resize', function () {
            prev = {
                'left': slickPrev.offset().left,
                'top': slickPrev.offset().top,
                'right': slickPrev.offset().left + slickPrev.width(),
                'bottom': slickPrev.offset().top + slickPrev.height()
            };
            next = {
                'left': slickNext.offset().left,
                'top': slickNext.offset().top,
                'right': slickNext.offset().left + slickNext.width(),
                'bottom': slickNext.offset().top + slickNext.height()
            };
        });

        // detect cursor position
        $(document).bind('mousemove', function (e) {
            mouseX = e.pageX;
            mouseY = e.pageY;
            cursor.css({
                left: mouseX,
                top: mouseY
            });

            // if cursor in slickPrev => add class on-prev
            if (mouseX > prev.left && mouseX < prev.right
                && mouseY > prev.top && mouseY < prev.bottom) {
                cursor.addClass('on-prev');
            } else {
                cursor.removeClass('on-prev');
            }

            // if cursor in slickNext => add class next
            if (mouseX > next.left && mouseX < next.right
                && mouseY > next.top && mouseY < next.bottom) {
                cursor.addClass('on-next');
            } else {
                cursor.removeClass('on-next');
            }

        });

        /*arrow click sound*/
        /*var popSound = '../sounds/pop.mp3';
        function playPop(){new Audio(popSound).play();}
        slickPrev.click(function () {
            playPop();
        });
        slickNext.click(function () {
            playPop();
        });*/
    }

    // detectCursor();


    bmp.loadRepositories = function (username, container) {
        // If container exists
        var $container = $(container);
        if ($container.length) {
            $container.html("<span>Querying GitHub for " + username + "'s repositories...</span>");

            // Get data from Github
            $.getJSON('https://api.github.com/users/' + username + '/repos?callback=?', function (data) {
                // console.log(data.data); // raw response

                var repos = dataFilter(data.data); // JSON Parsing
                console.log(repos);
            });
        }

        // Filter with needed data only
        function dataFilter(repos) {
            var filteredRepos = [];

            $(repos).each(function () {
                filteredRepos.push({
                    "id": this.id,
                    "name": this.name,
                    "full_name": this.full_name,
                    "private": this.private,
                    "description": this.description,
                    "html_url": this.html_url,
                    "homepage": this.homepage
                });
            });

            return filteredRepos;
        }
    };
    bmp.loadRepositories("phucbm", "#my-github-projects");

});

function mailto(address) {
    document.location.href = 'mail' + 'to:' + address;
}