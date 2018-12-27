<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 27.12.2018
 * Time: 10:18
 */
$menu = ["id" => "myMenuId",
    "class" => "myMenuClass",
    "items" => [
        ["href" => "/", "title" => "Home"],
        ["href" => "/blog", "title" => "Blog", "id" => "mySubMenuId", "class" => "mySubMenuClass", "items" => [
            ["href" => "/blog/new", "title" => "New"],
            ["href" => "/blog/popular", "title" => "Popular"],
            ["href" => "/blog/archive", "title" => "Archive"]
        ]],
        ["href" => "/service", "title" => "Service"]
    ]
];

function renderMenu($menu)
{
    $result = "<ul class=\"" . $menu["class"] . "\" id=\"" . $menu["id"] . "\">";
    foreach ($menu["items"] as $menuItem) {
        if (count($menuItem) == 2) {
            $result .= "<li><a href=\"" . $menuItem["href"] . "\">" . $menuItem["title"] . "</a></li>";
        } elseif (count($menuItem) == 5) {
            $result .= "<li><a href=\"" . $menuItem["href"] . "\">" . $menuItem["title"] . "</a>";
            unset($menuItem["href"]);
            unset($menuItem["id"]);
            $result .= renderMenu(array_slice($menuItem, 2));
            $result .= "</li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

echo renderMenu($menu);