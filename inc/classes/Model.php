<?php

class Model
{
// Gets the data type from classes implementing the ModelDecode interface. For now, it is just ModelDecodeJson
    protected function getDataType($dataType)
    {
// Builds the main path to the models data
        $dataSrcPath = "/var/www/html/projects/campspot/inc/model/" . $dataType . "/";
        return $dataSrcPath;
    }
}

