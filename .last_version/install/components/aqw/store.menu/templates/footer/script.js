function aqwStoreFooterResize()
{
    var bodyHeight = $('body').height();
    var windowHeight = $(window).height();
    if(windowHeight > bodyHeight)
    {
        $('#footer').addClass('navbar-fixed-bottom');
    } else {
        $('#footer').removeClass('navbar-fixed-bottom');
    }
}
$(document).ready(aqwStoreFooterResize);
$(window).resize(aqwStoreFooterResize);
