<?php

include(__DIR__  . '/../lib/request.php');


class BaseController extends Request {
    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * Метод для авторизации необходимо указать
     * все неоходимые данные в конфиге
     *
     * @return [type] [description]
     */
    protected function auth()
    {
        $this->post(
            $this->conf('url'),
            $this->conf('auth')
        );
        return $this;
    }

    /**
     * Метод который проверяет что ответ вернулся правильный, если нет то запускает его еще раз
     * может уйти в цикл
     *
     * @param  [type] $method [description]
     * @param  [type] $data   [description]
     * @return [type]         [description]
     */
    protected function check($method, $data)
    {
        $httpcode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

        if (($httpcode >= 399) AND ($httpcode < 500)) {
            return $this->auth()->{$method}();
        }

        return $data;
    }

    /**
     * Метод для получения данных из конфига
     *
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
    function conf($str)
    {
        $data = $this->confifg;

        $keys = explode('.', $str);

        foreach ($keys as $v) {
            if(!empty($data) && !empty($data[$v])){
                $data = $data[$v];
            }else{
                return false;
            }
        }

        return $data;
    }
}
