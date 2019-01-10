<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        .galleryWrapper__screen {
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #222;
            opacity: 0.8;
            position: fixed;
            top: 0;
            z-index: 100;
            display: block;
            text-align: center;
        }

        .galleryWrapper__image {
            max-height: 80%;
            max-width: 80%;
            z-index: 101;
            position: absolute;
            margin: auto;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
        }

        .galleryWrapper__close {
            z-index: 101;
            position: absolute;
            top: 0;
            right: 0;
        }

        .galleryWrapper__next {
            z-index: 101;
            position: absolute;
            top: 50%;
            right: 0;
        }

        .galleryWrapper__back {
            z-index: 101;
            position: absolute;
            top: 50%;
            left: 0;
        }

    </style>
</head>
<body>
<div class="galleryPreviewsContainer">
    <!--    <img src="images/min/1.jpg" data-full_image_url="images/max/1.jpg" alt="Картинка1">
        <img src="images/min/2.jpg" data-full_image_url="images/max/2.jpg" alt="Картинка2">
        <img src="images/min/3.jpg" data-full_image_url="images/max/3.jpg" alt="Картинка3">
        <img src="images/min/4.jpg" data-full_image_url="images/max/4.jpg" alt="Картинка4">-->
    <?php
    require "render.php";
    define("MIN","img/min/");
    define("MAX","img/max/");

    render(MIN,MAX);

    ?>
</div>
<!--
<div class="galleryWrapper">
  <img class="galleryWrapper__back" src="images/gallery/back.png" alt="Назад">
  <img class="galleryWrapper__next" src="images/gallery/next.png" alt="Вперед">
  <div class="galleryWrapper__screen"></div>
  <img class="galleryWrapper__close" src="images/gallery/close.png" alt="">
  <img class="galleryWrapper__image" src="images/max/1.jpg" alt="">
</div>
-->
<script src="gallery.js"></script>
<script>
    //$(document).ready(() => {
    //    // Лист отзывов
    //    let sheet = new Sheet('feedback.json');
    //
    //    // Добавление отзыва в список
    //    let $addBtn = $('.addBtn');
    //    $addBtn.click(() => {
    //        sheet.addFeedback();
    //    })
    //});
    // Инициализируем нашу галерею при загрузке страницы.
    window.onload = () => gallery.init({previewSelector: '.galleryPreviewsContainer'});</script>
</body>
</html>