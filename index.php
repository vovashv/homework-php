<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "_styles.php"; ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<?php include "_navbar.php";
include_once "con_db.php";
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Аватар</th>
        <th scope="col">Ел. пошта</th>
        <th scope="col">Телефон</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sth = $dbh->prepare("SELECT Id, Email, Phone, Image FROM `tbl_users`");
    $sth->execute();

    while ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <tr>
            <th scope="row"><img src ="' . $result["Image"] . '" width="150"/></th>
            <td>' . $result["Email"] . '</td>
            <td>' . $result["Phone"] . '</td>
        </tr>
        ';
    }
    ?>
    </tbody>
</table>

<?php
include "_scripts.php";
?>
</body>
</html>