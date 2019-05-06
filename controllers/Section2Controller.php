<?php
/*
* Контроллер Catalog2Controller
* Каталог товаров
*/
class Section2Controller
{

   /**
    * Action для страницы "Каталог товаров"
    */
   public function actionSection()
   {
       //$categories = array();
       //$categories = Category::getCategoriesList();
       $categories = array();
       $categories = Sectioncategory::getCategoriesListSection();


       //$latestProducts = array();
       //$latestProducts = Product::getLatestProducts();

       // Подключаем вид
       require_once(ROOT . '/views/section2/section.php');
       return true;
   }
   //public function actionCategory($categoryId)
   //{
    //   $categories = array();
    //   $categories = Category::getCategoriesList();

    //   $categoryProducts = array();
    //   $categoryProducts = Product::getProductsListByCategory($categoryId);

    //   require_once(ROOT.'/views/catalog/category.php');
    //   return true;
   //}


}

 ?>
