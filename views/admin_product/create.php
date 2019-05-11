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
            <h4>Добавить новый товар</h4>
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="#" method="post" enctype="multipart/form-data">
                <div>
                    <div class="_admin-form-container col-lg-6">
                        <p class="_admin-form-title">Название товара</p>
                        <input class="_admin-form" type="text" name="name" placeholder="" value="">


                        <p class="_admin-form-title">Категория</p>
                        <select class="_admin-form" name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p class="_admin-form-title">Введите название категории</p>
                        <input class="_admin-form" type="text" name="category_name" placeholder="" value="">

                        <br/>

                        <p class="_admin-form-title">Кратоке описание №1</p>
                        <textarea class="_admin-form"  name="description_1"></textarea>

                        <p class="_admin-form-title">Абревиатура секции товара</p>
                        <textarea class="_admin-form"  name="code_prev"></textarea>

                        <br/>

                        <p class="_admin-form-title">Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br/>

                        <p class="_admin-form-title">Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br/>

                        <p class="_admin-form-title">Рекомендуемые</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <br/>

                        <p class="_admin-form-title">Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>
                        <br/><br/>

                    </div>
                    <div class="_admin-form-container col-lg-6">
                        <p class="_admin-form-title">Артикул</p>
                        <input class="_admin-form" type="text" name="code" placeholder="" value="">

                        <p class="_admin-form-title">Стоимость, $</p>
                        <input class="_admin-form" type="text" name="price" placeholder="" value="">

                        <p class="_admin-form-title">Производитель</p>
                        <input class="_admin-form" type="text" name="brand" placeholder="" value="">

                        <p class="_admin-form-title">Кратоке описание №2</p>
                        <textarea class="_admin-form"  name="description_2"></textarea>

                        <p class="_admin-form-title">Изображение товара</p>
                        <input class="_admin-form" type="file" name="imgbig_1" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара</p>
                        <input class="_admin-form" type="file" name="imgbig_2" placeholder="" value="">




                    </div>
                </div>
                <div class="_admin-btn">
                    <input class="btn btn-success"  type="submit" name="submit" class="btn btn-default" value="Сохранить">
                </div>
            </form>

        </div>
    </div>
</section>
<br/>
<br/>
<br/>
<br/>
