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
}
 ?>
