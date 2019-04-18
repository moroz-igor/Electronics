<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
    <div class="btn-group btn-breadcrumb _categoty_nav">
    <?php foreach ($categories as $categoryItem):  ?>
    <a class="btn btn-default <?php if($categoryId == $categoryItem['id']) echo 'active' ?>"
                                        href="/category/<?php echo $categoryItem['id']; ?>">
                <?php echo $categoryItem['name']; ?>
            </a>
        <?php endforeach; ?>
    </div>
          <h2><?php echo $product['name']; ?></h2>
          <section class="detail_main">
            <h3>Подробное описание</h3>
            <div class="detail_price">$<?php echo $detailPrice['price']; ?></div>
            <?php if($detailContent['main_des']): ?>
                <p class="detail-main-description"><?php echo $detailContent['main_des']; ?></p>
            <?php endif; ?>
            <div class="detail_segment">
              <h4>Характеристики</h4>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="parametr_row">
                    <?php if($detail['param_1'] && $detail['value_1']): ?>
                        <div class="parametr">
                            <p> <?php echo $detail['param_1']; ?></p>
                        </div>
                        <div class="parametr">
                            <p> <?php echo $detail['value_1']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['param_2'] && $detail['value_2']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['param_2']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['value_2']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['param_3'] && $detail['value_3']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['param_3']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['value_3']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['param_4'] && $detail['value_4']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['param_4']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['value_4']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['param_5'] && $detail['value_5']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['param_5']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['value_5']; ?></p>
                        </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="parametr_row">
                    <?php if($detail['param_6'] && $detail['value_6']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['param_6']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['value_6']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['param_7'] && $detail['value_7']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['param_7']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['value_7']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['param_8'] && $detail['value_8']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['param_8']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['value_8']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['param_9'] && $detail['value_9']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['param_9']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['value_9']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['param_10'] && $detail['value_10']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['param_10']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['value_10']; ?></p>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <h4>Описание</h4>
            <div class="detail_segment">
              <p><?php echo $detailContent['des_1']; ?></p>
              <?php if($detailContent['img_1'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['img_1']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>

            <div class="detail_segment">
              <p><?php echo $detailContent['des_2']; ?></p>
               <?php if($detailContent['img_2'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['img_2']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['des_3']; ?></p>
               <?php if($detailContent['img_3'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['img_3']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['des_4']; ?></p>
               <?php if($detailContent['img_4'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['img_4']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['des_5']; ?></p>
              <?php if($detailContent['img_5'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['img_5']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_price">$<?php echo $detailPrice['price']; ?></div>

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
          </section>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
