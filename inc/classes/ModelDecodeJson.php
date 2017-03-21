<?php

include("/var/www/html/projects/campspot/inc/classes/ModelDecode.php");

class ModelDecodeJson extends Model implements ModelDecode
{
    private $file;

    public function __construct($file)
    {
        $this->setFile($file);
        $this->getFile();
    }

    public function getDataSrcPath()
    {
        $dataSrcPath = $this->getDataType("json");
        return $dataSrcPath;
    }

    public function returnRawData()
    {
        $file = $this->getFile();
        $dataSrcPath = $this->getDataSrcPath();
        $rawDataFile = $dataSrcPath . $file;
        $rawData = file_get_contents($rawDataFile);
        return $rawData;
    }

    public function returnDecodedData()
    {
        $rawData = $this->returnRawData();
        $decodedData = json_decode($rawData);
        return $decodedData;
    }

    private function setFile($file)
    {
        $this->file = $file;
    }

    private function getFile()
    {
        return $this->file;
    }
}