<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h3>КОРЗИНА    </h3>
          <h4>Вы выбрали товары в кол - ве <?php echo Cart::countItems(); ?> шт! </h4>

    <?php if ($productsInCart): ?>
        <div class="basket basket_result">
            <article>
              Итого:
              $<?php echo $totalPrice; ?>
          </article>

          <div >
                  <a href="/cart/recount"><button>Пересчитать всё</button></a>
          </div>
          <div >
              <a href="/cart/clearAll"><button>Очистить</button></a>
          </div>
          <div><a class="btn btn-danger" href="/cart/checkout">ОФОРМИТЬ</a></div>
        </div>

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
                    <a href="/product/<?php echo $product['id']; ?>">
                        <?php echo $product['name'];?>
                    </a>
                </div>
                <div class="_basket_conteiner">
                    <div class="_exemple_container">

                        <img src="<?php echo $product['imgbig_1'];?>" alt="basket_exemple"/>
                    </div>
                    <div class="_exemple_container">
                        <div ><p>Код: <?php echo $product['code_prev'];?><?php echo $product['code'];?></p></div>
                    </div>
                    <div class="_exemple_container">
                        <div class="basket_exemple">
                            <p>
                    <input id="sum_<?php echo $product['id']; ?>" type="text" name="amount" value="<?php echo   $productsInCart[$product['id']];?>"/>
                             шт.</p></div>
                    </div>
                    <div class="_exemple_container">
                        <div >
                            <p class="price" id="price_<?php echo $product['id'];?>">
                                <?php echo $product['price'];?>
                            </p>
                            <p class="price" id="prev_number_<?php echo $product['id'];?>">
                                <?php settype($product['price'], "double");
                                      echo ( $product['price'] * $productsInCart[$product['id']] ); ?>
                            </p>
                            <p class="price" id="new_number_<?php echo $product['id'];?>"></p>
                        </div>
                    </div>
                    <div class="_exemple_container">
                        <p class="_cart-hint" id="cart-eddit_<?php echo $product['id']; ?>">
                                Изменить колл-во!
                        </p>
                        <p class="_cart-hint" id="cart-delete_<?php echo $product['id']; ?>">
                                Удалить!
                        </p>
                        <div>
                                <a class="btn btn-default btn-xs change_cart"
                                        data-id="<?php echo $product['id']; ?>"
                                        href="#">
                                <i class="fa fa-cog"></i>
                                </a>
                            <a class="btn btn-danger btn-xs delite_cart"
                                href="/cart/delete/<?php echo $product['id'];?>"
                                data-id="cart-delete_<?php echo $product['id']; ?>">
                                <i class="fa fa-trash-o "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
         <?php endforeach; ?>
        <?php foreach ($s1_products as $product): ?>
            <div class="basket">
                <div class="_basket_title">
                    <a href="/product/<?php echo $product['s1_id']; ?>">
                        <?php echo $product['s1_name'];?>
                    </a>

                </div>
                <div class="_basket_conteiner">
                    <div class="_exemple_container">
                        <img src="<?php echo $product['s1_imgbig_1'];?>" alt="basket_exemple"/>
                    </div>
                    <div class="_exemple_container">
                        <div ><p>Код: <?php echo $product['s1_code_prev'];?><?php echo $product['s1_code'];?></p></div>
                    </div>
                    <div class="_exemple_container">
                        <div class="basket_exemple">
                        <p>
                            <input id="sum_<?php echo $product['s1_id']; ?>" type="text" name="amount"value="<?php echo   $productsInCart[$product['s1_id']];?>"/>
                        </p>
                        </div>
                    </div>
                    <div class="_exemple_container">
                        <div>
                            <p class="price" id="price_<?php echo $product['s1_id'];?>">
                                <?php echo $product['s1_price'];?>
                            </p>
                            <p class="price" id="prev_number_<?php echo $product['s1_id'];?>">
                                <?php settype($product['s1_price'], "double");
                                      echo ( $product['s1_price'] * $productsInCart[$product['s1_id']] ); ?>
                            </p>
                            <p class="price" id="new_number_<?php echo $product['s1_id'];?>"></p>
                        </div>
                    </div>
                    <div class="_exemple_container">
                        <p class="_cart-hint" id="cart-eddit_<?php echo $product['s1_id']; ?>">
                                Изменить колл-во!
                        </p>
                        <p class="_cart-hint" id="cart-delete_<?php echo $product['s1_id']; ?>">
                                Удалить!
                        </p>

                        <div>
                            <a class="btn btn-default btn-xs change_cart"
                                href="#"
                                data-id="<?php echo $product['s1_id']; ?>">
                                <i class="fa fa-cog"></i></a>
                            <a class="btn btn-danger btn-xs delite_cart"
                                href="/cart/delete/<?php echo $product['s1_id'];?>"
                                 data-id="cart-delete_<?php echo $product['s1_id']; ?>">
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
                <a href="/cart/recount"><button>Пересчитать всё</button></a>
            </div>
            <div >
                <a href="/cart/clearAll"><button>Очистить</button></a>
            </div>
            <div><a class="btn btn-danger" href="/cart/checkout">ОФОРМИТЬ</a></div>
            </article>

          </div>
    <?php else: ?>
                   <p>Корзина пуста</p>
    <?php endif; ?>
        <span
            data-toggle="popover"
            title="Name of this window"
            data-content="Text in the window"
            data-trigger="hover"
            data-placement="top">
            Popover
        </span>


<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
