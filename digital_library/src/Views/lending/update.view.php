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
<form action="/lending/update?id=<?php echo $vars->getId(); ?>" method="post">

    <label for="book_id">Book</label>
    <input type="text" id="book_id" name="book" placeholder="Book" value="<?php echo $vars->getBookId(); ?>">

    <label for="start_date_id">Start date</label>
    <input type="date" id="start_date_id" name="start_date" placeholder="Start date" value="<?php echo date("Y-m-d", strtotime($vars->getStartDate())); ?>">

    <label for="end_date_id">End date</label>
    <input type="date" id="end_date_id" name="end_date" placeholder="End date" value="<?php echo date("Y-m-d", strtotime($vars->getEndDate())); ?>">

    <label for="user_id">User</label>
    <input type="text" id="user_id" name="user" placeholder="User" value="<?php echo $vars->getUserId(); ?>">

    <input type="submit" name="submit" value="Submit lending data">
</form>

</body>
</html>