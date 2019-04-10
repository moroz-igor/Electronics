<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class=" _registration-description">

    <div class="_registration-form">
        <h3>Вход на сайт</h3>
        <p>Выполните вход для доступа к личным данным</p>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
      <form action="#" method="post">
        <div class="form-group">
        <p>Ваш e-mail</p>
        <input class="form-control"  type="email" name="email"  value="<?php echo $email; ?>"/>
        </div>
        <div class="form-group">
          <p>Ваш пароль</p>
          <input class="form-control"  type="password" name="password" value="<?php echo $password; ?>">
        </div>
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" name="submit" value="Вперед"/>
    </div>
      </form>
    </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs">
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
