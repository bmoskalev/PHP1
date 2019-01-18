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
    $fileName = $_FILES['myfile']['name'];
    move_uploaded_file($tmp, MAX . $fileName);
    if (create_thumbnail(MAX . $fileName, MIN . $fileName, 200, 200)) {
        $file_size = filesize(MAX . $fileName);
        $conn = mysqli_connect(HOST, USER, PASS, DB);
        $bigPath = MAX;
        $smallPath = MIN;
        $query = "INSERT INTO images (bigPath, bigFileName, smallPath, smallFileName, bigFileSize) values ('$bigPath', '$fileName', '$smallPath', '$fileName', '$file_size')";
        execute($conn, $query);
        mysqli_close($conn);
    }
}