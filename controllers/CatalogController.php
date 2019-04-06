<?php
include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/Product.php';
/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function actionComputers()
    {
        // вывод динамического меню в целой секции
        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();

        // Подключаем вид
        require_once(ROOT . '/views/catalog/computers.php');
        return true;
    }

    public function actionCategory($categoryId)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList();


        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        require_once(ROOT.'/views/catalog/category.php');
        return true;
    }


}
