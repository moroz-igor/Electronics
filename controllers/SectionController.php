<?php
include_once ROOT. '/models/Sectioncategory.php';
include_once ROOT. '/models/Section.php';
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

       $latestProducts = array();
       $latestProducts = Section::getLatestProducts();

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

      require_once(ROOT.'/views/section/category.php');
      return true;
    }
    public function actionBrand($s1_section, $s1_category_id, $s1_brand)
    {
        // вывод динамического меню в категории
        $categories = array();
        $categories = Sectioncategory::getCategoriesListSection();

        $brandProducts = array();
        $brandProducts = Section::getBrandProductsListBySection($s1_section, $s1_category_id, $s1_brand);


        require_once(ROOT . '/views/section/brand_s1.php');
        return true;
    }



}

 ?>
