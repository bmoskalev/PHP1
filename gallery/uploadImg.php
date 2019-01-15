<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 14.01.2019
 * Time: 23:35
 */
if ($_FILES['myfile']['type'] == "image/jpeg" || $_FILES['myfile']['type'] == "image/png"
    && $_FILES['myfile']['size'] < 10000000) {
    $tmp = $_FILES['myfile']['tmp_name'];
    $filePath = MAX . $_FILES['myfile']['name'];
    move_uploaded_file($tmp, $filePath);
}