<div class="container-fluid my-5" id="content">
    <div class="row">

        <?php
            include "templates/navigation.php";
        ?>

        <div class="col-sm-8">
            <h1 class="p-3 bg-info text-light rounded shadow-sm">Профиль</h1>
            <?php
            if ( isset($_SESSION['session_username']) )
            {
            ?>
            <!-- Content -> Answers -->
            <div class="mt-5 p-3 bg-white rounded shadow-sm">

                <div class="col-sm">
                    <h2>Личные данные:</h2>
                </div>

            </div>

            <div class="mt-4">

                <?php
                if( isset($_SESSION['session_username']) )
                {
                    $username = $_SESSION['session_username'];
                    $words_arr = $db->query("SELECT word_name FROM user_vocabulary JOIN user ON user.id = user_vocabulary.user_id WHERE user.username = '$username'");

                    $words_arr = $words_arr['word_name'];
                    $words_arr = explode( ",", $words_arr);

                    $user_data = $db->query("SELECT * FROM user WHERE username = '$username'");

                    echo '<div class="row mt-1 pl-2 pr-2">

            <div class="col-sm-2 m-1 p-4 bg-white rounded shadow-sm">
                <h4><span class="align-middle">Username:</span></h4>
            </div>

            <div class="col-sm m-1 p-2 bg-white rounded shadow-sm">
                <h4><input class="p-4 align-middle" value="' . $user_data['username'] . '"></h4>
            </div>

            <div class="col-sm-2 m-1 bg-white rounded shadow-sm text-center">
                <h1><span class="align-middle"><i class="fas fa-pen-square text-primary"></i></span><h5>изменить</h5></></h1>
            </div>

        </div>
        <div class="row mt-1 pl-2 pr-2">

            <div class="col-sm-2 m-1 p-4 bg-white rounded shadow-sm">
                <h4><span class="align-middle">Email:</span></h4>
            </div>

            <div class="col-sm m-1 p-2 bg-white rounded shadow-sm">
                <h4><input class="p-4 align-middle" value="' . $user_data['email'] . '"></h4>
            </div>

            <div class="col-sm-2 m-1 bg-white rounded shadow-sm text-center">
                <h1><span class="align-middle"><i class="fas fa-pen-square text-primary"></i></span><h5>изменить</h5></></h1>
            </div>

        </div>

        ';
                }
                }

                ?>

            </div>
            <div class="m-1 row mt-5 p-3 bg-white rounded shadow-sm">

                <div class="col-sm-2 ml-auto text-right">
                    <a href=""><button class="btn btn-primary">Сохранить</button></a>
                </div>

                <div class="col-sm-1 text-right">
                    <a href="/"><button class="btn btn-light border-dark">Отмена</button></a>
                </div>

            </div>
        </div>


        <div class="col-sm-2">

        </div>
    </div>



</div>