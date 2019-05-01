<?php
//include_once ROOT. '/models/Sectioncategory.php';
//include_once ROOT. '/models/Section.php';
/*
* Контроллер SectionController
* Каталог товаров
*/
class SectionController
{
   /**
    * Action для страницы "Каталог товаров"
    */
   public function actionSection()
    {
       $categories = array();
       $categories = Sectioncategory::getCategoriesListSection();
       $numberProducts = Product::getTotalProductsInCatalog('section');

       // Подключаем вид
       require_once(ROOT . '/views/section/section.php');
       return true;
    }
    public function actionCategory($categoryId)
    {
      $categories = array();
      $categories = Sectioncategory::getCategoriesListSection();

      $categoryProducts = array();
      $categoryProducts = Section::getProductsListByCategory($categoryId);

      $total = Section::getTotalProductsInCategory($categoryId);

      require_once(ROOT.'/views/section/category.php');
      return true;
    }
    public function actionBrand($section, $category, $brand)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Sectioncategory::getCategoriesListSection();

        $totalBrand = Product::getTotalProductsInBrand($section, $category, $brand);
        require_once(ROOT . '/views/section/brand_s1.php');
        return true;
    }



}

 ?>
