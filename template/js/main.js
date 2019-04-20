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
        /* Hints for the basket buttons of edditing */
        $('.change_cart').mouseover(function(eventObject) {
            eventObject.preventDefault();
                var id = $($(this)).attr('data-id');
                var hint_id = '#cart-eddit_'+id;
                    $(hint_id).css('display', 'block');
            });
        $('.change_cart').mouseout(function(eventObject) {
            eventObject.preventDefault();
                $('#cart-eddit_'+$($(this)).attr('data-id')).css('display', 'none');
            });
        /* Hints for the basket buttons of deleting */
        $('.delite_cart').mouseover(function(eventObject) {
            eventObject.preventDefault();
                var id = $($(this)).attr('data-id');
                var hint_id = '#'+ id;
                    $(hint_id).css('display', 'block');
            });
        $('.delite_cart').mouseout(function(eventObject) {
            eventObject.preventDefault();
                $('#'+$($(this)).attr('data-id')).css('display', 'none');
            });
});
