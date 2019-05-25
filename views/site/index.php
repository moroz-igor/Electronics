<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h2>Интернет магазин электроники</h2>
          <!-- Pages of the first section -->
          <?php
                $CatalogContent =NavigationBase::getMainCatalog();
                   ?>
          <?php foreach ($CatalogContent as $content):  ?>
                <h3>В разделе " <?php echo $content['page_name']; ?> " представлены</h3>
                    <a href="/catalog/<?php echo $content['page']; ?>/">
                                    <h4><?php echo $content['title']; ?></h4></a>
                    <p><?php echo $content['description']; ?></p>
                <div class="main_comp">
                     <img src="<?php echo $content['img_path']; ?>" alt="main_laptop"/>
                 </div>
          <?php endforeach; ?>

          <!-- Pages of the second section -->
          <?php
                $SectionContent =NavigationBase::getMainSection();
                   ?>
          <?php foreach ($SectionContent as $content):  ?>
              <h3>В разделе " <?php echo $content['page_name']; ?> " представлены</h3>
                    <a href="/sectionPage/<?php echo $content['page']; ?>/">
                                    <h4><?php echo $content['title']; ?></h4></a>
                    <p><?php echo $content['description']; ?></p>
                <div class="main_comp">
                     <img src="<?php echo $content['img_path']; ?>" alt="main_laptop"/>
                 </div>
          <?php endforeach; ?>


<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
