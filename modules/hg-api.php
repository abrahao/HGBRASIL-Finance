<?php

class HG_API{
    private $key = null;
    private $error = false;

    function __construct($key = null)
    {
        if (!empty($key)) $this->key = $key;
    }
    function request($ednpoint = '', $params = array()){
        $uri = 'https://api.hgbrasil.com/' . $ednpoint . "?key=" . $this->key . "ed34dfdc&format=json";

        if (is_array($params)) {
            foreach ($params as $key => $value){
                if (empty($value)) continue;
                $uri .= $key . '=' . urlencode($value) . '&';
            }
            $uri = substr($uri, 0, -1);
            $response = @file_get_contents($uri);
            $this->error = false;
            return json_decode($response, true);
        }else{
            $this->error = true;
        }
    }
    function is_error(){
        return $this->error;
    }
    function dolar_quOtation(){
        $data = $this->request('finance/quotations');

        if(!empty($data) && is_array($data['results']['currencies']['USD'])){
            $this->error = false;
            return $data['results']['currencies']['USD'];
        }else {
            $this->error = true;
            return false;
        }
    }

    function euro_quOtation(){
        $data = $this->request('finance/quotations');

        if(!empty($data) && is_array($data['results']['currencies']['USD'])){
            $this->error = false;
            return $data['results']['currencies']['EUR'];
        }else {
            $this->error = true;
            return false;
        }
    }

}