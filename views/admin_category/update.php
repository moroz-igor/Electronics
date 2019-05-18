<?php include ROOT.'/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>


            <br/>
            <div class="col-lg-6 col-md-6 col-sm-6  _admin-category-add">
                <h3>Секция №1</h3>
                <h4>Редактировать категорию "<?php echo $category['name']; ?>"</h4>
                <div class="login-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">
                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?php echo $category['sort_order']; ?>">
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>
                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        <div class="col-lg-6 col-md-6 col-sm-6  _admin-category-add">
            <h3>Секция №2</h3>
            <h4>Редактировать категорию "<?php echo $categorySection['s1_name']; ?>"</h4>
            <div class="login-form">
                <form action="#" method="post">
                    <p>Название</p>
                    <input type="text" name="name" placeholder="" value="<?php echo $categorySection['s1_name']; ?>">
                    <p>Порядковый номер</p>
                    <input type="text" name="sort_order" placeholder="" value="<?php echo $categorySection['s1_sort_order'];?>">
                    <p>Статус</p>
                    <select name="status">
                        <option value="1" <?php if ($categorySection['s1_status'] == 1) echo ' selected="selected"';?>>Отображается</option>
                        <option value="0" <?php if ($categorySection['s1_status'] == 0) echo ' selected="selected"'; ?>>Скрыта<option>
                    </select>
                    <br><br>
                    <input type="submit" name="submit_2" class="btn btn-default" value="Сохранить">
                </form>
            </div>
        </div>
        </div>
    </div>
</section>
