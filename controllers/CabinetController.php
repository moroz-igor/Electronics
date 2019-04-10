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

    public function actionEdit()
    {
    // Получаем идентификатор пользователя из сессии
    $userId = User::checkLogged();

    // Получаем информацию о пользователе из БД
    $user = User::getUserById($userId);

    // Заполняем переменные для полей формы
    $name = $user['name'];
    $password = $user['password'];
    $last_name = $user['last_name'];
    $phone = $user['phone'];
    $region = $user['region'];
    $area = $user['area'];
    $town = $user['town'];
    $delivery = $user['delivery'];
    $post_number = $user['post_number'];
    $post_adress = $user['post_adress'];

    // Флаг результата
    $result = false;

    // Обработка формы
    if (isset($_POST['submit'])) {
        // Если форма отправлена
        // Получаем данные из формы редактирования
        $name = $_POST['name'];
        $password = $_POST['password'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $region = $_POST['region'];
        $area = $_POST['area'];
        $town = $_POST['town'];
        $delivery = $_POST['delivery'];
        $post_number = $_POST['post_number'];
        $post_adress = $_POST['post_adress'];

        // Флаг ошибок
        $errors = false;

        // Валидируем значения
        if (!User::checkName($name)) {
            $errors[] = 'Имя не должно быть короче 2-х символов';
        }
        if (!User::checkPassword($password)) {
            $errors[] = 'Пароль не должен быть короче 6-ти символов';
        }

        if ($errors == false) {
            // Если ошибок нет, сохраняет изменения профиля
            $result = User::edit($userId, $name, $password,
                                    $last_name, $phone, $region, $area, $town, $delivery, $post_number, $post_adress);
        }
    }

    // Подключаем вид
    require_once(ROOT . '/views/cabinet/edit.php');
    return true;
    }


}
