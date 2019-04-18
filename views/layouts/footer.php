<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <ul>
                    <li><a href="#">link_1</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <p>Lorem ipsum dolor sit amet. Sint et molestiae non recusandae enim ipsam. Maxime placeat,     facere   possimus, omnis dolor sit. Placeat, facere possimus, omnis iste natus error sit    voluptatem sequi    nesciunt. Obcaecati cupiditate non numquam eius modi tempora incidunt, ut   perspiciatis unde</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <ul>
                    <li><a href="#">link_1</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="_footer_menu">
                        <div class="btn-group btn-breadcrumb">
                            <a class="btn btn-default" href="/"> <i class="fa fa-home"></i></a>
                            <a class="btn btn-default" href="/catalog/">Компьютеры</a>
                            <a class="btn btn-default" href="/section1/">Компьютерные комплектующие</a>
                            <a class="btn btn-default" href="#">Section-3</a>
                            <a class="btn btn-default" href="#">Section-4</a>
                            <a class="btn btn-default" href="#">Карта сайта</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--  src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"-->
<script src="/template/js/libs.min.js">   </script>
<script src="/template/js/bootstrap.js">   </script>
<script src="/template/js/main.js">   </script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
                var status = '#status_'+id;
                    var message = '.order_message';
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
                    $(message).html(data);
                        $(status).css('display', 'block');
            });
        return false;
        });
        $(".change_cart").click(function () {
            var id_cart = $(this).attr("data-id");
                var input_id = '#sum_'+id_cart;
                    var params = {
                        id_cart: $(this).attr("data-id"),
                        input_id: '#sum_'+id_cart,
                        sum: $(input_id).val(),
                        price: $("#price_"+id_cart).html(),
                    }
            $.post("/cart/changeCart/"+id_cart, params, function (data) {
                $("#newProba").html(data);
                    $("#prev_number_"+id_cart).css('display', 'none');
                        $("#new_number_"+id_cart).html(data);
            });
        return false;
        });
    });
</script>
</body>
</html>
