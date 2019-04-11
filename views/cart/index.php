<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h3>КОРЗИНА    </h3>
    <?php if ($productsInCart): ?>
          <div class="basket basket_title">
              <div>
                  <p>НАЗВАНИЕ</p>
              </div>
            <div class="basket_exemple">
              <p>ФОТО</p>
            </div>
            <div class="basket_exemple">
              <p>КОД</p>
            </div>
            <div class="basket_exemple">
              <p>КОЛ-ВО</p>
            </div>
            <div class="basket_exemple">
              <p>ЦЕНА</p>
            </div>
            <div class="basket_exemple">
              <p>ОБНОВИТЬ</p>
            </div>
          </div>
    <?php foreach ($products as $product): ?>
          <div class="basket">
              <div>
                  <p><?php echo $product['name'];?></p>
              </div>
            <div class="basket_exemple"><img src="<?php echo $product['imgmin_1'];?>" alt="basket_exemple"/></div>
            <div class="basket_exemple">
              <p>Код: <?php echo $product['code_prev'];?><?php echo $product['code'];?></p>
            </div>
            <div class="basket_exemple">
              <p>
                <input type="text" name="amount" value="<?php echo $productsInCart[$product['id']];?>"/> шт.
              </p>
            </div>
            <div class="basket_exemple">
              <p class="price"><?php echo $product['price'];?></p>
            </div>
            <div class="basket_exemple">
              <p>
                <button>Обновить</button>
              </p>
            </div>
          </div>
    <?php endforeach; ?>
          <div class="basket basket_result">
            <div class="basket_exemple">
              <p>Итого</p>
            </div>
            <div class="basket_exemple">
              <p><?php echo $totalPrice;?></p>
            </div>
          </div>
          <div class="basket basket_result">
            <div class="basket_exemple">
              <button>Пересчитать</button>
            </div>
            <div class="basket_exemple">
              <button>Очистить</button>
            </div>
            <div class="basket_exemple"><a class="btn btn-danger">ОФОРМИТЬ</a></div>
          </div>
      <?php else: ?>
                   <p>Корзина пуста</p>
      <?php endif; ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
