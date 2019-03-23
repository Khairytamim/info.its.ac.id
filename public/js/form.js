$('.radio').on('click', function(e) {
    e.preventDefault();
    var cacheDom = "";

    $('.radio.active').not(this).removeClass("active")
    $(this).addClass("active");

    target = $(this).attr('id');
    
    targetid = document.querySelector('.form-content').id;
    if (targetid !== target) {
        cacheDom = $('.form-content');
        $('.form-content').hide();
    } else {
        $('.form-content').fadeIn(600);
    }
    
    
})