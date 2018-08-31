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
    <h2>Book: <br> </h2>
    <p>book title is <?php echo $vars->getTitle(); ?></p>
    <p>book was published on <?php echo $vars->getYearPublished(); ?></p>
    <p>book genre is <?php echo $vars->getGenreObj()->getName();?></p>
    <p>book author is <?php echo $vars->getAuthorObj()->getFirstName() . " " . $vars->getAuthorObj()->getLastName(); ?></p>

</body>
</html>