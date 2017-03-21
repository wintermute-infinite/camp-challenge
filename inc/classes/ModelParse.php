<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelDecodeJson.php");

class ModelParse extends Model
{
    private $decodedData;

    public function __construct($file)
    {
        $this->setDecodedData($file);
    }

    public function setDecodedData($file)
    {
        $dataObj = new ModelDecodeJson($file);
        $decodedData = $dataObj->returnDecodedData();
        $this->decodedData = $decodedData;
    }

    public function getDecodedData()
    {
        return $this->decodedData;
    }
}