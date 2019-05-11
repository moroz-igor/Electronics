<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="_admin-form-container col-lg-6">

                        <p class="_admin-form-title">Название товара [name]</p>
                        <input class="_admin-form" type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">


                        <p class="_admin-form-title">Категория [category]</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/>

                        <p class="_admin-form-title">Название категории [category_name]</p>
                        <input class="_admin-form" type="text" name="category_name" placeholder="" value="<?php echo $product['category_name']; ?>">
                        <br/>

                        <p class="_admin-form-title">Абревиатура секции [code_prev]</p>
                        <input class="_admin-form" type="text" name="code_prev" placeholder="" value="<?php echo $product['code_prev']; ?>">
                        <br/>


                        <p class="_admin-form-title">Краткое описание №1 [description_1]</p>
                        <textarea class="_admin-form" name="description_1"><?php echo $product['description_1']; ?></textarea>

                        <br/>

                        <p class="_admin-form-title">Наличие на складе [availability]</p>
                        <select name="availability">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p class="_admin-form-title">Новинка [is_new]</p>
                        <select name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p class="_admin-form-title">Рекомендуемые [is_recommended]</p>
                        <select name="is_recommended">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p class="_admin-form-title">Статус [status]</p>
                        <select name="status">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>

                        <br/><br/>



                        <br/><br/>
                    </div>
                    <div class="_admin-form-container col-lg-6">
                        <p class="_admin-form-title">Артикул [code]</p>
                        <input class="_admin-form" type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p class="_admin-form-title">Стоимость, $ [price]</p>
                        <input class="_admin-form" type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <p class="_admin-form-title">Производитель [brand]</p>
                        <input class="_admin-form" type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

                        <p class="_admin-form-title">Краткое описание №2 [description_2]</p>
                        <textarea class="_admin-form" name="description_2"><?php echo $product['description_2']; ?></textarea>
            <p>Изображение товара 1</p>
            <img src="<?php echo Product::getImage($product['id'], '_imgbig_1'); ?>" width="200" alt="" />
            <input type="file" name="imgbig_1" placeholder="" value="<?php echo $product['imgbig_1']; ?>">

            <p>Изображение товара 2</p>
            <img src="<?php echo Product::getImage($product['id'], '_imgbig_2'); ?>" width="200" alt="" />
            <input type="file" name="imgbig_2" placeholder="" value="<?php echo $product['imgbig_2']; ?>">



                    </div>
                    <div class="_admin-btn">
                        <input class="btn btn-success" type="submit" name="submit" class="btn btn-default" value="Сохранить изменения">
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<br/>
<br/>
<br/>
<br/>
