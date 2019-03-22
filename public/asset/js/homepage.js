
    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (y > 1600) {
            $('.txt1').fadeIn();
        } else {
            $('.txt1').fadeOut();
        }
    });

$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 2500) {
        $('.txt2').fadeIn();
    } else {
        $('.txt2').fadeOut();
    }
});
$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});

