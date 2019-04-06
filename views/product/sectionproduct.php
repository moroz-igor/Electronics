<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
    <div class="btn-group btn-breadcrumb _categoty_nav">
        <?php foreach ($categories as $categoryItem):  ?>
            <a class="btn btn-default" href="/section/<?php echo $categoryItem['s1_id']; ?>">
                <?php echo $categoryItem['s1_name']; ?>
            </a>
        <?php endforeach; ?>

    </div>
          <h2><?php echo $product['s1_name']; ?></h2>
          <section class="detail_main">
            <h3>A description of the product example</h3>
            <?php if($detailContent['s1_main_des']): ?>
                <p class="detail-main-description"><?php echo $detailContent['s1_main_des']; ?></p>
            <?php endif; ?>
            <div class="detail_segment">
              <h4>Характеристики</h4>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="parametr_row">
                    <?php if($detail['s1_param_1'] && $detail['s1_value_1']): ?>
                        <div class="parametr">
                            <p> <?php echo $detail['s1_param_1']; ?></p>
                        </div>
                        <div class="parametr">
                            <p> <?php echo $detail['s1_value_1']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_2'] && $detail['s1_value_2']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['s1_param_2']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['s1_value_2']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_3'] && $detail['s1_value_3']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['s1_param_3']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['s1_value_3']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_4'] && $detail['s1_value_4']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['s1_param_4']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['s1_value_4']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_5'] && $detail['s1_value_5']): ?>
                        <div class="parametr">
                            <p><?php echo $detail['s1_param_5']; ?></p>
                        </div>
                        <div class="parametr">
                            <p><?php echo $detail['s1_value_5']; ?></p>
                        </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="parametr_row">
                    <?php if($detail['s1_param_6'] && $detail['s1_value_6']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['s1_param_6']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['s1_value_6']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_7'] && $detail['s1_value_7']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['s1_param_7']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['s1_value_7']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_8'] && $detail['s1_value_8']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['s1_param_8']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['s1_value_8']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_9'] && $detail['s1_value_9']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['s1_param_9']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['s1_value_9']; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($detail['s1_param_10'] && $detail['s1_value_10']): ?>
                    <div class="parametr">
                      <p><?php echo $detail['s1_param_10']; ?></p>
                    </div>
                    <div class="parametr">
                      <p><?php echo $detail['s1_value_10']; ?></p>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <h4>Описание</h4>
            <div class="detail_segment">
              <p><?php echo $detailContent['s1_des_1']; ?></p>
              <?php if($detailContent['s1_img_1'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['s1_img_1']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>

            <div class="detail_segment">
              <p><?php echo $detailContent['s1_des_2']; ?></p>
               <?php if($detailContent['s1_img_2'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['s1_img_2']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['s1_des_3']; ?></p>
               <?php if($detailContent['s1_img_3'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['s1_img_3']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['s1_des_4']; ?></p>
               <?php if($detailContent['s1_img_4'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['s1_img_4']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <p><?php echo $detailContent['s1_des_5']; ?></p>
              <?php if($detailContent['s1_img_5'] ): ?>
              <div class="detail_img">
                  <img src="<?php echo $detailContent['s1_img_5']; ?>" alt="detail_1"/>
              </div>
              <?php endif; ?>
            </div>
            <div class="detail_segment">
              <div class="exemple-minor_img">
                <div>
                  <button class="btn btn-success" type="submit"> <span>Купить</span></button>
                  <button class="btn btn-success" type="submit"> <span>Корзина</span></button>
                </div>
                <p>
                  <button>Перейти к оформлению </button>
                </p>
              </div>
            </div>
          </section>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
