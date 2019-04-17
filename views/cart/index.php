<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h3>КОРЗИНА    </h3>
          <h4>Вы выбрали товары в кол - ве <?php echo Cart::countItems(); ?> шт! </h4>

    <?php if ($productsInCart): ?>
        <div class="basket">
            <div class="_basket_title"><p>НАЗВАНИЕ ТОВАРА</p></div>
            <div class="_title_container">
                <div class="_exemple_container _cart_title"><div ><p>ФОТО</p></div></div>
                <div class="_exemple_container _cart_title"><div ><p>КОД</p></div></div>
                <div class="_exemple_container _cart_title"><div><p>КОЛ-ВО</p></div></div>
                <div class="_exemple_container _cart_title">
                    <div>
                        <p>ЦЕНА $</p>
                        <p>СУММА $</p>
                    </div>
                </div>
                <div class="_exemple_container _cart_title">
                    <div>
                        <p>ИЗМЕНИТЬ</p>
                        <p>УДАЛИТЬ</p>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($products as $product): ?>


            <div class="basket">
                <div class="_basket_title">
                    <p><?php echo $product['name'];?></p>
                </div>
                <div class="_basket_conteiner">
                    <div class="_exemple_container">

                        <img src="<?php echo $product['imgbig_1'];?>" alt="basket_exemple"/>
                    </div>
                    <div class="_exemple_container">
                        <div ><p>Код: <?php echo $product['code_prev'];?><?php echo $product['code'];?></p></div>
                    </div>
                    <div class="_exemple_container">
                        <div class="basket_exemple"><p><input type="text" name="amount" value="<?php echo   $productsInCart[$product['id']];?>"/> шт.</p></div>
                    </div>
                    <div class="_exemple_container">
                        <div >
                            <p class="price"><?php echo $product['price'];?></p>
                            <p class="price">
                                <?php settype($product['price'], "double");
                                      echo ( $product['price'] * $productsInCart[$product['id']] ); ?>
                                </p>
                        </div>
                    </div>
                    <div class="_exemple_container">
                        <div >
                            <a class="btn btn-default btn-xs" href="#">
                                <i class="fa fa-cog"></i></a>
                            <a class="btn btn-danger btn-xs" href="/cart/delete/<?php echo $product['id'];?>">
                                <i class="fa fa-trash-o "></i></a>
                        </div>
                    </div>
                </div>
            </div>
         <?php endforeach; ?>
        <?php foreach ($s1_products as $product): ?>
            <div class="basket">
                <div class="_basket_title">
                    <p><?php echo $product['s1_name'];?></p>
                </div>
                <div class="_basket_conteiner">
                    <div class="_exemple_container">
                        <img src="<?php echo $product['s1_imgbig_1'];?>" alt="basket_exemple"/>
                    </div>
                    <div class="_exemple_container">
                        <div ><p>Код: <?php echo $product['s1_code_prev'];?><?php echo $product['s1_code'];?></p></div>
                    </div>
                    <div class="_exemple_container">
                        <div class="basket_exemple"><p><input type="text" name="amount" value="<?php echo   $productsInCart[$product['s1_id']];?>"/> шт.</p></div>
                    </div>
                    <div class="_exemple_container">
                        <div >
                            <p class="price"><?php echo $product['s1_price'];?></p>
                            <p class="price">
                            <?php settype($product['s1_price'], "double");
                                   echo ( $product['s1_price'] * $productsInCart[$product['s1_id']] ); ?></p>
                        </div>
                    </div>
                    <div class="_exemple_container">
                        <div >
                            <a class="btn btn-default btn-xs" href="#">
                                <i class="fa fa-cog"></i></a>
                            <a class="btn btn-danger btn-xs" href="/cart/delete/<?php echo $product['s1_id'];?>">
                                <i class="fa fa-trash-o "></i></a>
                        </div>
                    </div>
                </div>
            </div>

    <?php endforeach; ?>
          <div class="basket basket_result">
            <div>
              <p>Итого</p>
            </div>
            <div >
              <p>$<?php echo $totalPrice; ?></p>
            </div>
          </div>
          <div class="basket basket_result">
            <div >
                <a href="#"> <button>Пересчитать</button></a>
            </div>
            <div >
                <a href="/cart/clearAll"><button>Очистить</button></a>
            </div>
            <div><a class="btn btn-danger" href="/cart/checkout">ОФОРМИТЬ</a></div>
          </div>
      <?php else: ?>
                   <p>Корзина пуста</p>
      <?php endif; ?>
     <?php
            //echo '<pre>';
            //print_r($_SESSION['products']);
            //print_r($_SESSION['products'][].'<br>');
            //print_r($_SESSION['products'][].'<br>');
            //print_r($_SESSION['products'][].'<br>');

      ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
