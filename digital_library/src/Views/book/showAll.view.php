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
            width: 100%;
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
    <caption>All books</caption>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year published</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>

    <?php

    $lendingRepository = new \Repository\LendingRepository();

    foreach ($vars as $var): ?>
        <tr>
            <td><?php echo $var->getId() ?></td>
            <td><?php echo $var->getTitle(); ?></td>
            <td><?php echo $var->getAuthorObj()->getFirstName() . " " . $var->getAuthorObj()->getLastName(); ?></td>
            <td><?php echo $var->getYearPublished(); ?></td>
            <td>
                <?php echo $var->getGenreObj()->getName(); ?>
            </td>
            <td>
                <a href="/book/delete?id=<?php echo $var->getId(); ?>">DELETE</a><br>
                <a href="/book/update?id=<?php echo $var->getId(); ?>">UPDATE</a><br>
                <?php
                /** @var \Models\Lending $lending */
                $lending = $lendingRepository->getOneBy(array(
                    'book_id' => (int) $var->getId(),
                    'user_id' => (int) $_SESSION['userId'],
                    'end_date' => NULL
                ));

                //                var_dump($lending);

                if ($lending) {
                    if ($lending->getUserId() == $_SESSION['userId']) {
                        ?>
                        <a href="/lending/update?book_id=<?php echo $var->getId(); ?>">VRATI</a>
                        <?php
                    } else { ?>
                        <p>Ne mozes podici knjigu</p>
                        <?php
                    }
                }else {
                    ?>
                    <a href="/lending/create?book_id=<?php echo $var->getId(); ?>">POSUDI</a>
                    <?php
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>