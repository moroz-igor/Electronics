<?php

/**
 * Контроллер ProductController
 * Товар
 */
class CabinetController
{

    public function actionIndex()
    {


        // Подключаем вид
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

}
