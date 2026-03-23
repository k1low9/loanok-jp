(function($) {
    $(function(){

    //sidrメニュー
    $('.menu_trigger').sidr({
        name: 'drawer',
        source: '#drawer_menu',
        side: 'right',
        renaming: false,
        onOpen: function() {
            $('.menu_trigger').addClass('open');
            $('#drawer_cover').fadeIn(300);
            $('.sidr_slide__close').show();
            $("meta[name='viewport']").attr('content','width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=no');
        },
        onClose: function() {
            $('#drawer_cover').fadeOut(300);
            $('.sidr_slide__close').hide();
            $("meta[name='viewport']").attr('content','width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=yes');
        }
    });
    $('#drawer_cover').on("click", function () {
        $.sidr('close', 'drawer');
    });
    $('.sidr_slide__close').on("click", function () {
        $.sidr('close', 'drawer');
    });
    $(window).touchwipe({
        wipeRight: function() {
        $.sidr('close', 'drawer');
        },
        // wipeLeft: function() {
        //  $.sidr('open', 'drawer');
        // },
        preventDefaultEvents: false
    });

    $('a[href^="#"]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    //グロナビ　サーチ
    $('.searchbtn').click(function(){
        $(this).hide();
        $(this).next('.searchform_wrap').show();
        return false;
    });

    });
    //shingleページの車カルーセル
    $(function(){
        $('.carimg_slider li').hide();
        $('.carimg_slider li:first-child').fadeIn();
        $('.carimg_slider__thumb li').click(function(){
            var class_name = $(this).attr("class");
            var num = class_name;
            $('.carimg_slider li').hide();
            $('.carimg_' + class_name).fadeIn();
        });
    });

    $(document).ready(function() {
        $('[data-fancybox="area"]').fancybox({
            toolbar: true,
            smallBtn: false,
            arrows : false,
            hash : false,
        });
    });



})(jQuery);
