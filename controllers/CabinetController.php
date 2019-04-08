<?php

/**
 * Контроллер ProductController
 * Товар
 */
class CabinetController
{

    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        // Подключаем вид
        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }

}
