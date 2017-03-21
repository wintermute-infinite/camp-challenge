<?php

include("/var/www/html/projects/campspot/inc/classes/Model.php");

interface ModelDecode
{
// Created as a personal exercise and in preparation for a hypothetical expansion of ModelDecode child classes for decoding other forms of data
    public function getDataSrcPath();
    public function returnRawData();
    public function returnDecodedData();
}