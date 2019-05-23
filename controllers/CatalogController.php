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
    public function actionIndex($pageNumber)
    {
        // вывод динамического меню в целой секции
        $categories = array();
        $categories = Category::getCategoriesList($pageNumber);

        $numberProducts = Product::getTotalProductsInCatalog('catalog');

        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($pageNumber, $categoryId)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList($pageNumber);

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        $total = Product::getTotalProductsInCategory($categoryId);

        require_once(ROOT.'/views/catalog/category.php');
        return true;
    }
    public function actionBrand($pageNumber, $section, $category, $brand)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList($pageNumber);

        $totalBrand = Product::getTotalProductsInBrand($section, $category, $brand);
        require_once(ROOT . '/views/catalog/brand.php');
        return true;
    }




}
