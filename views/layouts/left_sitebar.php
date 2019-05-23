<div class="container main-content">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs ">
      <div class="left-sitebar">
        <nav>
            <!-- Pages and categories of the first section -->
            <?php $CatalogPages = NavigationBase::getNavigationPageCatalog(); ?>
            <?php foreach ($CatalogPages as $page):  ?>
                <p><a href="/catalog/<?php echo $page['page']; ?>/">
                    <?php echo $page['page_name']; ?></a>
                </p>
                <ul>
                  <?php   $categoriesSitebarCatalog = array();
                          $categoriesSitebarCatalog = Category::getCategoriesList($page['page']);
                      foreach ($categoriesSitebarCatalog as $categoryItem):  ?>
                        <li>
                            <a  href="/category/<?php echo $page['page'].'/'.$categoryItem['id']; ?>">
                                <?php echo $categoryItem['name']; ?>
                            </a>
                        </li>
                  <?php endforeach; ?>
              </ul>
            <?php endforeach; ?>
            <!-- Pages and categories of the second section -->
            <?php $SectionPages = NavigationBase::getNavigationPageSection(); ?>
            <?php foreach ($SectionPages as $page):  ?>
                <p><a href="/sectionPage/<?php echo $page['page']; ?>/">
                    <?php echo $page['page_name']; ?></a>
                </p>
                <ul>
                  <?php   $categoriesSitebarSection = array();
                          $categoriesSitebarSection = Sectioncategory::getCategoriesListSection($page['page']);
                  foreach ($categoriesSitebarSection as $categoryItem):  ?>
                      <li>
                          <a href="/section/<?php echo $page['page']; ?>/<?php echo $categoryItem['s1_id']; ?>">
                              <?php echo $categoryItem['s1_name']; ?>
                          </a>
                      </li>
                  <?php endforeach; ?>
               </ul>
            <?php endforeach; ?>
        </nav>
      </div>
    </div>
    <div class="col-lg-7 col-md-9 col-sm-8  ">
        <div class="input_private">   <a href="/cabinet/">Личный кабинет</a></div>
