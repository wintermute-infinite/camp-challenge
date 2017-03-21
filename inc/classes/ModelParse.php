<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelDecodeJson.php");

class ModelParse extends Model
{
    private $decodedData;

    public function __construct($file)
    {
        $this->setDecodedData($file);
    }
// Parses php data from decoded file from ModelDecodeJson class. The intention behind this was to allow expandability of parsing different data sources/types
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