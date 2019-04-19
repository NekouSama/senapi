<?php
namespace App\SenapiClass;

class CurlClass
{
    private $_url;

    public function __construct($url)
    {
        $this->_url = $url;
    }

    public function cURL_download_page()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($ch);
        if ($output === FALSE) {
            var_dump("cURL Error: " . curl_error($ch));
        }
        curl_close($ch);
        return $output;
    }
}
