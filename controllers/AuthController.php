<?php

include_once('BaseController.php');


class AuthController extends BaseController {

    function __construct($config)
    {
        parent::__construct($config);
    }

    //
    // Тут идут твои функции
    //

    /**
     * Пример
     *
     * @return @mixed
     */
    function profile()
    {
        // так мы получаем значение переменной
        //          $this->conf('urls.profile')
        // Теперь кидаем ее в метод, и он отправляет запрос
        $data = $this->get(
            $this->conf('urls.profile')
        );

        // это хэлпер, проверяет что мы были авторизованы
        // если нет, то полшет запро еще раз
        // может уйти в цикл, так что аккуратнее
        return $this->check('profile', $data);
    }
}
