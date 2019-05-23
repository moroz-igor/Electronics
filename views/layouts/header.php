<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Elecronics main</title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/template/svg/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/template/css/main.css" type="text/css"/>
    <link rel="stylesheet" href="/template/css/temp.css" type="text/css"/>
    <link rel="stylesheet" href="/template/css/admin.css" type="text/css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  </head>
  <body>
    <header>
        <div class="temp">Сайт находится в стадии разработки!</div>
        <div class="main-header">
            <h1 class="_header" id="h1-proba">Компьютеры и комлектующие</h1>
            <h1 class="_header" id="h2-proba">ЭЛЛЕКТРОНИКА</h1>
            <div class="header_enter">
                <div>
                    <?php
                    function checkUserName($idUser)
                    {
                        $db = Db::getConnection();
                        $query = 'SELECT name FROM `user` WHERE id = '.$idUser ;
                        $result = $db->query($query);
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        echo $row['name'];
                    }
                    ?>
                    <?php if(User::isGuest()) echo 'Вход не выполен';
                          else {echo 'Здравствуйте, ';checkUserName($_SESSION['user']);echo ' !';}
                     ?>
                </div>
            </div>
        </div>
        <nav class="main-menu" style="padding-right: 10px;">
            <div class="container main-menu" >
                <div class="row">
                    <div class="btn-group btn-breadcrumb">
                        <a class="btn btn-primary" href="/"><i class="fa fa-home"></i></a>
                        <!-- DYNAMIC PAGES -->
                        <!-- Pages of the first section -->
                        <?php $CatalogPages = NavigationBase::getNavigationPageCatalog(); ?>
                        <?php foreach ($CatalogPages as $page):  ?>
                            <a class="btn btn-primary" href="/catalog/<?php echo $page['page']; ?>/">
                                <?php echo $page['page_name']; ?></a>
                        <?php endforeach; ?>
                        <!-- Pages of the second section -->
                        <?php $SectionPages = NavigationBase::getNavigationPageSection(); ?>
                        <?php foreach ($SectionPages as $page):  ?>
                            <a class="btn btn-primary" href="/sectionPage/<?php echo $page['page']; ?>/">
                                <?php echo $page['page_name']; ?></a>
                        <?php endforeach; ?>
                        <a class="btn btn-primary" href="/contacts/">Контакты</a>
                    <?php if(User::isGuest()): ?>
                        <a class="btn btn-success" href="/user/register/">Регистрация </a>
                        <a class="btn btn-success" href="/user/login/"><i class="fa fa-sign-in"></i> Вход</a>
                    <?php else: ?>
                        <a class="btn btn-success" href="/user/logout/">Выход <i class="fa fa-sign-in"></i></a>
                    <?php endif; ?>
                        <a class="btn btn-primary" href="#">Карта сайта</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
