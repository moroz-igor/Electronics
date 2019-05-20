<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
<?php require_once(ROOT . '/components/Pagination.php'); ?>

          <h2>Комплектующие к компьютерам</h2>
          <h2><?php echo $pageNumber.'<br>'; ?> </h2>
          <div class="btn-group btn-breadcrumb _categoty_nav">
            <?php foreach ($categories as $categoryItem):  ?>
                <a class="btn btn-default" href="/section/<?php echo $pageNumber; ?>/<?php echo $categoryItem['s1_id']; ?>">
                    <?php echo $categoryItem['s1_name']; ?>
                 </a>
            <?php endforeach; ?>
          </div>
          <div class="_search_dir">
              <form class="navbar-form _search_form" action="/search/1" method="get">
                  <div class="form-group">
                      <input class="form-control" type="text" name="search_words"  value=""/>
                  </div>
                  <input class="btn btn-primary _search_link" type="submit" name="button_search" value="Найти"/ >
              </form>
          </div>
          <h3>Товары в дирректории</h3>
          <?php
          (isset($_GET["page"])) ?
                    $page = $_GET["page"] :
                          $page = $_SERVER['REQUEST_URI'];
              if ($page < 1 or $page == "") $page = 1; $limit = 12; $numberButtons = 5;
                          $start = getStart($page, $limit);
                              $articles = getAllArticles($start, $limit, "section", $pageNumber);
           ?>
          <div class="_pagination-buttons">
              <?php $url = 'section.php';
                  echo  pagination($page, $limit, $url, $numberButtons, $numberProducts); ?>
          </div>
          <div class="row row_my">
              <?php foreach ($articles as $product): ?>
                  <div class="col-xs-6 col-sm-4 col-md-3 cpl-lg-3 _massonry-element">
                      <div class="_massonry-element-borber">
                      <div class="_massonry-title">
                          <a href="/sectionproduct1/<?php echo $product['s1_id']; ?>">
                              <h6> <?php echo $product['s1_name']; ?></h6>
                          </a>
                      </div>
                      <div class="_massonry-price">$<?php echo $product['s1_price'];?> </div>

                          <div class="thumbnai">
                              <div class="col-lg-6 _masonry_main_img">
                                  <div class="exemple-main_img" id="exp_<?php echo $product['s1_code']; ?>">
                                      <img src="<?php echo $product['s1_imgbig_1'];  ?>" alt="big_1"/>
                                  </div>
                              </div>
                          </div>
                          <div class="product_cart_message ">
                              <a href="/cart/">КОРЗИНА</a>
                               ( <span class="order_message">
                                    <?php echo Cart::countItems(); ?>
                               </span> )
                          </div>
                          <div class="_massonry-order">
                              <?php if (isset($_SESSION['products']) && array_key_exists($product['s1_id'], $_SESSION['products'])): ?>
                                  <?php echo '<div class="_massonry-ordered"> ЗАКАЗАНО</div>'; ?>
                                  <?php endif; ?>
                              <div id="status_<?php echo $product['s1_id']; ?>" class="order_status">
                                  <div class="_massonry-ordered _massonry-add">ДОБАВЛЕН В КОРЗИНУ</div>
                              </div>
                          </div>
                          <p>Код:
                           <span class="code"><?php echo $product['s1_code_prev'];
                                                      echo $product['s1_code'];  ?><br>
                              <a href="/brand/0/0/<?php echo $product['s1_brand']; ?>">
                                  <?php echo $product['s1_brand']; ?>
                              </a><br>
                              <a href="/category/<?php echo $product['s1_category_id']; ?>">
                                  <?php echo $product['s1_category_name'];  ?>
                              </a>
                          </span>
                          </p>
                          <div class="caption">
                              <div class="exemple-basket_buttons">
                                  <div>
                                      <a class="btn btn-success add-to-cart" href="#" data-id="<?php echo $product['s1_id'];?>">
                                          <span>Купить</span>
                                      </a>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>



         <div class="_pagination-buttons">
             <?php $url = 'section.php';
                 echo  pagination($page, $limit, $url, $numberButtons, $numberProducts); ?>
         </div>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
