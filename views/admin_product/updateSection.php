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
                            <img src="<?php echo Product::getImage($product['s1_id'], '_imgbig_'.$i); ?>" width="100" alt="" />
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
                            <img src="<?php echo Product::getImage($product['s1_id'], '_imgmin_'.$i); ?>" width="100" alt="" />
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
                        <input class="_admin-form" type="text" name="name" placeholder="" value="<?php echo $product['s1_name']; ?>">


                        <p class="_admin-form-title">Категория [category]</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['s1_id']; ?>"
                                <?php if ($product['s1_category_id'] == $category['s1_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['s1_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <br/>
                        <p class="_admin-form-title">Название категории [s1_category_name]</p>
                        <input class="_admin-form" type="text" name="category_name" placeholder="" value="<?php echo $product['s1_category_name']; ?>">
                        <br/>
                        <p class="_admin-form-title">Абревиатура секции [s1_code_prev]</p>
                        <input class="_admin-form" type="text" name="code_prev" placeholder="" value="<?php echo $product['s1_code_prev']; ?>">
                        <br/>
                        <p class="_admin-form-title">Краткое описание №1 [s1_description_1]</p>
                        <textarea class="_admin-form" name="description_1"><?php echo $product['s1_description_1']; ?></textarea>
                        <br/>
                        <p class="_admin-form-title">Наличие на складе [s1_availability]</p>
                        <select name="availability" class="_admin-form">
                            <option value="1" <?php if ($product['s1_availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['s1_availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>

                        <br/><br/>

                        <p class="_admin-form-title">Новинка [s1_is_new]</p>
                        <select name="is_new" class="_admin-form">
                            <option value="1" <?php if ($product['s1_is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['s1_is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <br/><br/>
                        <p class="_admin-form-title">Рекомендуемые [s1_is_recommended]</p>
                        <select name="is_recommended" class="_admin-form">
                            <option value="1" <?php if ($product['s1_is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['s1_is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <br/><br/>
                        <p class="_admin-form-title">Статус [s1_status]</p>
                        <select name="status" class="_admin-form">
                            <option value="1" <?php if ($product['s1_status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($product['s1_status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        <br/><br/>
                        <br/><br/>
                        <h4>PATH GENERATOR OF IMAGES</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <?php echo $i.') ' . '/upload/images/products/'.$id.'_product/'.$id.'_imgbig_'.$i.'.jpg<br>'; ?>
                        <?php } ?><br>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <?php echo $i.') ' . '/upload/images/products/'.$id.'_product/'.$id.'_imgmin_'.$i.'.jpg<br>'; ?>
                        <?php } ?>

                    </div>
                    <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                        <p class="_admin-form-title">Артикул [s1_code]</p>
                        <input class="_admin-form" type="text" name="code" placeholder="" value="<?php echo $product['s1_code']; ?>">

                        <p class="_admin-form-title">Стоимость, $ [s1_price]</p>
                        <input class="_admin-form" type="text" name="price" placeholder="" value="<?php echo $product['s1_price']; ?>">

                        <p class="_admin-form-title">Производитель [s1_brand]</p>
                        <input class="_admin-form" type="text" name="brand" placeholder="" value="<?php echo $product['s1_brand']; ?>">

                        <p class="_admin-form-title">Краткое описание №2 [s1_description_2]</p>
                        <textarea class="_admin-form" name="description_2"><?php echo $product['s1_description_2']; ?></textarea>
                        <h4>MAX-IMAGES</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <p class="_admin-form-title">
                                Путь к изображению [s1_imgbig_<?php echo $i; ?>]
                                </p>
                                <input class="_admin-form" type="text" name="imgbig_<?php echo $i; ?>" placeholder=""
                                     value="<?php echo Product::getImage($product['s1_id'], '_imgbig_'.$i); ?>">
                        <?php } ?>
                        <h4>MIN-IMAGES</h4>
                        <?php for ($i= 1; $i <= 5; $i++) { ?>
                            <p class="_admin-form-title">
                                Путь к изображению [s1_imgmin_<?php echo $i; ?>]
                                </p>
                                <input class="_admin-form" type="text" name="imgmin_<?php echo $i; ?>" placeholder=""
                                     value="<?php echo Product::getImage($product['s1_id'], '_imgmin_'.$i); ?>">
                        <?php } ?>

                    </div>
                    <div class="_admin-btn">
                        <input class="btn btn-success" type="submit" name="submit" class="btn btn-default" value="Сохранить изменения">
                    </div>
                </div><br>
        </form>
        <form action="#" method="post" >
            <div>
                <h4>Характеристики товара #<?php echo $id; ?></h4>
                    <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                        <p class="_admin-form-title">[s1_parameter_1]</p>
                            <input class="_admin-form" type="text" name="param_1" placeholder=""
                                                                value="<?php echo $parameter['s1_param_1']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_2]</p>
                            <input class="_admin-form" type="text" name="param_2" placeholder=""
                                                                value="<?php echo $parameter['s1_param_2']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_3]</p>
                            <input class="_admin-form" type="text" name="param_3" placeholder=""
                                                                value="<?php echo $parameter['s1_param_3']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_4]</p>
                                    <input class="_admin-form" type="text" name="param_4" placeholder=""
                                                                value="<?php echo $parameter['s1_param_4']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_5]</p>
                            <input class="_admin-form" type="text" name="param_5" placeholder=""
                                                                value="<?php echo $parameter['s1_param_5']; ?>"><br>

                        <p class="_admin-form-title">[s1_parameter_6]</p>
                            <input class="_admin-form" type="text" name="param_6" placeholder=""
                                                                value="<?php echo $parameter['s1_param_6']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_7]</p>
                            <input class="_admin-form" type="text" name="param_7" placeholder=""
                                                                value="<?php echo $parameter['s1_param_7']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_8]</p>
                            <input class="_admin-form" type="text" name="param_8" placeholder=""
                                                                value="<?php echo $parameter['s1_param_8']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_9]</p>
                            <input class="_admin-form" type="text" name="param_9" placeholder=""
                                                                value="<?php echo $parameter['s1_param_9']; ?>"><br>
                        <p class="_admin-form-title">[s1_parameter_10]</p>
                            <input class="_admin-form" type="text" name="param_10" placeholder=""
                                                                value="<?php echo $parameter['s1_param_10']; ?>"><br>

                </div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6">
                    <p class="_admin-form-title">[s1_value_1]</p>
                        <input class="_admin-form" type="text" name="value_1" placeholder=""
                                                value="<?php echo $parameter['s1_value_1']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_2]</p>
                        <input class="_admin-form" type="text" name="value_2" placeholder=""
                                                value="<?php echo $parameter['s1_value_2']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_3]</p>
                        <input class="_admin-form" type="text" name="value_3" placeholder=""
                                                value="<?php echo $parameter['s1_value_3']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_4]</p>
                        <input class="_admin-form" type="text" name="value_4" placeholder=""
                                                value="<?php echo $parameter['s1_value_4']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_5]</p>
                        <input class="_admin-form" type="text" name="value_5" placeholder=""
                                                value="<?php echo $parameter['s1_value_5']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_6]</p>
                        <input class="_admin-form" type="text" name="value_6" placeholder=""
                                                value="<?php echo $parameter['s1_value_6']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_7]</p>
                        <input class="_admin-form" type="text" name="value_7" placeholder=""
                                                value="<?php echo $parameter['s1_value_7']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_8]</p>
                        <input class="_admin-form" type="text" name="value_8" placeholder=""
                                                value="<?php echo $parameter['s1_value_8']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_9]</p>
                        <input class="_admin-form" type="text" name="value_9" placeholder=""
                                                value="<?php echo $parameter['s1_value_9']; ?>"><br>
                    <p class="_admin-form-title">[s1_value_10]</p>
                        <input class="_admin-form" type="text" name="value_10" placeholder=""
                                                value="<?php echo $parameter['s1_value_10']; ?>"><br>
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
                        <img src="<?php echo Product::getImage($details['s1_content_id'], '_description_1'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_1" placeholder=""
                                                    value="<?php echo $details['_description_1']; ?>">
                    </div>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_2</p>
                        <p>[ description_2 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['s1_content_id'], '_description_2'); ?>" width="50" alt="" />
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
                        <img src="<?php echo Product::getImage($details['s1_content_id'], '_description_3'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_3" placeholder=""
                                                    value="<?php echo $details['_description_3']; ?>">
                    </div>
                    <div class="_admin-bigimg-element">
                        <p>Изображение товара <?php echo $id; ?>_description_4</p>
                        <p>[ description_4 ]</p>
                        <div class="_admin-bigimg">
                        <img src="<?php echo Product::getImage($details['s1_content_id'], '_description_4'); ?>" width="50" alt="" />
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
                        <img src="<?php echo Product::getImage($details['s1_content_id'], '_description_5'); ?>" width="50" alt="" />
                        </div>
                        <input class="_admin-form" type="file" name="_description_5" placeholder=""
                                                    value="<?php echo $details['_description_5']; ?>">
                    </div>
                </div>
                <div class="_admin-form-container col-lg-4 col-md-4 col-sm-4"><br><br><br><br></div>

            </div>
            <div class="_admin-form-container">
                <p class="_admin-form-title">MAIN DESCRIPTION [ main_des ]</p>
                <textarea class="_admin-form" name="main_des"><?php echo $details['s1_main_des'];  ?></textarea><br>
            </div>
                <div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6"><br>
                    <br><p class="_admin-form-title">DESCRIPTIONS </p>
                    <p class="_admin-form-title">description_1 [s1_des_1]</p>
                        <textarea class="_admin-form" name="des_1"><?php echo $details['s1_des_1'];  ?></textarea><br>
                    <p class="_admin-form-title">description_2 [s1_des_2]</p>
                        <textarea class="_admin-form" name="des_2"><?php echo $details['s1_des_2'];  ?></textarea><br>
                    <p class="_admin-form-title">description_3 [s1_des_3]</p>
                        <textarea class="_admin-form" name="des_3"><?php echo $details['s1_des_3'];  ?></textarea><br>
                    <p class="_admin-form-title">description_4 [s1_des_4]</p>
                        <textarea class="_admin-form" name="des_4"><?php echo $details['s1_des_4'];  ?></textarea><br>
                    <p class="_admin-form-title">description_5 [s1_des_5]</p>
                        <textarea class="_admin-form" name="des_5"><?php echo $details['s1_des_5'];  ?></textarea><br>
                </div>
                <div class="_admin-form-container col-lg-6 col-md-6 col-sm-6"><br>
                    <p class="_admin-form-title">PROJECT PATH </p>

                    <p class="_admin-form-title">Путь к изображению [s1_description_1]
                        <span class="_img-form">
                            <br><?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_1.jpg' ?></span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['s1_img_1'];  ?>"  name="img_1"><br>
                    <p class="_admin-form-title">Путь к изображению [s1_description_2]
                        <span class="_img-form">
                            <br><?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_2.jpg' ?></span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['s1_img_2'];  ?>"  name="img_2"><br>
                    <p class="_admin-form-title">Путь к изображению [s1_description_3]
                        <span class="_img-form">
                            <br><?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_3.jpg' ?></span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['s1_img_3'];  ?>"  name="img_3"><br>
                    <p class="_admin-form-title">Путь к изображению [s1_description_4]
                        <span class="_img-form">
                            <br><?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_4.jpg' ?></span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['s1_img_4'];  ?>"  name="img_4"><br>
                    <p class="_admin-form-title">Путь к изображению [s1_description_5]
                        <span class="_img-form">
                            <br><?php echo '/upload/images/products/'.$id.'_product/'.$id.'_description_5.jpg' ?></span>
                    </p>
                    <input class="_admin-form" type="text" value="<?php echo $details['s1_img_5'];  ?>"  name="img_5">
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
