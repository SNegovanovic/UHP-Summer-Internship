<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        table tr:nth-child(even) {
            background-color: #eee;
        }
        table tr:nth-child(odd) {
            background-color: #fff;
        }
        table th {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>

  <table>
        <caption>Genre</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
      <?php foreach ($vars as $var): ?>
          <tr>
              <td><?php echo $var->getId() ?></td>
              <td><?php echo $var->getName(); ?></td>
              <td><a href="/genre/delete?id=<?php echo $var->getId(); ?>">DELETE</a></td>
              <td><a href="/genre/update?id=<?php echo $var->getId(); ?>">UPDATE</a></td>
          </tr>
      <?php endforeach; ?>
    </table>

</body>
</html>