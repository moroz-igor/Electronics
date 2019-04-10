<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class=" _registration-description">

    <div class="_registration-form">
        <h3>Редактирование данных</h3>
        <p>Заполните соответствующия поля формы и нажмите на кнопку "Вперед".</p>
            <?php if ($result): ?>
                <p class="_registration-success">Данные отредактированы!</p>
            <?php else: ?>
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
        <p>Как Вас зовут</p>
        <input class="form-control" type="text" name="name"  value="<?php echo $name; ?>"/>
        </div>

        <div class="form-group">
        <p>Фамилия</p>
        <input class="form-control"  type="last_name" name="last_name"  value="<?php echo $last_name; ?>"/>
        </div>


        <div class="form-group">
          <p>Номер вашего мобильного телефона</p>
          <input class="form-control" type="phone" name="phone"  value="<?php echo $phone; ?>"/>
        </div>
        <div class="form-group">
          <p>Ваша область</p>
          <input class="form-control" type="region" name="region"  value="<?php echo $region; ?>"/>
        </div>
        <div class="form-group">
          <p>Ваш район</p>
          <input class="form-control" type="area" name="area"  value="<?php echo $area; ?>"/>
        </div>
        <div class="form-group">
          <p>Ваш город, село</p>
          <input class="form-control" type="town" name="town"  value="<?php echo $town; ?>"/>
        </div>
        <div class="form-group">
          <p>Способ доставки</p>
          <input class="form-control" type="delivery" name="delivery"  value="<?php echo $delivery; ?>"/>
        </div>
        <div class="form-group">
          <p>Номер почтового отделения</p>
          <input class="form-control" type="post_number" name="post_number"  value="<?php echo $post_number; ?>"/>
        </div>
        <div class="form-group">
          <p>Адрес почтового отделения</p>
          <input class="form-control" type="post_adress" name="post_adress"  value="<?php echo $post_adress; ?>"/>
        </div>

        <div class="form-group">
          <p>Ваш пароль</p>
          <input class="form-control"  type="password" name="password" value="<?php echo $password; ?>"/>
        </div>
    <!--
        <div class="form-group">
          <p>Введите пароль повторно</p>
          <input class="form-control"  type="password" name="password" placeholder=""/>
        </div>
    -->
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" name="submit" value="Вперед"/>
    </div>
    </form>
    <?php endif; ?>
    </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs">
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
