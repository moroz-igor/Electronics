<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
<?php require_once(ROOT . '/components/Pagination.php'); ?>
    <h3>Выборка товаров производителя: </h3>
    <h2>" <?php echo brandGet($brand); ?> "</h2>
    <div class="btn-group btn-breadcrumb _categoty_nav">
        <?php foreach ($categories as $categoryItem):  ?>
            <a class="btn btn-default" href="/category/<?php echo $pageNumber; ?>/<?php echo $categoryItem['id']; ?>">
                <?php echo $categoryItem['name']; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="_search_dir">
        <form class="navbar-form _search_form" action="/search/0" method="get">
            <div class="form-group">
                <input class="form-control" type="text" name="search_words"  value=""/>
            </div>
            <input class="btn btn-primary _search_link" type="submit" name="button_search" value="Найти"/ >
        </form>
    </div>
    <h3>Товары дирректори марки " <span class="_registration-success"><?php echo brandGet($brand); ?></span> "</h3>
        <?php
        $brand = brandGet($brand);
        (isset($_GET["page"])) ?
                $page = $_GET["page"] :
                        $page = $_SERVER['REQUEST_URI'];
                        if ($page < 1 or $page == "") $page = 1; $limit = 15; $numberButtons = 4;
                        $start = getStart($page, $limit);
                            $articles = getAllArticlesByBrand($start, $limit, $section, $category, $brand);
        ?>
        <div class="_pagination-buttons">
            <?php $url = '';
            echo  pagination($page, $limit, $url, $numberButtons, $totalBrand); ?>
        </div>
        <?php foreach ($articles as $product): ?>
            <div class="product_exemple" id="<?php echo $product['code'];  ?>">
                <a href="/product/<?php echo $product['id']; ?>">
                    <h5> <?php echo $product['name']; ?></h5>
                </a>
                <div class="row product_exemple-block">
                    <div class="col-lg-6 exemple_main_img">
                        <div class="exemple-main_img" id="exp_<?php echo $product['code']; ?>">
                            <img src="<?php echo $product['imgbig_1'];  ?>" alt="big_1"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="product-status"> В наличии</p>
                        <p>Код:
                         <span class="code"><?php echo $product['code_prev'];
                                                    echo $product['code'];  ?>
                            <span>
                                <?php echo $product['brand']; ?>
                            </span>
                            <a href="/category/<?php echo $pageNumber; ?>/<?php echo $product['category_id']; ?>">
                                <?php echo $product['category_name'];  ?>
                            </a>
                        </span>
                        </p>
                        <p class="exemple_description"><?php echo $product['description_1'];?> </p>
                        <p class="exemple_description"><?php echo $product['description_2'];?> </p>
                        <span class="exemple_price">$<?php echo $product['price'];?> </span>
                        <div class="order_container">
                            <?php if (isset($_SESSION['products']) && array_key_exists($product['id'],   $_SESSION['products'])): ?>
                                    <?php echo '<div class="ordered"> ЗАКАЗАНО</div>'; ?>
                            <?php endif; ?>
                            <div id="status_<?php echo $product['id']; ?>" class="order_status">
                                            <div class="ordered ordered_incart">ДОБАВЛЕН В КОРЗИНУ</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minor_img-block">
                    <?php if($product['imgbig_1'] && $product['imgmin_1']): ?>
                    <div class="exemple-minor_img">
                        <a href="<?php echo $product['imgbig_1'];  ?>">
                            <img src="<?php echo $product['imgmin_1'];  ?>" alt="min_2"/>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($product['imgbig_2'] && $product['imgmin_2']): ?>
                    <div class="exemple-minor_img">
                        <a href="<?php echo $product['imgbig_2'];  ?>">
                            <img src="<?php echo $product['imgmin_2'];  ?>" alt="min_3"/>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($product['imgbig_3'] && $product['imgmin_3']): ?>
                    <div class="exemple-minor_img">
                        <a href="<?php echo $product['imgbig_3'];  ?>">
                            <img src="<?php echo $product['imgmin_3'];  ?>" alt="min_4"/>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($product['imgbig_4'] && $product['imgmin_4']): ?>
                    <div class="exemple-minor_img">
                        <a href="<?php echo $product['imgbig_4'];  ?>">
                            <img src="<?php echo $product['imgmin_4'];  ?>" alt="min_5"/>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if($product['imgbig_5'] && $product['imgmin_5']): ?>
                        <div class="exemple-minor_img">
                            <a href="<?php echo $product['imgbig_5'];  ?>">
                                <img src="<?php echo $product['imgmin_5'];  ?>" alt="min_5"/>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="exemple-basket_buttons">
                        <div>
                            <div class="product_cart_message ">КОРЗИНА
                                 ( <span class="order_message">
                                      <?php echo Cart::countItems(); ?>
                                 </span> )
                            </div>
                            <a class="btn btn-success add-to-cart" href="#" data-id="<?php echo $product['id'];?>">
                                <span>Купить</span>
                            </a>
                            <a class="btn btn-success" href="/cart/">
                                <span>Корзина</span>
                            </a>
                        </div>
                    </div>
                    <p><a class="btn btn-default" href="/cart/checkout/">Перейти к оформлению </a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
