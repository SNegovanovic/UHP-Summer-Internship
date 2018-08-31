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

  <table>
        <caption>Users</caption>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Date registered</th>
            <th>Actions</th>
        </tr>
      <?php foreach ($vars as $var): ?>
          <tr>
              <td><?php echo $var->getId() ?></td>
              <td><?php echo $var->getEmail(); ?></td>
              <td><?php echo $var->getDateRegistered(); ?></td>
              <td><a href="/user/delete?id=<?php echo $var->getId(); ?>">DELETE</a></td>
              <td><a href="/user/update?id=<?php echo $var->getId(); ?>">UPDATE</a></td>
          </tr>
      <?php endforeach; ?>
    </table>

</body>
</html>