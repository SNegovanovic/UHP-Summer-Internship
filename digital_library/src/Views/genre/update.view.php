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
<form method="post" action="/genre/update?id=<?php echo $vars->getId(); ?>">
    <label for="name_id">Name</label>
    <input type="text" id="name_id" name="name" placeholder="Name" value="<?php echo $vars->getName(); ?>">

    <input type="submit" name="submit" value="Submit genre data">
</form>
</body>
</html>