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
    <h1>User create page</h1>

    <form action="/user/create" method="POST">
        <label for="email_id">Email</label>
        <input type="email" name="email" id="email_id">

        <label for="password_id">Password</label>
        <input type="password" name="password" id="password_id">

        <label for="date_registered_id">Date registered</label>
        <input type="date" name="date_registered" id="date_registered_id">

        <input type="submit" name="submit" value="Submit user data">
    </form>
</body>
</html>