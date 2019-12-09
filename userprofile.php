<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "_styles.php"; ?>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
include_once "con_db.php";
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <?php
                        $sth = $dbh->prepare("SELECT Id, Image FROM `tbl_users`");
                        $sth->execute();
                        echo '
                        <img src="' . $_SESSION['userimage'] . '" class="img-rounded img-responsive"/>
                         ';
                        ?>

                    </div>
                    <div class="col-sm-6 col-md-8">
                        <?php
                        $sth = $dbh->prepare("SELECT Id, Email, Password, Image, Phone FROM `tbl_users`");
                        $sth->execute();
                        echo '
                                <h4>Вітаємо, ' . $_SESSION['useremail'] . '</h4>
                              <p>
                            <i class="glyphicon glyphicon-envelope"></i><span> ' . $_SESSION['useremail'] . '</span>
                            <br />
                            <i class="glyphicon glyphicon-lock"></i> ' . $_SESSION['userpassword'] . '
                            <br />
                            <i class="glyphicon glyphicon-phone-alt"></i> ' . $_SESSION['userphone'] . '
                            <br />
                            <i class="glyphicon glyphicon-picture"></i> ' . $_SESSION['userimage'] . '</p>
        ';
                        ?>

                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social
                            </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="https://github.com/sv-dubov">Github</a></li>
                            </ul>
                            <a href='logout.php' class='btn btn-lg btn-primary'>Вийти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
