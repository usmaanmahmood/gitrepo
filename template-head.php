<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 16/11/14
 * Time: 18:00
 */
include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/lumen/bootstrap.min.css" rel="stylesheet">-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        var themes = {
            "default": "//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css",
            "amelia": "//bootswatch.com/amelia/bootstrap.min.css",
            "cerulean": "//bootswatch.com/cerulean/bootstrap.min.css",
            "cosmo": "//bootswatch.com/cosmo/bootstrap.min.css",
            "cyborg": "//bootswatch.com/cyborg/bootstrap.min.css",
            "flatly": "//bootswatch.com/flatly/bootstrap.min.css",
            "journal": "//bootswatch.com/journal/bootstrap.min.css",
            "readable": "//bootswatch.com/readable/bootstrap.min.css",
            "simplex": "//bootswatch.com/simplex/bootstrap.min.css",
            "slate": "//bootswatch.com/slate/bootstrap.min.css",
            "spacelab": "//bootswatch.com/spacelab/bootstrap.min.css",
            "united": "//bootswatch.com/united/bootstrap.min.css"
        };
        $(function () {
            var themesheet = $('<link href="' + themes['default'] + '" rel="stylesheet" />');
            themesheet.appendTo('head');
            $('.theme-link').click(function () {
                var themeurl = themes[$(this).attr('data-theme')];
                themesheet.attr('href', themeurl);
            });
        });</script>