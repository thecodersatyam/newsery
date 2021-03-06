<?php
    require_once "dictionary.php";

    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $acceptLang = ['it', 'en']; 
    $lang = in_array($lang, $acceptLang) ? $lang : 'en';

    $dic = NULL;

    if($lang == 'it'){
        $dic = $it;
    } else {
        $temp = new Dictionary;
        $dic = $en;
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Other -->
        <title><?php print $it['title']; ?></title>
    </head>
    <body lang="<?php print $lang; ?>" style="background: #dcdde1">

        <!-- SLIDE OVERVIEW -->
        <div class="container installation_slide" id="first_slide">
            <div class="container">
                <h1><?php print $it['title_step_1']; ?></h1>
            </div>
            <hr>
            <div class="container">
                <p><?php print $it['content_step_1']; ?></p>
            </div>
            <div class="container">
                <button type="button" class="btn btn-primary"><?php print $it['next']; ?></button>
            </div>
        </div>

        <!-- SLIDE DB SETTINGS -->
        <div class="container installation_slide" id="second_slide">
            <div class="container">
                <h1><?php print $it['title_step_2']; ?></h1>
            </div>
            <hr>
            <div class="container" id="alert_space">
                <div class="alert alert-danger" role="alert" id="error_alert">
                    <?php print $it['db_connection_error']; ?>
                </div>
                <div class="alert alert-warning" role="alert" id="warning_alert">
                    <?php print $it['db_connection_testing']; ?>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-sm">
                        <p id="username_db">
                            <?php print $it['username']; ?>
                        </p>
                    </div>
                    <div class="col">
                        <p id="username_db">
                            <input type="text" id="username_field_db">
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <p id="username_db">
                            <?php print $it['password']; ?>
                        </p>
                    </div>
                    <div class="col">
                        <p id="username_db">
                            <input type="password" id="password_field_db">
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <p id="username_db">
                            <?php print $it['host']; ?>
                        </p>
                    </div>
                    <div class="col">
                        <p id="username_db">
                            <input type="text" id="host_field_db">
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <p id="username_db">
                            <?php print $it['db_name']; ?>
                        </p>
                    </div>
                    <div class="col">
                        <p id="username_db"><input type="text" id="db_name_field_db"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <p id="username_db">
                            <?php print $it['tbl_prefix']; ?>
                        </p>
                    </div>
                    <div class="col">
                        <p id="username_db"><input type="text" id="tbl_prefix_field_db" placeholder="news_"></p>
                    </div>
                </div>

                <div class="container">
                    <button type="button" class="btn btn-primary" id="check_db_btn">
                        <?php print $it['setup_db']; ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Installation Progressbar -->
        <div class="container installation_slide" id="fifth_slide">
            <div class="container">
                <h1><?php print $it['title_step_5']; ?></h1>
            </div>
            <hr>
            <div class="container">
                <div class="alert alert-info" role="alert">
                    <p><?php print $it['content_step_5']; ?></p>
                </div>
            </div>
            <div class="container progress_area">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 33%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">33%</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">0%</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>