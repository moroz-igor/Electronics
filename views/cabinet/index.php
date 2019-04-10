<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
<h3>Кабинет пользователя</h3>
<h4>Привет, <?php  echo $user['name'];?>!</h4>

          <div class="private">
            <h4>Ваши личные данные</h4>
            <a href="/edit/"><button>Редактировать данные</button>
            </a>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Ваше имя</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['name'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Фамилия</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['last_name'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">e-mail</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['email'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Телефон</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['phone'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Область</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['region'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Район</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"> <?php  echo $user['area'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Город, село</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['town'];?> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Способ доставки</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['delivery'];?></div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Номер почтового отделения</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['post_number'];?> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Адрес почтового отделения</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"><?php  echo $user['post_adress'];?></div>
            </div>
            <p>
              <a href="/edit/"><button>Редактировать данные</button></a>
            </p>

          </div>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
