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

<h1>Update form</h1><br>
<form method="POST" action="/authors/update?id=<?php echo $vars->getId();?>">

    <label for="first_name_id">First name</label>
    <input type="text" id="first_name_id" name="first_name" value="<?php echo $vars->getFirstName();?>">

    <label for="last_name_id">Last name</label>
    <input type="text" id="last_name_id" name="last_name"value="<?php echo $vars->getLastName();?>">

    <input type="submit" name="submit" value="Submit author data">
</form>

<!-- <form action="/authors/update?id=<?php // echo $_GET['id']; ?>" method="POST"> -->
</body>
</html>