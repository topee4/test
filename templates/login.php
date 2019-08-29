<?php
session_start();

if( isset($_SESSION['session_username']) ){
    header("location:intropage.php");
}

if( isset($_POST['login']) ){

    if( !empty($_POST['email']) && !empty($_POST['password']) ){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        require "../core/connection.php";

        $result = $db->query("SELECT * FROM `user` WHERE user.email = '$email' AND user.password = '$password'");

        if( count($result) > 0 ){
            $_SESSION['session_username'] = $result['username'];
            $success_msg = "Авторизация прошла успешно!";
            header("location:/");
        } else {
            $fail_msg = "Введенный Вами " . '<b>Email </b>' . "или " . '<b>Пароль </b>' . "неправильный." . '<br>' . "Попробуйте еще раз!";
        }
    } else {
        $fail_msg = "Заполните все поля!";
    }
}
include "../templates/header.php";
?>
<div class="container-fluid border border-output-dark rounded" style="max-width: 350px; margin-top: 150px;">
    <div class="row">
        <a href="/">
            <i class="p-4 fas fa-caret-left" style="font-size: 55px; color: #007BFF;"></i>
        </a>
        <div class="col-sm p-3">
            <form method="POST">
                <h2 class="">Авторизация</h2>

                <?php if( isset($success_msg) ){?><div class="alert alert-success" role="alert"><h5><?php echo $success_msg;?></h5>Вы можете вернуться на
                    <a href="/">главную страницу</a></div><?php }?>

                <?php if( isset($fail_msg) ){?><div class="alert alert-danger" role="alert"><?php echo $fail_msg;?></div><?php }?>


                <div class="form-group">
                    <label>Email адрес</label>
                    <input type="email" name="email" class="form-control" placeholder="Введите Email">
                    <!--                    <small id="emailHelp" class="form-text text-muted">Введите свой Email адрес </small>-->
                </div>

               <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                </div>

                <!--                <div class="form-group form-check">-->
                <!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
                <!--                    <label class="form-check-label" for="exampleCheck1">Запомнить</label>-->
                <!--                </div>-->
                <button type="submit" class="btn btn-primary" name="login">Войти</button>

            </form>
        </div>
    </div>
</div>

<?php include "../templates/footer.php";?>
