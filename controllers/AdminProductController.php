<?php
/**
 * Контроллер AdminProductController
 * Управление товарами в админпанели
 */
class AdminProductController extends AdminBase
{
    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список товаров
        $productsList = Product::getProductsList();
            $productsListSection = Section::getProductsListSection();
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }
    //Action для страницы "Добавить товар"
    public function actionCreate()
        {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
            $catalogPages = Navigation::getCatalogPages();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['category_name'] = $_POST['category_name'];
            $options['code'] = $_POST['code'];
            $options['code_prev'] = $_POST['code_prev'];
            $options['price'] = $_POST['price'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description_1'] = $_POST['description_1'];
            $options['description_2'] = $_POST['description_2'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            $options['imgbig_1'] = $_POST['imgbig_1'];
            $options['imgbig_2'] = $_POST['imgbig_2'];
            $options['imgbig_3'] = $_POST['imgbig_3'];
            $options['imgbig_4'] = $_POST['imgbig_4'];
            $options['imgbig_5'] = $_POST['imgbig_5'];
            $options['imgmin_1'] = $_POST['imgmin_1'];
            $options['imgmin_2'] = $_POST['imgmin_2'];
            $options['imgmin_3'] = $_POST['imgmin_3'];
            $options['imgmin_4'] = $_POST['imgmin_4'];
            $options['imgmin_5'] = $_POST['imgmin_5'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);

                // Если запись добавлена загружаем изображения
                if ($id) {
                    for ($i=1; $i <=5 ; $i++) {
                        self::umgUploder('_imgbig_'.$i, $id);
                            self::umgUploder('_imgmin_'.$i, $id);
                    }
                }
                // Перенаправляем пользователя на страницу управлениями товарами
                //header("Location: /admin/product");
            }
        }
        /* Создание характеристик товара на странице подробного описания*/
        if (isset($_POST['feature']))
        {
            $options['param_1'] = $_POST['param_1'];
            $options['param_2'] = $_POST['param_2'];
            $options['param_3'] = $_POST['param_3'];
            $options['param_4'] = $_POST['param_4'];
            $options['param_5'] = $_POST['param_5'];
            $options['param_6'] = $_POST['param_6'];
            $options['param_7'] = $_POST['param_7'];
            $options['param_8'] = $_POST['param_8'];
            $options['param_9'] = $_POST['param_9'];
            $options['param_10'] = $_POST['param_10'];
            $options['value_1'] = $_POST['value_1'];
            $options['value_2'] = $_POST['value_2'];
            $options['value_3'] = $_POST['value_3'];
            $options['value_4'] = $_POST['value_4'];
            $options['value_5'] = $_POST['value_5'];
            $options['value_6'] = $_POST['value_6'];
            $options['value_7'] = $_POST['value_7'];
            $options['value_8'] = $_POST['value_8'];
            $options['value_9'] = $_POST['value_9'];
            $options['value_10'] = $_POST['value_10'];
                $id = Product::createProductDetails($options);
        }
        if (isset($_POST['descriptions']))
        {
            $options['main_des'] = $_POST['main_des'];
            $options['des_1'] = $_POST['des_1'];
            $options['des_2'] = $_POST['des_2'];
            $options['des_3'] = $_POST['des_3'];
            $options['des_4'] = $_POST['des_4'];
            $options['des_5'] = $_POST['des_5'];
            $options['img_1'] = $_POST['img_1'];
            $options['img_2'] = $_POST['img_3'];
            $options['img_3'] = $_POST['img_3'];
            $options['img_4'] = $_POST['img_4'];
            $options['img_5'] = $_POST['img_5'];
                $id = Product::createProductDetailsDescriptions($options);
                // Если запись добавлена
                if ($id) {
                    for ($i = 1; $i <= 5  ; $i++) {
                        self::umgUploder('_description_'.$i, $id);
                    }
                }

            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }
    public function actionCreateSection()
        {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Sectioncategory::getCategoriesListAdminSection();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['s1_name'] = $_POST['name'];
            $options['s1_category_id'] = $_POST['category_id'];
            $options['s1_category_name'] = $_POST['category_name'];
            $options['s1_code'] = $_POST['code'];
            $options['s1_code_prev'] = $_POST['code_prev'];
            $options['s1_price'] = $_POST['price'];
            $options['s1_brand'] = $_POST['brand'];
            $options['s1_availability'] = $_POST['availability'];
            $options['s1_description_1'] = $_POST['description_1'];
            $options['s1_description_2'] = $_POST['description_2'];
            $options['s1_is_new'] = $_POST['is_new'];
            $options['s1_is_recommended'] = $_POST['is_recommended'];
            $options['s1_status'] = $_POST['status'];
            $options['s1_imgbig_1'] = $_POST['imgbig_1'];
            $options['s1_imgbig_2'] = $_POST['imgbig_2'];
            $options['s1_imgbig_3'] = $_POST['imgbig_3'];
            $options['s1_imgbig_4'] = $_POST['imgbig_4'];
            $options['s1_imgbig_5'] = $_POST['imgbig_5'];
            $options['s1_imgmin_1'] = $_POST['imgmin_1'];
            $options['s1_imgmin_2'] = $_POST['imgmin_2'];
            $options['s1_imgmin_3'] = $_POST['imgmin_3'];
            $options['s1_imgmin_4'] = $_POST['imgmin_4'];
            $options['s1_imgmin_5'] = $_POST['imgmin_5'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['s1_name']) || empty($options['s1_name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Section::createProductSection($options);

                // Если запись добавлена
                if ($id) {
                    self::umgUploder('_imgbig_1', $id);
                    self::umgUploder('_imgbig_2', $id);
                    self::umgUploder('_imgbig_3', $id);
                    self::umgUploder('_imgbig_4', $id);
                    self::umgUploder('_imgbig_5', $id);
                    self::umgUploder('_imgmin_1', $id);
                    self::umgUploder('_imgmin_2', $id);
                    self::umgUploder('_imgmin_3', $id);
                    self::umgUploder('_imgmin_4', $id);
                    self::umgUploder('_imgmin_5', $id);
                }
                // Перенаправляем пользователя на страницу управлениями товарами
                //header("Location: /admin/product");
            }
        }
        /* Создание характеристик товара на странице подробного описания*/
        if (isset($_POST['feature']))
        {
            $options['param_1'] = $_POST['param_1'];
            $options['param_2'] = $_POST['param_2'];
            $options['param_3'] = $_POST['param_3'];
            $options['param_4'] = $_POST['param_4'];
            $options['param_5'] = $_POST['param_5'];
            $options['param_6'] = $_POST['param_6'];
            $options['param_7'] = $_POST['param_7'];
            $options['param_8'] = $_POST['param_8'];
            $options['param_9'] = $_POST['param_9'];
            $options['param_10'] = $_POST['param_10'];
            $options['value_1'] = $_POST['value_1'];
            $options['value_2'] = $_POST['value_2'];
            $options['value_3'] = $_POST['value_3'];
            $options['value_4'] = $_POST['value_4'];
            $options['value_5'] = $_POST['value_5'];
            $options['value_6'] = $_POST['value_6'];
            $options['value_7'] = $_POST['value_7'];
            $options['value_8'] = $_POST['value_8'];
            $options['value_9'] = $_POST['value_9'];
            $options['value_10'] = $_POST['value_10'];
                $id = Section::createProductDetailsSection($options);
        }
        if (isset($_POST['descriptions']))
        {
            $options['main_des'] = $_POST['main_des'];
            $options['des_1'] = $_POST['des_1'];
            $options['des_2'] = $_POST['des_2'];
            $options['des_3'] = $_POST['des_3'];
            $options['des_4'] = $_POST['des_4'];
            $options['des_5'] = $_POST['des_5'];
            $options['img_1'] = $_POST['img_1'];
            $options['img_2'] = $_POST['img_3'];
            $options['img_3'] = $_POST['img_3'];
            $options['img_4'] = $_POST['img_4'];
            $options['img_5'] = $_POST['img_5'];
                $id = Section::createProductDetailsDescriptionsSection($options);
                // Если запись добавлена
                if ($id) {
                    self::umgUploder('_description_1', $id);
                    self::umgUploder('_description_2', $id);
                    self::umgUploder('_description_3', $id);
                    self::umgUploder('_description_4', $id);
                    self::umgUploder('_description_5', $id);
                }
            //header("Location: /admin/product");
        }
        require_once(ROOT . '/views/admin_product/createSection.php');
        return true;
    }
     // Action для страницы "Редактировать товар"
    public function actionUpdate($id)
        {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['category_name'] = $_POST['category_name'];
            $options['code_prev'] = $_POST['code_prev'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description_1'] = $_POST['description_1'];
            $options['description_2'] = $_POST['description_2'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            $options['imgbig_1'] = $_POST['imgbig_1'];
            $options['imgbig_2'] = $_POST['imgbig_2'];
            $options['imgbig_3'] = $_POST['imgbig_3'];
            $options['imgbig_4'] = $_POST['imgbig_4'];
            $options['imgbig_5'] = $_POST['imgbig_5'];
            $options['imgmin_1'] = $_POST['imgmin_1'];
            $options['imgmin_2'] = $_POST['imgmin_2'];
            $options['imgmin_3'] = $_POST['imgmin_3'];
            $options['imgmin_4'] = $_POST['imgmin_4'];
            $options['imgmin_5'] = $_POST['imgmin_5'];
            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {
                self::umgUpdater('_imgbig_1', $id);
                self::umgUpdater('_imgbig_2', $id);
                self::umgUpdater('_imgbig_3', $id);
                self::umgUpdater('_imgbig_4', $id);
                self::umgUpdater('_imgbig_5', $id);
                self::umgUpdater('_imgmin_1', $id);
                self::umgUpdater('_imgmin_2', $id);
                self::umgUpdater('_imgmin_3', $id);
                self::umgUpdater('_imgmin_4', $id);
                self::umgUpdater('_imgmin_5', $id);
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        $parameter = Product::getProductByIdFromTable($id,'id_product','details');
        if (isset($_POST['feature'])) {

            $options['param_1'] = $_POST['param_1'];
            $options['param_2'] = $_POST['param_2'];
            $options['param_3'] = $_POST['param_3'];
            $options['param_4'] = $_POST['param_4'];
            $options['param_5'] = $_POST['param_5'];
            $options['param_6'] = $_POST['param_6'];
            $options['param_7'] = $_POST['param_7'];
            $options['param_8'] = $_POST['param_8'];
            $options['param_9'] = $_POST['param_9'];
            $options['param_10'] = $_POST['param_10'];
            $options['value_1'] = $_POST['value_1'];
            $options['value_2'] = $_POST['value_2'];
            $options['value_3'] = $_POST['value_3'];
            $options['value_4'] = $_POST['value_4'];
            $options['value_5'] = $_POST['value_5'];
            $options['value_6'] = $_POST['value_6'];
            $options['value_7'] = $_POST['value_7'];
            $options['value_8'] = $_POST['value_8'];
            $options['value_9'] = $_POST['value_9'];
            $options['value_10'] = $_POST['value_10'];
                Product::updateProductDetails($id, $options);
                header("Location: /admin/product");
        }
        $details = Product::getProductByIdFromTable($id,'content_id','details_content');
        if (isset($_POST['descriptions'])) {
            // Если форма отправлена
            $options['main_des'] = $_POST['main_des'];
            $options['des_1'] = $_POST['des_1'];
            $options['des_2'] = $_POST['des_2'];
            $options['des_3'] = $_POST['des_3'];
            $options['des_4'] = $_POST['des_4'];
            $options['des_5'] = $_POST['des_5'];
            $options['img_1'] = $_POST['img_1'];
            $options['img_2'] = $_POST['img_2'];
            $options['img_3'] = $_POST['img_3'];
            $options['img_4'] = $_POST['img_4'];
            $options['img_5'] = $_POST['img_5'];
            // Сохраняем изменения
            if (Product::updateDetailsContentById($id, $options)) {
                self::umgUpdater('_description_1', $id);
                self::umgUpdater('_description_2', $id);
                self::umgUpdater('_description_3', $id);
                self::umgUpdater('_description_4', $id);
                self::umgUpdater('_description_5', $id);
            }
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
        }
    public function actionUpdateSection($id)
        {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Sectioncategory::getCategoriesListAdminSection();
        // Получаем данные о конкретном заказе
        $product = Product::getSectionProductById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['category_name'] = $_POST['category_name'];
            $options['code_prev'] = $_POST['code_prev'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description_1'] = $_POST['description_1'];
            $options['description_2'] = $_POST['description_2'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            $options['imgbig_1'] = $_POST['imgbig_1'];
            $options['imgbig_2'] = $_POST['imgbig_2'];
            $options['imgbig_3'] = $_POST['imgbig_3'];
            $options['imgbig_4'] = $_POST['imgbig_4'];
            $options['imgbig_5'] = $_POST['imgbig_5'];
            $options['imgmin_1'] = $_POST['imgmin_1'];
            $options['imgmin_2'] = $_POST['imgmin_2'];
            $options['imgmin_3'] = $_POST['imgmin_3'];
            $options['imgmin_4'] = $_POST['imgmin_4'];
            $options['imgmin_5'] = $_POST['imgmin_5'];
            // Сохраняем изменения
            if (Section::updateProductByIdSection($id, $options)) {
                self::umgUpdater('_imgbig_1', $id);
                self::umgUpdater('_imgbig_2', $id);
                self::umgUpdater('_imgbig_3', $id);
                self::umgUpdater('_imgbig_4', $id);
                self::umgUpdater('_imgbig_5', $id);
                self::umgUpdater('_imgmin_1', $id);
                self::umgUpdater('_imgmin_2', $id);
                self::umgUpdater('_imgmin_3', $id);
                self::umgUpdater('_imgmin_4', $id);
                self::umgUpdater('_imgmin_5', $id);
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        $parameter = Product::getProductByIdFromTable($id,'s1_id_product','s1_details');
        if (isset($_POST['feature'])) {

            $options['param_1'] = $_POST['param_1'];
            $options['param_2'] = $_POST['param_2'];
            $options['param_3'] = $_POST['param_3'];
            $options['param_4'] = $_POST['param_4'];
            $options['param_5'] = $_POST['param_5'];
            $options['param_6'] = $_POST['param_6'];
            $options['param_7'] = $_POST['param_7'];
            $options['param_8'] = $_POST['param_8'];
            $options['param_9'] = $_POST['param_9'];
            $options['param_10'] = $_POST['param_10'];
            $options['value_1'] = $_POST['value_1'];
            $options['value_2'] = $_POST['value_2'];
            $options['value_3'] = $_POST['value_3'];
            $options['value_4'] = $_POST['value_4'];
            $options['value_5'] = $_POST['value_5'];
            $options['value_6'] = $_POST['value_6'];
            $options['value_7'] = $_POST['value_7'];
            $options['value_8'] = $_POST['value_8'];
            $options['value_9'] = $_POST['value_9'];
            $options['value_10'] = $_POST['value_10'];
                Section::updateProductDetailsSection($id, $options);
                header("Location: /admin/product");
        }
        $details = Product::getProductByIdFromTable($id,'s1_content_id','s1_details_content');
        if (isset($_POST['descriptions'])) {
            // Если форма отправлена
            $options['main_des'] = $_POST['main_des'];
            $options['des_1'] = $_POST['des_1'];
            $options['des_2'] = $_POST['des_2'];
            $options['des_3'] = $_POST['des_3'];
            $options['des_4'] = $_POST['des_4'];
            $options['des_5'] = $_POST['des_5'];
            $options['img_1'] = $_POST['img_1'];
            $options['img_2'] = $_POST['img_2'];
            $options['img_3'] = $_POST['img_3'];
            $options['img_4'] = $_POST['img_4'];
            $options['img_5'] = $_POST['img_5'];
            // Сохраняем изменения
            if (Section::updateDetailsContentByIdSection($id, $options)) {
                self::umgUpdater('_description_1', $id);
                self::umgUpdater('_description_2', $id);
                self::umgUpdater('_description_3', $id);
                self::umgUpdater('_description_4', $id);
                self::umgUpdater('_description_5', $id);
            }
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/updateSection.php');
        return true;
        }
    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар с соответствующим id из первой секции
            Product::deleteProductByIdFromTable($id, 'id', 'product' );
                // Удаляем характеристики товара с соответствующим id
                Product::deleteProductByIdFromTable($id, 'id_product', 'details' );
                    // Удаляем подробное описание товара с соответствующим id
                    Product::deleteProductByIdFromTable($id, 'content_id', 'details_content' );
                        // Удаляем директорию изображений товара
                        self::imgRemover($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        if (isset($_POST['submit_2'])) {
            // Если форма отправлена
            // Удаляем товар с соответствующим id из второй секции
            Product::deleteProductByIdFromTable($id, 's1_id', 's1_product' );
                // Удаляем характеристики товара с соответствующим id
                Product::deleteProductByIdFromTable($id, 's1_id_product', 's1_details' );
                    // Удаляем подробное описание товара с соответствующим id
                    Product::deleteProductByIdFromTable($id, 's1_content_id', 's1_details_content' );
                        // Удаляем директорию изображений товара
                        self::imgRemover($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }



}
