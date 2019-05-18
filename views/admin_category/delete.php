<?php include ROOT.'/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Удалить категорию</li>
                </ol>
            </div>
            <div>
                <p  class="_registration-false">Будьте внимательны!</p>
                <p  class="_registration-false">Удаление категорий крайне нежелательно!</p>
                <div class="_admin-warning">
                    <p>Идентификаторы категорий подверженны автоматическому инкрементированию, поэтому удаляя категорию
                        #<?php echo $id; ?> вы безвозвратно удаляете идентификатор #<?php echo $id; ?> из базы данных. При последующем добавлении новых категорий этот идентификатор будет пропущен!  </p><br>
                        <p>Вместо удаления категории вы можете просто отключить ее отображение, а в последствии в случае необходимость добавления новых категорий просто включить и отредактировать её. Это позволит сохранить правильную градацию идентификаторов в базе данных.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                    <h4>Удалить категорию #<?php echo $id; ?> первой секции</h4>
                    <p>Вы действительно хотите удалить эту категорию?</p><br>
                    <form method="post">
                        <input type="submit" name="submit" value="Да, удалить !" />
                    </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                    <h4>Удалить категорию #<?php echo $id; ?> второй секции</h4>
                    <p>Вы действительно хотите удалить эту категорию?</p><br>
                <form method="post">
                    <input  type="submit" name="submit_2" value="Да, удалить !" />
                </form>
            </div>


        </div>
    </div>
</section>
