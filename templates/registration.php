<?php
    include "../templates/header.php";
    require "../core/connection.php";
if( isset($_POST['registration']) ){

    if( !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']) ){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $active = 1;

        if( $password == $password2 ){
            $result = $db->execute("INSERT INTO `user` (email, username, password, active) VALUES ('$email', '$username', '$password', '$active')");
            if( $result ){
                $success_msg = "Регситрация прошла успешно!";
            } else {
                $fail_msg = "Такой " . '<b>Email </b>' . "или " . '<b>Имя ползователя </b>' . "уже существует!" . '<br>' . "Попробуйте еще раз.";
            }
        } else {
            $fail_msg = "Пароли не совпадают";
        }
    } else {
        $fail_msg = "Заполните все поля!";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Links -->
    <!-- CSS files -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid border border-output-dark rounded" style="max-width: 350px; margin-top: 150px;">
    <div class="row">

        <!-- BACK -->
        <a href="/">
            <i class="p-4 fas fa-caret-left" style="font-size: 55px; color: #007BFF;"></i>
        </a>

        <div class="col-sm p-3">
            <form method="POST">
                <h2 class="">Регистрация</h2>

                <?php if( isset($success_msg) ){?><div class="alert alert-success" role="alert"><h5><?php echo $success_msg;?></h5>Вы можете вернуться на
                    <a href="/">главную страницу</a></div><?php }?>

                <?php if( isset($fail_msg) ){?><div class="alert alert-danger" role="alert"><?php echo $fail_msg;?></div><?php }?>


                <div class="form-group">
                    <label>Email адрес</label>
                    <input type="email" name="email" class="form-control" placeholder="Введите Email">
<!--                    <small id="emailHelp" class="form-text text-muted">Введите свой Email адрес </small>-->
                </div>

                <div class="form-group">
                    <label>Имя аккаунта</label>
                    <input type="text" name="username" class="form-control" placeholder="Введите имя аккаунта">
                </div>

                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                </div>

                <div class="form-group">
                    <label>Пароль еще раз</label>
                    <input type="password" name="password2" class="form-control" placeholder="Введите пароль">
                </div>

<!--                <div class="form-group form-check">-->
<!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--                    <label class="form-check-label" for="exampleCheck1">Запомнить</label>-->
<!--                </div>-->
                <button type="submit" class="btn btn-primary" name="registration">Зарегтистрироваться</button>

            </form>
        </div>
    </div>
</div>

<?php include "../templates/footer.php";?>