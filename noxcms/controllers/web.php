<?php

$title = 'YRGO';
if (!NOXCMS_INSTALLED)
    return;
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="theme/template/noxcms/css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="theme/template/noxcms/css/style.css" type="text/css"/>
</head>
<body>

<?php
$content = $cms->query("SELECT * FROM post_body", "noxcms");
$links = $cms->query("SELECT * FROM routes WHERE route_id > 2", "noxcms");
require $_root._path('/theme/template/noxcms/setup.php');
