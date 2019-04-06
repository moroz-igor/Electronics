<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <div class="private_edit">
            <h4>Редактирование данных</h4>
            <form name="date_edit" action="&lt;?=$_SERVER['REQUEST_URI']?&gt;" method="post">
              <div class="date_edit">
                <p>Ваше имя</p>
                <input class="form-control" input="input" type="text" name="name" placeholder="имя"/>
              </div>
              <div class="date_edit">
                <p>Ваша фамилия</p>
                <input class="form-control" input="input" type="text" name="name" placeholder="Фамилия"/>
              </div>
              <div class="date_edit">
                <p>Ваш e-mail</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Ваш телефон</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Ваш регион(область)</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Ваш район</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Ваш населенный пункт(село)</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Способ доставки
                  <input class="form-control" input="input" type="text" name="name" placeholder=""/>
                </p>
              </div>
              <div class="date_edit">
                <p>Номер почтового отделения</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <p>Адрес почтового отделения</p>
                <input class="form-control" input="input" type="text" name="name" placeholder=""/>
              </div>
              <div class="date_edit">
                <div>
                  <input type="submit" name="registration" value="Отправить данные"/>
                </div>
              </div>
            </form>
          </div>
          <div class="private">
            <h4>Личные данные</h4>
            <p>
              <button>Редактировать</button>
            </p>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Ваше имя</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Игорь</div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Фамилия</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Петренко</div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">e-mail</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">abcd@gmail.com</div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Телефон</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">+38067 322 32 32</div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Регион</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Город</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Село</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Способ доставки</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">+38067 322 32 32</div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Номер почтового отделения</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5"> </div>
            </div>
            <div class="row">
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">Адрес почтового отделения</div>
              <div class="col-lg-5 private_segment col-md-5 col-sm-5 col-xs-5">+38067 322 32 32</div>
            </div>
            <p>
              <button>Редактировать</button>
            </p>
          </div>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
