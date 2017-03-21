<?php

include("/var/www/html/projects/campspot/inc/classes/ModelDecode.php");

class ModelDecodeJson extends Model implements ModelDecode
{
    private $file;
// Sets source file when member object is instantiated, as seen in index.php
    public function __construct($file)
    {
        $this->setFile($file);
        $this->getFile();
    }
// Added in anticipation of future improvements where other directories contain different types of data
    public function getDataSrcPath()
    {
        $dataSrcPath = $this->getDataType("json");
        return $dataSrcPath;
    }
// Returns raw json data
    public function returnRawData()
    {
        $file = $this->getFile();
        $dataSrcPath = $this->getDataSrcPath();
        $rawDataFile = $dataSrcPath . $file;
        $rawData = file_get_contents($rawDataFile);
        return $rawData;
    }
// Decodes Json and returns decoded data in PHP notation
    public function returnDecodedData()
    {
        $rawData = $this->returnRawData();
        $decodedData = json_decode($rawData);
        return $decodedData;
    }
// Main setters and getters
    private function setFile($file)
    {
        $this->file = $file;
    }

    private function getFile()
    {
        return $this->file;
    }
}