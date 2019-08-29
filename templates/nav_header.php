    <nav class="navbar navbar-expand-lg navbar-light color">
        <a class="navbar-brand mr-auto text-light" href="/">Тест онлайн</a>
        <?php

        if( isset($_SESSION['session_username']) ){
        ?>
            <span class="mr-2"><a class="text-dark position-absolute" style="top: 100px; left: 15px;">Добро пожаловать <b>
        <?php
            echo $_SESSION['session_username'];
        ?>
            </b></a></span>
            <a class="text-light" style="text-decoration: none;" href="profile"><div class="btn btn-dark border-light mr-2">Профиль</div></a>
            <a class="text-light" style="text-decoration: none;" href="templates/intropage.php"><div class="btn btn-dark">Выйти</div></a>
        <?php
        } else {
        ?>
            <a class="text-light" style="text-decoration: none;" href="templates/login.php"><div class="float-right btn btn-dark border-light mr-2">Войти</div></a>
          <a class="text-light" style="text-decoration: none;" href="templates/registration.php"><div class="float-right btn btn-dark border-light">Зарегистрироваться</div></a>
        <?php
        }
        ?>
    </nav>
    
    <nav class="navbar navbar-light bg-white shadow-sm">
        <a class="text-dark">Пополняй запас англисйких слов вместе с нами!</a>
    </nav>