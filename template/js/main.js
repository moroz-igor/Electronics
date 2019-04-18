'use strict';
$(function() {
    /*
        Смена изображений в блоке екземплляра единицы товара
    */
    function ex_exchance(){
        var id;
        var big_1;
        var this_img;
    $('.product_exemple').mouseover(function(eventObject) {
            eventObject.preventDefault();
            id = $($(this)).attr('id');
            big_1 = $('#exp_'+ id +'>img').attr('src');

        });
        $('.exemple-minor_img a').click(function(eventObject) {
            eventObject.preventDefault();
                $('#exp_'+ id +' img').hide()
                                    .attr('src', $(this).attr('href'));
                $('#exp_'+ id +' img').fadeIn(1000);
        });
    }
    ex_exchance();
});
