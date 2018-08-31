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
        <caption>Lending dates</caption>
        <tr>
            <th>ID</th>
            <th>Book ID</th>
            <th>Start date</th>
            <th>End date</th>
            <th>User ID</th>
            <th>Actions</th>
        </tr>
       <?php foreach ($vars as $var): ?>
           <tr>
               <td><?php echo $var->getId() ?></td>
               <td><?php echo $var->getBookId(); ?></td>
               <td><?php echo $var->getStartDate(); ?></td>
               <td><?php echo $var->getEndDate(); ?></td>
               <td><?php echo $var->getUserId(); ?></td>
               <td><a href="/lending/delete?id=<?php echo $var->getId(); ?>">DELETE</a></td>
               <td><a href="/lending/update?id=<?php echo $var->getId();?>">UPDATE</a></td>
           </tr>
       <?php endforeach; ?>
    </table>

</body>
</html>