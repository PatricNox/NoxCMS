<?php

$title = 'YRGO';
if (NOXCMS_INSTALLED):
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="theme/template/NoxCMS/css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="theme/template/NoxCMS/css/style.css" type="text/css"/>
</head>
<body>

<?php
$content = $cms->query("SELECT * FROM post_body");
$links = $cms->query("SELECT * FROM routes WHERE route_id > 2");
require $_root._path('/theme/template/NoxCMS/setup.php');
endif;
