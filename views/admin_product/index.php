<?php include ROOT.'/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="accordion" class="panel-croup">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
        <a href="#collapse-1" data-parent="#accordion"  data-toggle="collapse"><h4>СЕКЦИЯ №1 [SECTION #1]</h4></a>
                            </h4>
                        </div>
                        <div id="collapse-1" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
                                <h4>Список товаров</h4>
                                <br/>
                                <table class="table-bordered table-striped table">
                                    <tr>
                                        <th>ID товара</th>
                                        <th>Артикул</th>
                                        <th>Название товара</th>
                                        <th>Цена</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
            <?php foreach ($productsList as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td class="_admin-product-name"><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                        </tr>
            <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
            <a href="#collapse-2" data-parent="#accordion" data-toggle="collapse"><h4>СЕКЦИЯ №2 [SECTION #2]</h4></a>
                            </h4>
                        </div>
                        <div id="collapse-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <a href="/admin/product/createSection" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
                                <h4>Список товаров</h4>
                                <br/>
                                <table class="table-bordered table-striped table">
                                    <tr>
                                        <th>ID товара</th>
                                        <th>Артикул</th>
                                        <th>Название товара</th>
                                        <th>Цена</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($productsListSection as $product): ?>
                                        <tr>
                                            <td><?php echo $product['s1_id']; ?></td>
                                            <td><?php echo $product['s1_code']; ?></td>
                                            <td class="_admin-product-name"><?php echo $product['s1_name']; ?></td>
                                            <td><?php echo $product['s1_price']; ?></td>
                                            <td><a href="/admin/product/updateSection/<?php echo $product['s1_id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                            <td><a href="/admin/product/delete/<?php echo $product['s1_id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<div class="_admin-footer"><p>Create Product</p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--  src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"-->
<script src="/template/js/libs.min.js">   </script>
<script src="/template/js/bootstrap.js">   </script>
</div>
