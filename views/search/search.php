<?php include ROOT.'/views/layouts/header.php'; ?>
<?php include ROOT.'/views/layouts/left_sitebar.php'; ?>
          <h3> Результаты поиска по запросу:</h3>
            <h4>" <?php echo $_GET["search_words"];?> "</h4>
            <?php $section = brandGet($section);
                switch ($section) {
                    case '0': $pr =''; $productLink ='/product/'; $categoryLink='/category/'; break;
                    case '1': $pr ='s1_'; $productLink ='/sectionproduct1/'; $categoryLink='/section/'; break;
                        case '2': $pr ='s2_'; break;
                            case '3': $pr ='s3_'; break;
                    default: $pr =''; $productLink ='/product/'; $categoryLink='/category/'; break; } ?>
            <?php if($sectionSearch[0] != false): foreach ($sectionSearch as $product):$i=0; $i++;?>
                <div>
                    <div class="_search-element _search-img">
                        <img src="<?php echo $product[$pr.'imgmin_1'];  ?>" alt="min_1">
                    </div>
                    <div class="_search-element">
                        <p> <?php echo $i; ?> )
                            <a href="<?php echo $productLink;  echo $product[$pr.'id']; ?>">
                                <?php echo $product[$pr.'name']; ?>
                            </a><br> Категория:
                            <a href="<?php echo $categoryLink;echo $product[$pr.'category_id']; ?>">
                                 <span><?php echo $product[$pr.'category_name']; ?></span>
                            </a>
                            <span> Код: <?php echo $product[$pr.'code_prev'];echo $product[$pr.'id']; ?> </span>
                            <span class="_search-price">Цена: $<?php echo $product[$pr.'price']; ?></span>
                            <span> ID: <?php echo $product[$pr.'id']; ?></span>
                        </p>
                    </div>
                </div>
            <?php endforeach; else:?>
                    <?php echo $sectionSearch[1]; endif; ?>
<?php include ROOT.'/views/layouts/right_sitebar.php'; ?>
<?php include ROOT.'/views/layouts/footer.php'; ?>
