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

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts();

        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public function actionCategory($categoryId, $page = 1)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        //$total = Product::getTotalProductsInCategory($categoryId);
        // Создаем объект Pagination  - постраничная навигация
        //$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT,'');

        require_once(ROOT.'/views/catalog/category.php');
        return true;
    }
    public function actionBrand($section, $category, $brand)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Category::getCategoriesList();

        $brandProducts = array();
        $brandProducts = Product::getBrandProductsListBySection($section, $category, $brand);

        require_once(ROOT . '/views/catalog/brand.php');
        return true;
    }




}
