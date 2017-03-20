<?php
/**
 * Created by PhpStorm.
 * User: n0cturn3
 * Date: 3/18/17
 * Time: 10:06 AM
 */

include("/var/www/html/projects/campspot/inc/classes/Model.php");


interface ModelDecode
{
    public function getDataSrcPath();
    public function returnRawData();
    public function returnDecodedData();
}