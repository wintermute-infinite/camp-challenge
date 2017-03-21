<?php

class Model
{
    protected function getDataType($dataType)
    {
        $dataSrcPath = "/var/www/html/projects/campspot/inc/model/" . $dataType . "/";
        return $dataSrcPath;
    }
}

