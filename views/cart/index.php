<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h3>КОРЗИНА    </h3>
          <h4>Вы выбраи товары в колл-ве <?php echo Cart::countItems(); ?> шт! </h4>
    <?php if ($productsInCart): ?>
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
            <div class="basket_exemple"><p><input type="text" name="amount" value="<?php echo $productsInCart[$product['id']];?>"/> шт.</p></div>
            </div>
            <div class="_exemple_container">
            <div ><p class="price"><?php echo $product['price'];?></p></div>
            </div>
            <div class="_exemple_container">
            <div ><p><button>Rec</button> </p></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
          <div class="basket basket_result">
            <div>
              <p>Итого</p>
            </div>
            <div >
              <p><?php echo $totalPrice;?></p>
            </div>
          </div>
          <div class="basket basket_result">
            <div >
              <button>Пересчитать</button>
            </div>
            <div >
              <button>Очистить</button>
            </div>
            <div><a class="btn btn-danger">ОФОРМИТЬ</a></div>
          </div>
      <?php else: ?>
                   <p>Корзина пуста</p>
      <?php endif; ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
