<?php
/**
 * Created by PhpStorm.
 * Licesne: GPL3
 * User: mikey
 * Date: 12/12/18
 * Time: 3:40 PM
 */

if (!isset($page_title)) { $page_title = 'Tools Site'; }
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="garys tools, tools contact, bradenton tool sale">
    <meta name="description" content="Garys tools, retired bodyman selling his body tools locally in bradenton fl.">
    <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for(node_module('public/css/main.css')); ?>">

    <title><?php echo $page_title; ?></title>
</head>
<body>