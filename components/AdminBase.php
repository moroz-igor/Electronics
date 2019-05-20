<?php
/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые
 * используются в панели администратора
 */
abstract class AdminBase
{
    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($user['role'] == 'admin') {
            return true;
        }
        // Иначе завершаем работу с сообщением об закрытом доступе
        die('Access denied');
    }
    // Загрузчик изображений
    public static function umgUploder($name, $idProduct)
    {
        // Проверим, загружалось ли через форму изображение
        if (is_uploaded_file($_FILES[$name]["tmp_name"])) {
            // проверяем существование дирректории
            $directory = is_dir(ROOT."/upload/images/products/{$idProduct}_product");
            // если дирректория не существует
            if(!$directory)
            // Создаем директорию для изображений отдельного продукта
            mkdir(ROOT."/upload/images/products/{$idProduct}_product");
            // Если загружалось и есть директория переместим его в нужную папке, дадим новое имя
            move_uploaded_file($_FILES[$name]["tmp_name"],
            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$idProduct}_product/{$idProduct}{$name}.jpg");
        }
    }
    // Метод редактирования изображений
    public static function umgUpdater($name, $idProduct)
    {
        // Проверим, загружалось ли через форму изображение
        if (is_uploaded_file($_FILES[$name]["tmp_name"])) {
            // проверяем существование дирректории
            $directory = is_dir(ROOT."/upload/images/products/{$idProduct}_product");
            // если дирректория не существует
            if(!$directory)
            // Создаем директорию для изображений отдельного продукта
                mkdir(ROOT."/upload/images/products/{$idProduct}_product");
            //указываем путь редактируемого изображения переменной
            $filename = ROOT."/upload/images/products/{$idProduct}_product/{$idProduct}{$name}.jpg";
            // если изображение существует
            if (file_exists($filename))
            // удаляем его
            unlink(ROOT."/upload/images/products/{$idProduct}_product/{$idProduct}{$name}.jpg");
            // переместим его в нужную папку, и даем новое название
            move_uploaded_file($_FILES[$name]["tmp_name"],
                $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$idProduct}_product/{$idProduct}{$name}.jpg");
        }
    }
    // Удаление изображений и директории изображений с заданым id
    public static function imgRemover($idProduct)
    {
        $directory = is_dir(ROOT."/upload/images/products/{$idProduct}_product");
        if($directory)
        {
            for ($i=1; $i <=5 ; $i++)
            {
                $filename = ROOT."/upload/images/products/{$idProduct}_product/{$idProduct}_imgbig_{$i}.jpg";
                if(file_exists($filename)) unlink($filename);
                $filename = ROOT."/upload/images/products/{$idProduct}_product/{$idProduct}_imgmin_{$i}.jpg";
                if(file_exists($filename)) unlink($filename);
                $filename = ROOT."/upload/images/products/{$idProduct}_product/{$idProduct}_description_{$i}.jpg";
                if(file_exists($filename)) unlink($filename);
            }
            rmdir(ROOT."/upload/images/products/{$idProduct}_product");
        }
    }



}
