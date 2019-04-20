<?php
//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';
//include_once ROOT . '/models/Section.php';
//include_once ROOT . '/models/Sectioncategory.php';
/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{


    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);


        $detail = array();
        $detail = Product::getDetailsById($productId);

        $detailContent = array();
        $detailContent = Product::getDetailsContentById($productId);
        // the price of the product
        $detailPrice = Product::getPriceOfProduct($productId);
        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }
    /*
        'sect/([0-9]+)' => 'product/sectionproduct/$1',
    */
    public function actionSectionproduct($productId)
    {
        $categories = array();
        $categories = Category::getSectionCategoriesList();

        $product = Product::getSectionProductById($productId);

        $detail = array();
        $detail = Product::getSectionDetailsById($productId);

        $detailContent = array();
        $detailContent = Product::getSectionDetailsContentById($productId);

        $detailPrice = Product::getPriceOfProduct($productId);

        // Подключаем вид
        require_once(ROOT . '/views/product/sectionproduct.php');
        return true;
    }



}
