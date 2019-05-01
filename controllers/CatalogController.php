<?php
/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{
    /**
     * Action для страницы "Каталог товаров"
     */
    public function actionIndex()
    {
        // вывод динамического меню в целой секции
        $categories = array();
        $categories = Category::getCategoriesList();

        $numberProducts = Product::getTotalProductsInCatalog('catalog');

        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        $total = Product::getTotalProductsInCategory($categoryId);

        require_once(ROOT.'/views/catalog/category.php');
        return true;
    }
    public function actionBrand($section, $category, $brand)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList();

        $totalBrand = Product::getTotalProductsInBrand($section, $category, $brand);
        require_once(ROOT . '/views/catalog/brand.php');
        return true;
    }




}
