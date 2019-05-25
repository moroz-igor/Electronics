<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <ul>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> INSTAGRAM</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <p>+38(067) 555-55-55</p>
                <p>+38(098) 555-55-55</p>
                <p>+38(063) 555-55-55</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs ">
                <ul>
                    <li><a href="#"><i class="fa  fa-facebook-square" aria-hidden="true"></i> FACEBOOK</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="_footer_menu">
                        <div class="btn-group btn-breadcrumb">
                            <a class="btn btn-default" href="/"> <i class="fa fa-home"></i></a>
                            <!-- DYNAMIC PAGES -->
                            <!-- Pages of the first section -->
                            <?php $CatalogPages = NavigationBase::getNavigationPageCatalog(); ?>
                            <?php foreach ($CatalogPages as $page):  ?>
                                <a class="btn btn-default" href="/catalog/<?php echo $page['page']; ?>/">
                                    <?php echo $page['page_name']; ?></a>
                            <?php endforeach; ?>
                            <!-- Pages of the second section -->
                            <?php $SectionPages = NavigationBase::getNavigationPageSection(); ?>
                            <?php foreach ($SectionPages as $page):  ?>
                                <a class="btn btn-default" href="/sectionPage/<?php echo $page['page']; ?>/">
                                    <?php echo $page['page_name']; ?></a>
                            <?php endforeach; ?>
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
