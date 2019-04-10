<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class=" _registration-description">

    <div class="_registration-form">
        <h3>Форма обратной связи</h3>
        <p>Отправьте нам сообщение на e-mail</p>
        <?php if ($result): ?>
                    <p class="_registration-success">Сообщение отправлено!</p>
                    <p class="_registration-success">Мы ответим Вам на указанный e-mail!</p>
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
                        <p>Укажите Вашу почту</p>
                        <input class="form-control" type="email" name="userEmail" placeholder="E-mail"  value="<?php echo   $userEmail; ?>"/>
                    </div>
                    <div class="form-group">
                        <p>Напишите сообщение здесь</p>
                        <input class="form-control"  type="text" name="userText" placeholder="Сообщение"  value="<?php echo     $userText; ?>"/>
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
