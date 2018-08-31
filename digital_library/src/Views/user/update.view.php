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
<form method="POST" action="/user/update?id=<?php echo $vars->getId();?>">

    <label for="email_id">Email</label>
    <input type="email" id="email_id" name="email" value="<?php echo $vars->getEmail();?>">

   <label for="date_registered_id">Date registered</label>
    <input type="date" name="date_registered" id="date_registered_id" value="<?php echo date("Y-m-d", strtotime($vars->getDateRegistered()));?>">

    <input type="submit" name="submit" value="Submit author data">
</form>
</body>
</html>