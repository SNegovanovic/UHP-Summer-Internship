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

ok title is <?php echo $vars->getTitle(); ?></p>
<p>book author is <?php echo $vars->getAuthorObj()->getFirstName() . " razmak " . $vars->getAuthorObj()->getLastName(); ?></p>

    <h2>Lending dates: <br> </h2>
    <p>Id:<?php echo $vars->getId(); ?></p>
    <p>Book is : <?php echo $vars->getBookId(); ?></p>
    <p>Start date:<?php echo $vars->getStartDate();?></p>
    <p>End date:<?php echo $vars->getEndDate();?></p>
    <p>User : <?php echo $vars->getUserId(); ?></p>

</body>
</html>