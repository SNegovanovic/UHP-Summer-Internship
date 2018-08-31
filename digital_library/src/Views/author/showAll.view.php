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
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($vars as $var): ?>
            <tr>
                <td><?php echo $var->getId() ?></td>
                <td><?php echo $var->getFirstName(); ?></td>
                <td><?php echo $var->getLastName(); ?></td>
                <td><a href="/authors/delete?id=<?php echo $var->getId(); ?>">DELETE</a></td>
                <td><a href="/authors/update?id=<?php echo $var->getId()?>">UPDATE</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!--
    <table>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
        </tr>
        <?php // foreach ($vars as $var): ?>
            <tr>
                <td><?php // echo $var['id'] ?></td>
                <td><?php //echo $var['first_name'] ?></td>
                <td><?php // echo $var['last_name'] ?></td>
            </tr>
        <?php // endforeach; ?>
    </table>
    -->
    <!--
    <table>
        <caption>Authors</caption>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Second name</th>
        </tr>

        <? /*
            foreach ($vars as $var){
                echo "<tr>";
                echo "<td>" . $var->getId() . "</td>";
                echo "<td>" . $var->getFirstName() . "</td>";
                echo "<td>" . $var->getLastName() . "</td>";
                echo "</tr>";
            } */
        ?>
    </table>
    -->
</body>
</html>