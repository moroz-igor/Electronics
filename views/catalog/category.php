<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
    <h2>Компьютеры и комплектующие </h2>
    <div class="btn-group btn-breadcrumb _categoty_nav">
    <?php foreach ($categories as $categoryItem):  ?>
            <a class="btn btn-default <?php if($categoryId == $categoryItem['id']) echo 'active' ?>"
                                                href="/category/<?php echo $categoryItem['id']; ?>">
                        <?php echo $categoryItem['name']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="_search_dir">
                <form class="navbar-form _search_form" action="#">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="" value=""/>
                    </div>
                    <button class="btn btn-default" type="submit"> <i class="fa fa-sign-in"> </i>
                        <span>Поиск в дирректории</span>
                    </button>
                </form>
            </div>
          <h3>Товары в дирректории</h3>

        <?php foreach ($categoryProducts as $product): ?>

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
                            <a href="#"><?php echo $product['brand'];  ?> </a>
                            <span><?php echo $product['category_name'];  ?></span>
                        </span>
                        </p>
                        <p class="exemple_description"><?php echo $product['description_1'];?> </p>
                        <p class="exemple_description"><?php echo $product['description_2'];?> </p>
                        <span class="exemple_price">$<?php echo $product['price'];?> </span>
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
                        <a class="btn btn-success add-to-cart" href="#" data-id="<?php echo $product['id']; ?>"     name="1">
                                <span>Купить</span>
                        </a>
                            <a class="btn btn-success" href="/cart/">
                                <span>Корзина</span>
                            </a>
                        </div>
                    </div>
                    <p><a class="btn btn-default" href="basket.html">Перейти к оформлению </a></p>
                </div>
            </div>
    <?php endforeach; ?>
        <!-- Pagination--><?php echo $pagination->get(); ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
