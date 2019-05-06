<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h2>Электротехника</h2>
          <div class="btn-group btn-breadcrumb _categoty_nav">
              <?php foreach ($categories as $categoryItem):  ?>
                  <a class="btn btn-default" href="/section/<?php echo $categoryItem['s1_id']; ?>">
                      <?php echo $categoryItem['s1_name']; ?>
                  </a>
              <?php endforeach; ?>
          </div>

          <div class="_search_dir">
            <form class="navbar-form _search_form" action="#">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="" value=""/>
              </div>
              <button class="btn btn-default _search_link" type="submit"> <i class="fa fa-sign-in"> </i><span>Поиск в дирректории</span></button>
            </form>
          </div>
          <h3>Микроволновые печи</h3>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
