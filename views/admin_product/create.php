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
            <?php $last = Product::lastProductId('product', 'id'); ?>
            <h4>Добавить новый товар <span class="_admin-id">[ id:  <?php echo ++$last; ?> ]</span> в секцию №1</h4>
            <br/>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="_admin-form-container">
                <h5>ТОВАР С ИДЕНТИФИКАТОРОМ
                     <span class="_admin-id">[ id:  <?php echo $last; ?> ]</span>
                      БУДЕТ ДОБАВЛЕН В СЕКЦИЮ №1 БАЗЫ ДАННЫХ !
                 </h5>
            </div>
    <form action="#" method="post" enctype="multipart/form-data">
                <div>
                    <div class="_admin-form-container col-lg-6">
                        <h4>PRODUCT</h4>
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
                        <p class="_admin-form-title">Краткоке описание №1</p>
                        <input class="_admin-form" type="text" value=""  name="description_1">

                        <p class="_admin-form-title">Абревиатура секции товара</p>
                        <input class="_admin-form" type="text" value=""  name="code_prev">
                        <br/>
                        <h4>PROJECT PATH</h4>
                        <p class="_admin-form-title">Путь к изображению [imgbig_1]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgbig_1.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgbig_1">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgbig_2]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgbig_2.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgbig_2">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgbig_3]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgbig_3.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgbig_3">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgbig_4]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgbig_4.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgbig_4">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgbig_5]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgbig_5.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgbig_5">
                        <br/>

                        <p class="_admin-form-title">Путь к изображению [imgmin_1]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgmin_1.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgmin_1">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgmin_2]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgmin_2.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgmin_2">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgmin_3]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgmin_3.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgmin_3">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgmin_4]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgmin_4.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgmin_4">
                        <br/>
                        <p class="_admin-form-title">Путь к изображению [imgmin_5]
                            <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_imgmin_5.jpg' ?></span>
                        </p>
                        <input class="_admin-form" type="text" value=""  name="imgmin_5">
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
                        <h4>PRODUCT</h4>
                        <p class="_admin-form-title">Артикул</p>
                        <input class="_admin-form" type="text" name="code" placeholder="" value="">

                        <p class="_admin-form-title">Стоимость, $</p>
                        <input class="_admin-form" type="text" name="price" placeholder="" value="">

                        <p class="_admin-form-title">Производитель</p>
                        <input class="_admin-form" type="text" name="brand" placeholder="" value="">

                        <p class="_admin-form-title">Краткое описание №2</p>
                        <textarea class="_admin-form"  name="description_2"></textarea>
                        <br>
                        <br>
                        <br>
                        <h4>ЗАГРУЗЧИК ИЗОБРАЖЕНИЙ ТОВАРА</h4>
                        <h4>IMG-UPLOADER</h4>
                        <p class="_admin-form-title">Изображение товара [imgbig_1]</p>
                        <input class="_admin-form" type="file" name="_imgbig_1" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgbig_2]</p>
                        <input class="_admin-form" type="file" name="_imgbig_2" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgbig_3]</p>
                        <input class="_admin-form" type="file" name="_imgbig_3" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgbig_4]</p>
                        <input class="_admin-form" type="file" name="_imgbig_4" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgbig_5]</p>
                        <input class="_admin-form" type="file" name="_imgbig_5" placeholder="" value="">

                        <p class="_admin-form-title">Изображение товара [imgmin_1]</p>
                        <input class="_admin-form" type="file" name="_imgmin_1" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgmin_2]</p>
                        <input class="_admin-form" type="file" name="_imgmin_2" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgmin_3]</p>
                        <input class="_admin-form" type="file" name="_imgmin_3" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgmin_4]</p>
                        <input class="_admin-form" type="file" name="_imgmin_4" placeholder="" value="">
                        <p class="_admin-form-title">Изображение товара [imgmin_5]</p>
                        <input class="_admin-form" type="file" name="_imgmin_5" placeholder="" value="">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="_admin-btn">
                    <input class="btn btn-success"  type="submit" name="submit" class="btn btn-default"
                        value="Выполнить запрос">
                </div>
    </form>
    <form action="#" method="post" >
            <div>
                <?php $lastDetails = Product::lastProductId('details', 'id_product'); ?>
                <h4>Характеристики товара
                    <span class="_admin-id"> [ id: <?php echo ++$lastDetails; ?></span> ]
                    будут добавлены в базу данных!
                </h4>

                <?php if($lastDetails != $last){
                        echo '<div class="_registration-false">Внимание! Нарушена коррелляция таблиц!</div>';
                        echo '<div class="_registration-false">Востановите соответствие индентификторов!</div>';}
                        else echo '<div class="_registration-success">Корреляция таблиц в норме!</div>'; ?>
                <div class="_admin-form-container col-lg-6">
                    <p class="_admin-form-title">[parameter_1]</p>
                        <input class="_admin-form" type="text" name="param_1" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_2]</p>
                        <input class="_admin-form" type="text" name="param_2" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_3]</p>
                        <input class="_admin-form" type="text" name="param_3" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_4]</p>
                        <input class="_admin-form" type="text" name="param_4" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_5]</p>
                        <input class="_admin-form" type="text" name="param_5" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_6]</p>
                        <input class="_admin-form" type="text" name="param_6" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_7]</p>
                        <input class="_admin-form" type="text" name="param_7" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_8]</p>
                        <input class="_admin-form" type="text" name="param_8" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_9]</p>
                        <input class="_admin-form" type="text" name="param_9" placeholder="" value=""><br>
                    <p class="_admin-form-title">[parameter_10]</p>
                        <input class="_admin-form" type="text" name="param_10" placeholder="" value=""><br>

            </div>
            <div class="_admin-form-container col-lg-6">
                <p class="_admin-form-title">[value_1]</p>
                    <input class="_admin-form" type="text" name="value_1" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_2]</p>
                    <input class="_admin-form" type="text" name="value_2" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_3]</p>
                    <input class="_admin-form" type="text" name="value_3" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_4]</p>
                    <input class="_admin-form" type="text" name="value_4" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_5]</p>
                    <input class="_admin-form" type="text" name="value_5" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_6]</p>
                    <input class="_admin-form" type="text" name="value_6" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_7]</p>
                    <input class="_admin-form" type="text" name="value_7" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_8]</p>
                    <input class="_admin-form" type="text" name="value_8" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_9]</p>
                    <input class="_admin-form" type="text" name="value_9" placeholder="" value=""><br>
                <p class="_admin-form-title">[value_10]</p>
                    <input class="_admin-form" type="text" name="value_10" placeholder="" value=""><br>
            </div>
        <div class="_admin-btn">
            <input class="btn btn-success"  type="submit" name="feature" class="btn btn-default"
                value="Выполнить запрос">
        </div>
        </div>
    </form>
    <form action="#" method="post" enctype="multipart/form-data">
        <?php $lastDetailsContent = Product::lastProductId('details_content', 'content_id'); ?>
        <h4>Подробное описание продукта
            <span class="_admin-id"> [ id: <?php echo ++$lastDetailsContent; ?></span> ]
            будет добавлено в базу данных!
        </h4>
        <?php if($lastDetailsContent != $last){
                    echo '<div class="_registration-false">Внимание! Нарушена коррелляция таблиц!</div>';
                    echo '<div class="_registration-false">Востановите соответствие индентификторов!</div>';}
                    else echo '<div class="_registration-success">Корреляция таблиц в норме!</div>'; ?>
        <div class="_admin-form-container">
            <h4>Загрузчик изображений подробного описания</h4>
            <div class="_admin-form-container col-lg-4">
                <p class="_admin-form-title">Изображение товара [img_1]</p>
                <input class="_admin-form" type="file" name="_description_1" placeholder="" value="">
                <p class="_admin-form-title">Изображение товара [img_2]</p>
                <input class="_admin-form" type="file" name="_description_2" placeholder="" value="">
            </div>
            <div class="_admin-form-container col-lg-4">
                <p class="_admin-form-title">Изображение товара [img_3]</p>
                <input class="_admin-form" type="file" name="_description_3" placeholder="" value="">
                <p class="_admin-form-title">Изображение товара [img_4]</p>
                <input class="_admin-form" type="file" name="_description_4" placeholder="" value="">
            </div>
            <div class="_admin-form-container col-lg-4">
                <p class="_admin-form-title">Изображение товара [img_5]</p>
                <input class="_admin-form" type="file" name="_description_5" placeholder="" value="">
            </div>
            <div class="_admin-form-container col-lg-4"><br></div>

        </div>
        <div class="_admin-form-container">
            <p class="_admin-form-title">MAIN DESCRIPTION [ main_des ]</p>
            <textarea class="_admin-form" name="main_des"></textarea><br>
        </div>
            <div>
            <div class="_admin-form-container col-lg-6">
                <p class="_admin-form-title">MAIN DESCRIPTION </p>
                <p class="_admin-form-title">description_1 [des_1]</p>
                    <textarea class="_admin-form" name="des_1"></textarea><br>
                <p class="_admin-form-title">description_2 [des_2]</p>
                    <textarea class="_admin-form" name="des_2"></textarea><br>
                <p class="_admin-form-title">description_3 [des_3]</p>
                    <textarea class="_admin-form" name="des_3"></textarea><br>
                <p class="_admin-form-title">description_4 [des_4]</p>
                    <textarea class="_admin-form" name="des_4"></textarea><br>
                <p class="_admin-form-title">description_5 [des_5]</p>
                    <textarea class="_admin-form" name="des_5"></textarea><br>
            </div>
            <div class="_admin-form-container col-lg-6"><br>
                <p class="_admin-form-title">PROJECT PATH </p>
                <p class="_admin-form-title">Путь к изображению [img_1]
                    <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_description_1.jpg' ?></span>
                </p>
                <input class="_admin-form" type="text" value=""  name="img_1"><br>
                <p class="_admin-form-title">Путь к изображению [img_2]
                    <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_description_2.jpg' ?></span>
                </p>
                <input class="_admin-form" type="text" value=""  name="img_2"><br>
                <p class="_admin-form-title">Путь к изображению [img_3]
                    <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_description_3.jpg' ?></span>
                </p>
                <input class="_admin-form" type="text" value=""  name="img_3"><br>
                <p class="_admin-form-title">Путь к изображению [img_4]
                    <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_description_4.jpg' ?></span>
                </p>
                <input class="_admin-form" type="text" value=""  name="img_4"><br>
                <p class="_admin-form-title">Путь к изображению [img_5]
                    <span class="_img-form"><?php echo '/upload/images/products/'.$last.'_description_5.jpg' ?></span>
                </p>
                <input class="_admin-form" type="text" value=""  name="img_5">
            </div>
        <div class="_admin-btn">
            <input class="btn btn-success"  type="submit" name="descriptions" class="btn btn-default"
                value="Выполнить запрос">
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
