<div class="container my-5" id="content">

    <div class="row p-3 bg-info text-light rounded shadow-sm">
        <a href="profile" style="text-decoration: none;"><h1 class="text-light">Профиль</h1></a>
        <h1>-></h1>
        <h1 style="text-decoration: underline;">Словарь</h1>
    </div>
<?php
    if ( isset($_SESSION['session_username']) )
{
    ?>
    <!-- Content -> Answers -->
    <div class="row mt-5 p-3 bg-white rounded shadow-sm">

        <div class="col-sm">
            <h2>Список слов:</h2>
            <h6>English -> Русский</h6>
        </div>
        <div class="col-sm-2 text-center shadow-sm">
            <h1><span class="align-middle"><i class="fas fa-plus-circle text-success"></i></span><span class="align-bottom"><h5 class="text-success">добавить</h5></span></h1>
        </div>

    </div>

    <div class="mt-4">

        <?php
            $username = $_SESSION['session_username'];
            $words_arr = $db->query("SELECT word_name FROM user_vocabulary JOIN user ON user.id = user_vocabulary.user_id WHERE user.username = '$username'");

            $words_arr = $words_arr['word_name'];
            $words_arr = explode( ",", $words_arr);

            $num = 0;
            foreach ($words_arr as $item)
            {
                $word = $db->query("SELECT eng.eng_name, rus.rus_name FROM eng INNER JOIN rus ON rus.eng_id = eng.id WHERE eng.eng_name = '$item'");
                if($word['eng_name'] == $item) {
                    $num++;
                    echo '<div class="row mt-1 pl-2 pr-2">

            <div class="col-sm-1 m-1 p-4 bg-white rounded shadow-sm text-center">
                <h4><span class="align-middle">' . $num . '</span></h4>
            </div>

            <div class="col-sm m-1 p-4 bg-white rounded shadow-sm">
                <h4><span class="align-middle">' . $word['eng_name'] . '</span></h4>
            </div>

            <div class="col-sm m-1 p-4 bg-white rounded shadow-sm">
                <h4><span class="align-middle">' . $word['rus_name'] . '</span></h4>
            </div>

            <div class="col-sm-2 m-1 bg-white rounded shadow-sm text-center">
                <h1><span class="align-middle"><i class="fas fa-minus-circle text-danger"></i></span><h5 class="text-danger">удалить</h5></></h1>
            </div>

        </div>';
                }
            }
        }

        ?>

    </div>


</div>