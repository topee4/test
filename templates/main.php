<div class="container-fluid my-5" id="content">
    <div class="row">

        <?php
            include "templates/navigation.php";
        ?>
        <div class="col-sm-8">
            <h1 class="p-3 bg-info text-light rounded shadow-sm">Случайный тест</h1>

            <div class="p-3 bg-white rounded shadow-sm">
                <h1 class="jq-rand-word ">
                    <!-- Generate a random word -->
                    <?php
                    //                    $conn = connection();
                    //                        $sql = 'SELECT name_id, name FROM `english_word` ORDER BY RAND()';
                    //                        $result = mysqli_query($conn, $sql);
                    //                        $row = mysqli_fetch_assoc($result);
                    //                        $word_name = $row['name'];
                    //                        $word_name_id = $row['name_id'];
                    //
                    //                        print_r($word_name);
                    //
                    //                    mysqli_close($conn);
                    $rand_eng_word = $db->query("SELECT id, eng_name FROM eng ORDER BY RAND() LIMIT 1");
                    print_r($rand_eng_word['eng_name']);
                    $word_name_id = $rand_eng_word['id'];
                    ?>
                </h1>

                <div class="col-sm">
                    <h1 class="text-right"><button type="button" id="jq-skip" class="btn btn-info">Пропустить</button></h1>
                </div>
            </div>

            <!-- Content -> Answers -->
            <div id="answers">
                <div class="row m-1 mt-5 pb-5 bg-white rounded shadow-sm">

                    <!-- Generate a random word -->
                    <?php
                    $answer = $db->query("SELECT rus_name FROM rus INNER JOIN eng ON eng.id = rus.eng_id WHERE eng.id = '$word_name_id'");
                    $false_answer = $db->queryAll("SELECT rus_name FROM rus WHERE rus.eng_id != '$word_name_id' ORDER BY RAND() LIMIT 3;");

                    $arr = array();
                    array_push($arr, $answer['rus_name']);
                    foreach ($false_answer as $elem)
                    {
                        array_push($arr, $elem);
                    }
                    shuffle($arr);

                    foreach ($arr as $item)
                    {
                        echo '<p class="jq-answer-wrap">
                                <p class="jq-answer col-sm text-center">
                                <button type="button" class="p-3 btn btn-outline-danger font-weight-bold">' . $item . '</button>
                                </p>
                            </p>';
                    }

                    //                    $conn = connection();
                    //                        $sql = 'SELECT * FROM `english_word` LEFT JOIN `english_word_translation` ON english_word_translation.id ='. $word_name_id;
                    //                        $result = mysqli_query($conn, $sql);
                    //                        $row = mysqli_fetch_assoc($result);
                    //
                    //                        $arr = array();
                    //                        array_push($arr, $row['name']);
                    //
                    //                        $sql = 'SELECT name FROM `english_word_translation` ORDER BY RAND() LIMIT 3';
                    //                        $result = mysqli_query($conn, $sql);
                    //                        while ( $row = mysqli_fetch_assoc($result) )
                    //                        {
                    //                            array_push($arr, $row['name']);
                    //                        }
                    //
                    //                        shuffle($arr);
                    //
                    //                        foreach ($arr as $item)
                    //                        {
                    //                            echo '<p class="col-sm text-center">
                    //                                <button type="button" class="btn btn-light">' . $item . '</button>
                    //                            </p>';
                    //                        }
                    ?>

                </div>

                <div class="p-3 bg-white rounded shadow-sm">
                    <div class="row text-center">
                        <div class="col-sm text-left">
                            <button type="button" class="btn btn-info p-2"><h4>Добавить в словарь</h4></button>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-white border-info pl-5 pr-5 p-2"><h4>Ответить</h4></button>
                        </div>
                        <div class="col-sm">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-2">

        </div>
    </div>



</div>
<div class="container my-5" id="content">





</div>