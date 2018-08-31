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
    <h1>Lending create page</h1>

    <form action="/lending/create" method="POST">

        <label for="book_id">Book</label>
        <input type="text" id="book_id" name="book" placeholder="Book">

        <label for="start_date_id">Start date</label>
        <input type="date" name="start_date" id="start_date_id">

        <label for="end_date_id">End date</label>
        <input type="date" name="end_date" id="end_date_id">

        <label for="user_id">User</label>
        <input type="text" id="user_id" name="user" placeholder="User">

        <input type="submit" name="submit" value="Submit lending data">
    </form>
</body>
</html>