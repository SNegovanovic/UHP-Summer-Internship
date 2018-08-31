<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h2>Author: <br> </h2>
    <p><?php echo "Id:" . $vars->getId(); ?></p>
    <p>Ime:<?php echo $vars->getFirstName();?></p>
    <p>Prezime:<?php echo $vars->getLastName();?></p>
</body>
</html>