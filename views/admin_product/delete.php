<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Удалить товар</li>
                </ol>
            </div>
            <div>
                <p  class="_registration-false">Будьте внимательны!</p>
                <p  class="_registration-false">Удаление товаров крайне нежелательно!</p>
                <div class="_admin-warning">
                    <p>Идентификаторы товаров подверженны автоматическому инкрементированию, поэтому удаляя продукт
                        #<?php echo $id; ?> вы безвозвратно удаляете идентификатор #<?php echo $id; ?> из базы данных. При последующем добавлении новых продуктов этот идентификатор будет пропущен!  </p><br>
                        <p>Вместо удаления товара вы можете просто отключить его отображение, а в последствии в случае необходимость добавления нового товара просто включить и отредактировать его. Это позволит сохранить правильную градацию идентификаторов в базе данных, а также избежеть нарушения корреляци записей базы данных. </p>
                </div>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm -6">
                    <h3>СЕКЦИЯ №1</h3>
                    <h4>Удалить товар #<?php echo $id; ?> из секции №1</h4>
                    <form method="post">
                        <p class="_admin-warning">Вы действительно хотите удалить запись?</p>
                        <input class="btn btn-danger" type="submit" name="submit" value="Удалить" />
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm -6">
                    <h3>СЕКЦИЯ №2</h3>
                    <h4>Удалить товар #<?php echo $id; ?> из секции №2</h4>
                    <form method="post">
                        <p class="_admin-warning">Вы действительно хотите удалить запись? </p>
                            <input class="btn btn-danger" type="submit" name="submit_2" value="Удалить" />
                    </form>
                </div>

            </div>

        </div>

        </div>
    </div>
</section>
