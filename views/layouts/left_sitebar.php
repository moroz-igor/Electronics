<div class="container main-content">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs ">
      <div class="left-sitebar">
        <nav>
          <p><a href="/catalog/1/">Компьютеры - 1</a></p>
          <ul>
            <?php   $categoriesSitebarCatalog = array();
                    $categoriesSitebarCatalog = Category::getCategoriesList(1);
                foreach ($categoriesSitebarCatalog as $categoryItem):  ?>
                    <li>
                    <a  href="/category/1/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a>
                    </li>
            <?php endforeach; ?>
          </ul>
          <p><a href="/catalog/2/">Компьютеры - 2</a></p>
          <ul>
              <?php   $categoriesSitebarCatalog = array();
                      $categoriesSitebarCatalog = Category::getCategoriesList(2);
                  foreach ($categoriesSitebarCatalog as $categoryItem):  ?>
                      <li>
                         <a  href="/category/2/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a>
                      </li>
              <?php endforeach; ?>
          </ul>

          <p><a href="/sectionPage/1/">Комп.комплектующие - 1</a></p>
          <ul>
            <?php   $categoriesSitebarSection = array();
                    $categoriesSitebarSection = Sectioncategory::getCategoriesListSection(1);
            foreach ($categoriesSitebarSection as $categoryItem):  ?>
                <li>
                    <a href="/section/1/<?php echo $categoryItem['s1_id']; ?>"><?php echo $categoryItem['s1_name']; ?></a>
                </li>
            <?php endforeach; ?>
         </ul>
          <p><a href="/sectionPage/2/">Комп.комплектующие - 2</a></p>
          <ul>
            <?php   $categoriesSitebarSection = array();
                    $categoriesSitebarSection = Sectioncategory::getCategoriesListSection(2);
                foreach ($categoriesSitebarSection as $categoryItem):  ?>
                <li>
                    <a href="/section/2/<?php echo $categoryItem['s1_id']; ?>"><?php echo $categoryItem['s1_name']; ?></a>
                </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </div>
    <div class="col-lg-7 col-md-9 col-sm-8  ">
      <div id="content-authorization">
        <div class="authorization">
          <div class="row">
            <form class="navbar-form" action="#">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="E-mail" value=""/>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" value=""/>
              </div>
              <button class="btn btn-success" type="submit"> <i class="fa fa-sign-in"> </i><span>Войти</span></button>
            </form>
          </div>
        </div>
      </div>
      <div class="input_private">   <a href="/cabinet/">Личный кабинет</a></div>
