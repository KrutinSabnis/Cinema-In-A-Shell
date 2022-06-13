<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px
        }

        .wrapper {
            margin: auto;
            text-align: center;
            position: relative;
        }

        .scrolls {
            overflow-x: scroll;
            overflow-y: hidden;
            height: 250px;
            white-space: nowrap;
        }

        .mov {
            margin: 10px;
            width: 100px;
            display: inline-block;
            vertical-align: top;
        }

        .movietitle {
            height: 50px;
            width: 100px;
            white-space: normal;
            word-wrap: break-word;

        }
        .commentdiv{
            border: #eee solid 1px;
            padding-bottom: 0px !important;
            margin-bottom: 7px;
        }
        .commentdiv:hover {
            cursor: pointer;
        }
        .homebut:hover{
            cursor: pointer;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <span class="w3-bar-item w3-padding-large homebut" onclick="location='./index.php'">
            <i class="fas fa-film"></i> Cinema in a shell
            </span>

        </div>
    </div>
    <div class="container" style="margin-top:42px">
        <div class="main-body">
            <?php
            if (!isset($_GET['Username']) || empty($_GET['Username'])) {
                echo '<center><h2>User not found<h2></center>';
                exit;
            }
            ?>
            <div class="row gutters-sm">

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            include("database/conn.php");

                            $profile1 = '
                            <h4 class="w3-center">My Profile</h4>
                            <p class="w3-center"><img src="';
                            $profile2 = '" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                            <h4 class="w3-center">';
                            $profile3 = '</h4>
                            <hr>
                            <div class="w3-padding">
                                <p><i class="fas fa-coins fa-fw w3-margin-right w3-text-theme"></i>';
                            $profile4 = '    </p>
                                <p><i class="fa fa-venus-mars fa-fw w3-margin-right w3-text-theme"></i>';
                            $profile5 = '</p>
                                <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> ';
                            $profile6 = '</p>
                            </div>';

                            $Username = $_GET['Username'];
                            $sql = "SELECT * FROM users WHERE Username = '$Username'";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $icon = "";
                                if ($row['Gender'] == "Male") {
                                    $icon = 'https://www.w3schools.com/w3images/avatar2.png';
                                } else $icon = 'https://www.w3schools.com/w3images/avatar6.png';
                                $DateOfBirthTemp = "SELECT DateOfBirth FROM users WHERE Username = '$Username'";
                                $DateOfBirth = $conn->query($DateOfBirthTemp)->fetch_assoc();
                                $likes = 0;
                                $likesSql = "SELECT COUNT(*) FROM commentlike WHERE CommentId IN (
                                                SELECT CommentId FROM comment WHERE Username = '$Username')";
                                $likes = $conn->query($likesSql)->fetch_assoc();
                                $Coins = $likes["COUNT(*)"] * 10;


                                echo $profile1 . $icon . $profile2 . $Username . $profile3 . $Coins . $profile4 . $row['Gender'] . $profile5 . $row['DateOfBirth'] . $profile6 . "<br>";
                            } else {
                                echo "user not found ";
                            }

                            ?>

                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="card" style="margin-bottom:20px">
                        <div class="card-body ">
                            <h4>Liked Movies</h4>
                            <hr>
                            <div class="wrapper">
                                <div class="scrolls">
                                    <?php
                                    $likedMovieDataSql = "SELECT MovieName, Image, MovieId FROM movies WHERE MovieId IN (
                                        SELECT MovieId FROM movielike WHERE Username = '$Username')";
                                    $likedMovieData = $conn->query($likedMovieDataSql);
                                    $likeMovieCountSql = "SELECT count(*) as likes FROM movies WHERE MovieId IN (
                                        SELECT MovieId FROM movielike WHERE Username = '$Username')";
                                    $likeMovieCount =  $conn->query($likeMovieCountSql)->fetch_assoc()["likes"];
                                    while ($likedMovieDataRow = $likedMovieData->fetch_assoc()) {
                                        echo '<a href="movie.php?id=' . $likedMovieDataRow["MovieId"] . '" class="mov" style="color: black; text-decoration: none;">
                                        <img class="media-object" style="width:100px" src=" ' . $likedMovieDataRow["Image"] . '" alt="profile">
                                        <div class="movietitle">' . $likedMovieDataRow["MovieName"] . '</div>
                                        </a>';
                                    }
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4>Your Nutshells</h4>
                            <hr>
                            <?php
                            $commentSql = "SELECT * FROM comment WHERE Username = '$Username' ORDER BY CommentDate DESC";
                            $commentData = $conn->query($commentSql);
                            function dateDiff($commentDate)
                            {
                                $diff = (strtotime(date("Y-m-d")) - strtotime($commentDate)) / 60 / 60 / 24;

                                if ($diff == 0) {
                                    return 'today';
                                }
                                if ($diff == 1) {
                                    return 'yesterday';
                                }
                                if ($diff > 365) {
                                    return $diff / 365 . ' years ago';
                                }
                                if ($diff > 31) {
                                    return $diff / 31 . ' months ago';
                                } else return $diff . ' days ago';
                            };
                            for ($i = 0; $i < $commentData->num_rows; $i++) {
                                $commentRow = $commentData->fetch_assoc();
                                $commentDate = $commentRow["CommentDate"];
                                $MovieId = $commentRow['MovieId'];
                                $MovieNameSql = "SELECT MovieName FROM movies WHERE MovieId = '$MovieId'";
                                $MovieName = $conn->query($MovieNameSql)->fetch_assoc()['MovieName'];
                                //$MovieName = "abcdef";
                                $likeSql = "SELECT count(*) as likes FROM commentlike WHERE CommentId = '" . $commentRow["CommentId"] . "'"; 
                                $numberoflikes = $conn->query($likeSql)->fetch_assoc()["likes"];
                                $temp = '
                                <div class="w3-padding commentdiv" onclick="location=\'./movie.php?id=' . $commentRow["MovieId"] . '\'">
                                <div class="g-mb-15">
                                    <b>On '.$MovieName.'</b><br>
                                    <span class="g-color-gray-dark-v4 g-font-size-12">'.dateDiff($commentDate).'</span>
                                </div>

                                <p>'.$commentRow["Text"].'</p>

                                <ul class="list-inline d-sm-flex my-0">
                                    <li class="list-inline-item g-mr-20">
                                        <span class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>'.
                                            $numberoflikes
                                        .'</span>
                                    </li>
                                </ul>
                                </div>
                            ';
                            echo $temp;
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>