<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class=" _registration-description">

    <div class="_registration-form">
        <h3>Форма регистрации на сайте</h3>
        <p>Регистрация полностью бесплатна и нужна для более удобной последующей авториации на сайте Заполните соответствующия поля формы и нажмите на кнопку "Вперед".</p>
                <?php if ($result): ?>
                    <p class="_registration-success">Вы зарегистрированы!</p>
                <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <p class="_registration-false">Ошибка регистрации!</p>
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
              <p>Ваш e-mail</p>
              <input class="form-control"  type="email" name="email"  value="<?php echo $email; ?>"/>
          </div>
          <div class="form-group">
              <p>Придумайте пароль</p>
              <input class="form-control"  type="password" name="password" value="<?php echo $password; ?>"/>
          </div>
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
