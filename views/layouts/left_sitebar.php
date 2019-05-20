<div class="container main-content">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 hidden-xs ">
      <div class="left-sitebar">
        <nav>
          <p><a href="/catalog/">Компьютеры</a></p>
          <ul>
            <?php   $categoriesSitebarCatalog = array();
                    $categoriesSitebarCatalog = Category::getCategoriesList();
                foreach ($categoriesSitebarCatalog as $categoryItem):  ?>
                    <li>
                        <a  href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a>
                    </li>
            <?php endforeach; ?>
          </ul>
          <p><a href="/section1/">Комп.комплектующие</a></p>
          <ul>
            <?php   $categoriesSitebarSection = array();
                    $categoriesSitebarSection = Sectioncategory::getCategoriesListSection();
                foreach ($categoriesSitebarSection as $categoryItem):  ?>
                <li>
                    <a href="/section/<?php echo $categoryItem['s1_id']; ?>"><?php echo $categoryItem['s1_name']; ?></a>
                </li>
            <?php endforeach; ?>
          </ul>
          <p><a href="/">Section-3</a></p>
          <ul>
            <li><a href="#">S-3_category-1</a></li>
            <li><a href="#">S-3_category-2</a></li>
            <li><a href="#">S-3_category-3</a></li>
            <li><a href="#">S-3_category-4</a></li>
            <li><a href="#">S-3_category-5</a></li>
            <li><a href="#">S-3_category-6</a></li>
          </ul>
          <p><a href="/">Section-4</a></p>
          <ul>
            <li><a href="#">S-4_category-1</a></li>
            <li><a href="#">S-4_category-2</a></li>
            <li><a href="#">S-4_category-3</a></li>
            <li><a href="#">S-4_category-4</a></li>
            <li><a href="#">S-4_category-5</a></li>
            <li><a href="#">S-4_category-6</a></li>
            <li><a href="#">S-4_category-7</a></li>
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
