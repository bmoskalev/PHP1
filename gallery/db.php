<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 18.01.2019
 * Time: 0:04
 */

function execute($conn,$sql) {
    echo $sql;
    return mysqli_query($conn,$sql);
}

function queryAll($conn,$sql) {
    return mysqli_fetch_all(execute($conn,$sql), MYSQLI_ASSOC);
}

function queryOne($conn,$sql) {
    return mysqli_fetch_assoc(execute($conn,$sql));
}
