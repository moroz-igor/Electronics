<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class=" _registration-description">

    <div class="_registration-form">
    <?php if ($result): ?>
                <p class="_registration-success">Ваш заказ принят!</p>
                <p class="_registration-success">Наши администраторы свяжутся с Вами в бижайшее время!</p>
    <?php else: ?>
        <h3>ОФОРМЛЕНИЕ ЗАКАЗА</h3>
        <p>Заполните соответствующия поля формы и нажмите на кнопку "Оформить заказ".</p>
        <p>Выбрано товаров: <span class="_registration-success"><?php echo $totalQuantity; ?></span>, на сумму: <span class="_registration-success"><?php echo $totalPrice; ?></span>, $</p><br/>
        <?php if (!$result): ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <p class="_registration-false">Ошибка!</p>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
            <?php endif; ?>
                <form action="#" method="post">

                    <div class="form-group">
                        <p>Ваше Имя</p>
                        <input class="form-control" type="text" name="userName"  value="<?php echo $userName; ?>"/>
                    </div>

                    <div class="form-group">
                        <p>Номер вашего мобильного телефона</p>
                        <input class="form-control" type="text" name="userPhone"  value="<?php echo $userPhone; ?>"/>
                    </div>

                    <div class="form-group">
                        <p>Ваш коментарий к заказу</p>
                        <input class="form-control" type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>"/>
                    </div>

                    <div class="modal-footer">
                        <input class="btn btn-success" type="submit" name="submit" value="Оформить заказ"/>
                    </div>
                </form>
        <?php endif; ?>
    <?php endif; ?>
    </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs">
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
