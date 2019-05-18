<?php include ROOT.'/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление категориями</a></li>
                    <li class="active">Добавить категорию</li>
                </ol>
            </div>
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="col-lg-6 col-md-6 col-sm-6  _admin-category-add">
                <h3>Секция №1</h3>
                <h4>Добавить новую категорию</h4>
                <div class="login-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">
                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                        <br><br>

                        <input type="submit" name="submit_1" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 _admin-category-add">
                <h3>Секция №2</h3>
                <h4>Добавить новую категорию</h4>

                <div class="login-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">
                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыта</option>
                        </select>
                        <br><br>
                        <input type="submit" name="submit_2" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
