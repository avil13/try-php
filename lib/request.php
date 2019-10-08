<?php

/**
* Request
*/
class Request
{
    protected $ch;
    protected $cookie = '';

    /**
     * CURLOPT_COOKIEJAR  - файл, куда пишутся куки после закрытия коннекта, например после curl_close()
     * CURLOPT_COOKIEFILE - файл, откуда читаются куки.
     *
     */
    function __construct()
    {
        $this->ch = curl_init();
        // https://htmlweb.ru/php/php_curl.php
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');

        // curl_setopt($this->ch, CURLOPT_COOKIEJAR, 'str');
        // curl_setopt($this->ch, CURLOPT_COOKIEFILE, 'str');

        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($this->ch, CURLOPT_TIMEOUT, 8);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 10);
    }

    function __destruct()
    {
        curl_close($this->ch);
    }

    /**
     * Отправка GET запроса
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function get($url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        return curl_exec($this->ch);
    }

    /**
     * Отправка POST запроса
     * @param  [type] $url  [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function post($url, $data)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
        return curl_exec($this->ch);
    }
}
