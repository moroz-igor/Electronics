<?php
class NavigationBase
{
    public static function getNavigationPageCatalog()
    {
        $CatalogPages = array();
        $CatalogPages = Navigation::getCatalogPages();
        return $CatalogPages;
    }
    public static function getNavigationPageSection()
    {
        $SectionPages = array();
        $SectionPages = Navigation::getSectionPages();
        return $SectionPages;
    }
    public static function getMainCatalog()
    {
        $mainCatalog = array();
            $mainCatalog = Navigation::getCatalogContent();
        return $mainCatalog;
    }
    public static function getMainSection()
    {
        $mainSection = array();
            $mainSection = Navigation::getSectionContent();
        return $mainSection;
    }



}
 ?>
