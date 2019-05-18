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
            <h4>Редактировать товар #<?php echo $id; ?></h4>
            <br/>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="_admin-bigimg-container">
                <?php for ($i= 1; $i <= 5; $i++) { ?>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $i; ?></p>
                        <p>[ imgbig_<?php echo $i; ?> ]</p>
                        <div class="_admin-bigimg">
                            <img src="<?php echo Product::getImage($product['id'], '_imgbig_'.$i); ?>" width="100" alt="" />
                        </div>
                        <input type="file" name="_imgbig_<?php echo $i; ?>" placeholder=""
                                                                    value="<?php echo $product['_imgbig_'.$i]; ?>">
                    </div>
                <?php } ?>
            </div>
                <br>
                <br>
                <br>
                <br>
            <div class="_admin-bigimg-container">
                <?php for ($i= 1; $i <= 5; $i++) { ?>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $i; ?></p>
                        <p>[ imgmin_<?php echo $i; ?> ]</p>
                        <div class="_admin-bigimg">
                            <img src="<?php echo Product::getImage($product['id'], '_imgmin_'.$i); ?>" width="100" alt="" />
                        </div>
                        <input type="file" name="_imgmin_<?php echo $i; ?>" placeholder=""
                                                                    value="<?php echo $product['_imgmin_'.$i]; ?>">
                    </div>
                <?php } ?>

            </div>
                <br>
                <br>
                <br>
                <br>

                <div class="row">
                    <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">

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
                        <select name="availability" class="_admin-form">
                            <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p class="_admin-form-title">Новинка [is_new]</p>
                        <select name="is_new" class="_admin-form">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <br/><br/>
                        <p class="_admin-form-title">Рекомендуемые [is_recommended]</p>
                        <select name="is_recommended" class="_admin-form">
                            <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <br/><br/>
                        <p class="_admin-form-title">Статус [status]</p>
                        <select name="status" class="_admin-form">
                            <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        <br/><br/>
                        <br/><br/>
                        <h4>PATH GENERATOR OF IMAGES</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <?php echo $i.') ' . '/upload/images/products/'.$id.'_product/'.$id.'_imgbig_'.$i.'.jpg<br>'; ?>
                        <?php } ?><br><br>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <?php echo $i.') ' . '/upload/images/products/'.$id.'_product/'.$id.'_imgmin_'.$i.'.jpg<br>'; ?>
                        <?php } ?><br><br>

                    </div>
                    <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                        <p class="_admin-form-title">Артикул [code]</p>
                        <input class="_admin-form" type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

                        <p class="_admin-form-title">Стоимость, $ [price]</p>
                        <input class="_admin-form" type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

                        <p class="_admin-form-title">Производитель [brand]</p>
                        <input class="_admin-form" type="text" name="brand" placeholder="" value="<?php echo $product['brand']; ?>">

                        <p class="_admin-form-title">Краткое описание №2 [description_2]</p>
                        <textarea class="_admin-form" name="description_2"><?php echo $product['description_2']; ?></textarea>
                    <h4>MAX-IMAGES PATH</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <p class="_admin-form-title">
                                Путь к изображению [imgbig_<?php echo $i; ?>]
                                </p>
                                <input class="_admin-form" type="text" name="imgbig_<?php echo $i; ?>" placeholder=""
                                     value="<?php echo Product::getImage($product['id'], '_imgbig_'.$i); ?>">
                        <?php } ?>
                    <h4>MIN-IMAGES PATH</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <p class="_admin-form-title">
                                Путь к изображению [imgmin_<?php echo $i; ?>]
                                </p>
                                <input class="_admin-form" type="text" name="imgmin_<?php echo $i; ?>" placeholder=""
                                     value="<?php echo Product::getImage($product['id'], '_imgmin_'.$i); ?>">
                        <?php } ?>
                    </div>
                    <div class="_admin-btn">
                        <input class="btn btn-success" type="submit" name="submit" class="btn btn-default" value="Сохранить изменения">
                    </div>
                </div>
        </form>
        <form action="#" method="post" >
            <div>
                <h4>Характеристики товара #<?php echo $id; ?></h4>
                    <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                        <p class="_admin-form-title">[parameter_1]</p>
                            <input class="_admin-form" type="text" name="param_1" placeholder=""
                                                                value="<?php echo $parameter['param_1']; ?>"><br>
                        <p class="_admin-form-title">[parameter_2]</p>
                            <input class="_admin-form" type="text" name="param_2" placeholder=""
                                                                value="<?php echo $parameter['param_2']; ?>"><br>
                        <p class="_admin-form-title">[parameter_3]</p>
                            <input class="_admin-form" type="text" name="param_3" placeholder=""
                                                                value="<?php echo $parameter['param_3']; ?>"><br>
                        <p class="_admin-form-title">[parameter_4]</p>
                                    <input class="_admin-form" type="text" name="param_4" placeholder=""
                                                                value="<?php echo $parameter['param_4']; ?>"><br>
                        <p class="_admin-form-title">[parameter_5]</p>
                            <input class="_admin-form" type="text" name="param_5" placeholder=""
                                                                value="<?php echo $parameter['param_5']; ?>"><br>

                        <p class="_admin-form-title">[parameter_6]</p>
                            <input class="_admin-form" type="text" name="param_6" placeholder=""
                                                                value="<?php echo $parameter['param_6']; ?>"><br>
                        <p class="_admin-form-title">[parameter_7]</p>
                            <input class="_admin-form" type="text" name="param_7" placeholder=""
                                                                value="<?php echo $parameter['param_7']; ?>"><br>
                        <p class="_admin-form-title">[parameter_8]</p>
                            <input class="_admin-form" type="text" name="param_8" placeholder=""
                                                                value="<?php echo $parameter['param_8']; ?>"><br>
                        <p class="_admin-form-title">[parameter_9]</p>
                            <input class="_admin-form" type="text" name="param_9" placeholder=""
                                                                value="<?php echo $parameter['param_9']; ?>"><br>
                        <p class="_admin-form-title">[parameter_10]</p>
                            <input class="_admin-form" type="text" name="param_10" placeholder=""
                                                                value="<?php echo $parameter['param_10']; ?>"><br>

                </div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                    <p class="_admin-form-title">[value_1]</p>
                        <input class="_admin-form" type="text" name="value_1" placeholder=""
                                                value="<?php echo $parameter['value_1']; ?>"><br>
                    <p class="_admin-form-title">[value_2]</p>
                        <input class="_admin-form" type="text" name="value_2" placeholder=""
                                                value="<?php echo $parameter['value_2']; ?>"><br>
                    <p class="_admin-form-title">[value_3]</p>
                        <input class="_admin-form" type="text" name="value_3" placeholder=""
                                                value="<?php echo $parameter['value_3']; ?>"><br>
                    <p class="_admin-form-title">[value_4]</p>
                        <input class="_admin-form" type="text" name="value_4" placeholder=""
                                                value="<?php echo $parameter['value_4']; ?>"><br>
                    <p class="_admin-form-title">[value_5]</p>
                        <input class="_admin-form" type="text" name="value_5" placeholder=""
                                                value="<?php echo $parameter['value_5']; ?>"><br>
                    <p class="_admin-form-title">[value_6]</p>
                        <input class="_admin-form" type="text" name="value_6" placeholder=""
                                                value="<?php echo $parameter['value_6']; ?>"><br>
                    <p class="_admin-form-title">[value_7]</p>
                        <input class="_admin-form" type="text" name="value_7" placeholder=""
                                                value="<?php echo $parameter['value_7']; ?>"><br>
                    <p class="_admin-form-title">[value_8]</p>
                        <input class="_admin-form" type="text" name="value_8" placeholder=""
                                                value="<?php echo $parameter['value_8']; ?>"><br>
                    <p class="_admin-form-title">[value_9]</p>
                        <input class="_admin-form" type="text" name="value_9" placeholder=""
                                                value="<?php echo $parameter['value_9']; ?>"><br>
                    <p class="_admin-form-title">[value_10]</p>
                        <input class="_admin-form" type="text" name="value_10" placeholder=""
                                                value="<?php echo $parameter['value_10']; ?>"><br>
                </div>
            <div class="_admin-btn">
                <input class="btn btn-success"  type="submit" name="feature" class="btn btn-default"
                    value="Сохранить измениния">
            </div>
            </div>
        </form>

        <form action="#" method="post" enctype="multipart/form-data">
            <h4>Подробное описание #<?php echo $id; ?></h4>
            <div class="_admin-form-container">
                <h4>Редактор изображений подробного описания</h4>
                <div class="_admin-form-container col-lg-4">
                    <div class="_admin-bigimg-element">

                        <p>Изображение товара <?php echo $id; ?>_description_1</p>
                        <p>[ description_1 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['content_id'], '_description_1'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_1" placeholder=""
                                                    value="<?php echo $details['_description_1']; ?>">
                    </div>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_2</p>
                        <p>[ description_2 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['content_id'], '_description_2'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_2" placeholder=""
                                                    value="<?php echo $details['_description_2']; ?>">
                    </div>
                </div>
                <div class="_admin-form-container col-lg-4 col-md-4 col-sm-4">
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_3</p>
                        <p>[ description_3 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['content_id'], '_description_3'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_3" placeholder=""
                                                    value="<?php echo $details['_description_3']; ?>">
                    </div>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_4</p>
                        <p>[ description_4 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['content_id'], '_description_4'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_4" placeholder=""
                                                    value="<?php echo $details['_description_4']; ?>">
                    </div>
                </div>
                <div class="_admin-form-container col-lg-4 col-md-4 col-sm-4">
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_5</p>
                        <p>[ description_5 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['content_id'], '_description_5'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_5" placeholder=""
                                                    value="<?php echo $details['_description_5']; ?>">
                    </div>
                </div>
                <div class="_admin-form-container col-lg-4 col-md-4 col-sm-4"><br><br><br><br></div>

            </div>
            <div class="_admin-form-container">
                <p class="_admin-form-title">MAIN DESCRIPTION [ main_des ]</p>
                <textarea class="_admin-form" name="main_des"><?php echo $details['main_des'];  ?></textarea><br>
            </div>
                <div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                    <p class="_admin-form-title">DESCRIPTIONS </p>
                    <p class="_admin-form-title">description_1 [des_1]</p>
                        <textarea class="_admin-form" name="des_1"><?php echo $details['des_1'];  ?></textarea><br>
                    <p class="_admin-form-title">description_2 [des_2]</p>
                        <textarea class="_admin-form" name="des_2"><?php echo $details['des_2'];  ?></textarea><br>
                    <p class="_admin-form-title">description_3 [des_3]</p>
                        <textarea class="_admin-form" name="des_3"><?php echo $details['des_3'];  ?></textarea><br>
                    <p class="_admin-form-title">description_4 [des_4]</p>
                        <textarea class="_admin-form" name="des_4"><?php echo $details['des_4'];  ?></textarea><br>
                    <p class="_admin-form-title">description_5 [des_5]</p>
                        <textarea class="_admin-form" name="des_5"><?php echo $details['des_5'];  ?></textarea><br>
                </div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6"><br>
                    <p class="_admin-form-title">PROJECT PATH </p>
                    <p class="_admin-form-title">Путь к изображению [description_1]
                        <span class="_img-form">
                            <?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_1.jpg' ?>
                        </span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['img_1'];  ?>"  name="img_1"><br>
                    <p class="_admin-form-title">Путь к изображению [description_2]
                        <span class="_img-form">
                            <?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_2.jpg' ?>
                        </span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['img_2'];  ?>"  name="img_2"><br>
                    <p class="_admin-form-title">Путь к изображению [description_3]
                        <span class="_img-form">
                            <?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_3.jpg' ?>
                        </span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['img_3'];  ?>"  name="img_3"><br>
                    <p class="_admin-form-title">Путь к изображению [description_4]
                        <span class="_img-form">
                            <?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_4.jpg' ?>
                        </span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['img_4'];  ?>"  name="img_4"><br>
                    <p class="_admin-form-title">Путь к изображению [description_5]
                        <span class="_img-form">
                            <?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_5.jpg' ?>
                        </span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['img_5'];  ?>"  name="img_5">
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
