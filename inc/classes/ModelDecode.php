<?php

include("/var/www/html/projects/campspot/inc/classes/Model.php");

interface ModelDecode
{
    public function getDataSrcPath();
    public function returnRawData();
    public function returnDecodedData();
}