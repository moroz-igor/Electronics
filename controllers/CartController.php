<?php

/**
 * Контроллер ProductController
 * Товар
 */
class CartController
{

    public function actionIndex()
    {


        // Подключаем вид
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

}
