<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        body {
            margin-top: 20px;
            background: #eee;
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

        .main-div-forbut {
            position: relative;
        }

        .bottombut {
            position: absolute;
            bottom: 0;
        }

        .rounded-circle {
            padding: 0px !important;
            border-radius: 50% !important;
        }

        .mediaexcept {
            margin-top: 0px !important;
        }

        .rowexception {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }

        .colexcept {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .commentpfp:hover {
            cursor: pointer;
        }
        .commentbuts{
            margin-bottom: 10px;
        }
        .homebut:hover{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="w3-top">
        <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
            <span class="w3-bar-item w3-padding-large homebut" onclick="location='./index.php'">
            <i class="fas fa-film"></i> Cinema in a shell
            </span>

        </div>
    </div>
    <div class="container" style="margin-top:42px;padding-top:16px;">
        <div class="row">
            <?php
            include("database/conn.php");
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM movies WHERE MovieId = '$id'";
                $result = $conn->query($sql);
                $moviefound = false;
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $moviefound = true;
                } else {
                    // do curl thing to get movie info and set $row variable; i have movie id
                    include("envsetter.php");
                    $key =  getenv('imdbapikey');
                    $curl = curl_init();
                    //$firstletter = strtolower(substr($startswith, 0, 1));
                    $searchurl = "https://imdb-api.com/en/API/Title/$key/$id/";
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $searchurl);

                    $result = json_decode(curl_exec($ch), true);


                    if ($result['id'] == "null") {
                        $moviefound = false;
                    } else {
                        $moviefound = true;
                        $title = $result['title'];
                        $year = $result['year'];
                        $releaseDate = $result['releaseDate'];
                        $cast = $result['stars'];
                        $directors = $result['directors'];
                        $image = $result['image'];
                        $plot = str_replace("'", "\'", $result['plot']);

                        $sql = "INSERT INTO movies
                    VALUES ('$id', '$title', '$year', '$releaseDate', '$cast', '$directors', '$image', '$plot')";
                        //$result['id'], $result['title'],$result['year'],$result['releaseDate'],$result['stars'],$result['directors'],$result['image'],$result['plot']
                        $result = $conn->query($sql);
                        $sql = "SELECT * FROM movies WHERE MovieId = '$id'";
                        $result = $conn->query($sql);
                        $moviefound = false;

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $moviefound = true;
                        }
                    }
                }
                if ($moviefound) {
                    $sql = "SELECT count(*) as likes FROM movielike WHERE MovieId = '" . $row["MovieId"] . "'";
                    $numberoflikes = $conn->query($sql)->fetch_assoc()["likes"];
                    $likedisab = "disabled";
                    $username = "";
                    $likedbyuser = "";
                    $likedclassadd = "";
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $sql = "SELECT count(*) as likedby FROM movielike 
                      WHERE MovieId = '" . $row["MovieId"] . "' AND Username = '" . $_SESSION["username"] . "'";
                        $likedbyuser = $conn->query($sql)->fetch_assoc()["likedby"] == 1;
                        $likedisab = "";
                        if ($likedbyuser) {
                            $likedclassadd = "w3-theme-d2";
                        }
                    }
                    if ($numberoflikes == 0) {
                        $numberoflikes = "";
                    }

                    $movieData = '
                    <div class="col-md-12">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15 main-div-forbut" style="overflow: auto;">
                                <img src="' . $row["Image"] . '" alt="poster" class="w3-left w3-margin-right" style="width:200px">
                                <h3 style="margin-top: 0px;">' . $row["MovieName"] . '</h3>
                                <h5><b>Release Date:</b> ' . $row["ReleaseDate"] . '<br></h5>
                                <h5><b>Directors:</b> ' . $row["Directors"] . '<br></h5>
                                <h5><b>Casts:</b> ' . $row["Casts"] . '<br></h5>
                                <h5><b>Description:</b> ' . $row["Description"] . '<br></h5>
                                <button type="button" style="margin-bottom: 0px !important;" Username="' . $username . '" MovieId="' . $row["MovieId"] . '" liked="' . $likedbyuser . '" 
                                class="ajaxbutton w3-button bottombut w3-margin-bottom ' . $likedclassadd . ' w3-margin-bottom" ' . $likedisab . '>
          <i class="fa fa-thumbs-up"></i> <span id="' . $row["MovieId"] . '">' . $numberoflikes . '</span> Likes</button>
                            </div>
                        </div>
                    </div>
                    ';
                    echo $movieData;

                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        $icon = "";
                        if ($_SESSION["gender"] == "Male") {
                            $icon = "https://www.w3schools.com/w3images/avatar2.png";
                        } else {
                            $icon = "https://www.w3schools.com/w3images/avatar6.png";
                        }
                        $commentadd = '
                        <div class="col-md-12">
                            <h3></h3>
                            <div class="row rowexception gutters-sm">
                                <div class="col-md-1">
                                <center><img class="d-flex rounded-circle " height="36px" src="' . $icon . '" alt="Image Description"></center>
                                </div>
                                
                                <div class="col-md-9 colexcept">
                                    <input type="text" id="addcomment" class=" vcenter form-control mr-3" style="height: 36px !important;" placeholder="Enter Nutshell">
                                </div>
                                <div class="col-md-2">
                                    <center><button type="button" MovieId="' . $id . '" class="ajaxbuttonaddcom vcenter w3-button w3-theme-d1 w3-margin-bottom" style="margin-bottom:0px !important;width: 90% !important;">Add Nutshell</button></center>
                                </div>
                            </div>
                        </div>
                        ';
                        echo $commentadd;
                    }

                    //first we take a particular movie - $id
                    //then we go to comment table and find all comments where movieid = what we have
                    //then go to commentlike table and calculate total commentlikes
                    //where commentid = that particular comment
                    //SELECT * FROM comment C WHERE MovieId = '$id' ORDER BY IN (
                    //SELECT count(*) as likes FROM commentlike WHERE CommentId = C.CommentId)
                    $sql = "SELECT *,(SELECT count(*) FROM commentlike WHERE CommentId = comment.CommentId)
                     as likes FROM comment WHERE MovieId = '$id' ORDER BY (Username = '$username' ) DESC, likes DESC";
                    $result = $conn->query($sql);
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
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row = $result->fetch_assoc();
                        $usn = $row["Username"];
                        $tsql = "SELECT * FROM users WHERE Username = '$usn'";
                        $candeletecom = "";
                        if (isset($_SESSION['username']) && $usn == $_SESSION['username']) {
                            $candeletecom = '<button type="button" id="d'.$row["CommentId"].'" class="ajaxbuttondeletecom btn-danger w3-button">Delete</button>
                            <button type="button" id="u'.$row["CommentId"].'" class="ajaxbuttonupdatecom btn-success w3-button">Edit</button>
                            ';
                        }
                        $tuser = $conn->query($tsql)->fetch_assoc();
                        $icon = "";
                        if ($tuser["Gender"] == "Male") {
                            $icon = "https://www.w3schools.com/w3images/avatar2.png";
                        } else {
                            $icon = "https://www.w3schools.com/w3images/avatar6.png";
                        }
                        $commentDate = $row["CommentDate"];

                        $numberoflikes = $row["likes"];
                        $likedisab = "disabled";
                        $username = "";
                        $likedbyuser = "";
                        $likedclassadd = "";
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            $sql = "SELECT count(*) as likedby FROM commentlike 
                      WHERE CommentId = '" . $row["CommentId"] . "' AND Username = '" . $_SESSION["username"] . "'";
                            $likedbyuser = $conn->query($sql)->fetch_assoc()["likedby"] == 1;
                            $likedisab = "";
                            if ($likedbyuser) {
                                $likedclassadd = "w3-theme-d2";
                            }
                        }
                        if ($numberoflikes == 0) {
                            $numberoflikes = "";
                        }
                        $commentsec = '
                        <div class="col-md-12" style="margin-top: 16px;">
                            <div class="row rowexception gutters-sm">
                                <div class="col-md-1">
                                
                                <center><img class="commentpfp rounded-circle " height="36px" src="' . $icon . '" alt="Image Description" onclick="location=\'./profile.php?Username=' . $usn . '\'" class="w3-bar-item w3-button"></center>
                                    
                                </div>
                                <div class="col-md-11 media g-bg-secondary mediaexcept">
                                    <div class="g-mb-15">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0">' . $row["Username"] . '</h5>
                                        <span class="g-color-gray-dark-v4 g-font-size-12">' . dateDiff($commentDate) . '</span>
                                    </div>

                                    <p id='.$id.$row["CommentId"].'>' . $row["Text"] . '</p>

                                    <div class="commentbuts">
                                        <button type="button" style="margin-bottom: 0px !important;" CommentId="' . $row["CommentId"] . '" liked="' . $likedbyuser . '" 
                                        class="ajaxbuttoncomment w3-button ' . $likedclassadd . '" ' . $likedisab . '>
                  <i class="fa fa-thumbs-up"></i> <span id="' . $row["CommentId"] . '">' . $numberoflikes . '</span> Likes</button>
                  '.$candeletecom.'</div>
                                </div>
                            </div>
                        </div>';
                        echo $commentsec;
                    }
                } else {
                    echo '<center><h2>movie not found<h2></center>';
                }
            } else {
                echo '<center><h2>movie not found<h2></center>';
            }

            ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.ajaxbuttondeletecom').click(function() {
                var CommentId = $(this).attr("id").substring(1);
                var ajaxurl = 'api/ajaxmovie.php',
                    data = {
                        'action': "deletecomment",
                        'CommentId': CommentId,
                    };
                $.post(ajaxurl, data, function(response) {
                    location.reload();
                });
            })
            $('.ajaxbuttonupdatecom').click(function() {
                var CommentId = $(this).attr("id").substring(1);
                let searchParams = new URLSearchParams(window.location.search)
                var Comment = $('#' + searchParams.get('id') + CommentId).text();
                Comment = prompt("Please enter edited nutshell",Comment );
                var ajaxurl = 'api/ajaxmovie.php',
                    data = {
                        'action': "editcomment",
                        'CommentId': CommentId,
                        'Comment': Comment,
                    };
                $.post(ajaxurl, data, function(response) {
                    location.reload();
                });
            })
            
            $('.ajaxbuttonaddcom').click(function() {
                var comment = $('#addcomment').val();
                if (comment == "") {
                    return;
                }
                var MovieId = $(this).attr('MovieId');
                var Username = "<?php echo $_SESSION['username']; ?>";
                var ajaxurl = 'api/ajaxmovie.php',
                    data = {
                        'action': "addcomment",
                        'comment': comment,
                        'MovieId': MovieId,
                        'Username': Username
                    };
                $.post(ajaxurl, data, function(response) {
                    location.reload();
                });
            })
            $('.ajaxbutton').click(function() {
                var clickBtnValue = $(this).attr("liked");
                var Username = "<?php echo $_SESSION['username']; ?>";
                var MovieId = $(this).attr("MovieId");
                if (clickBtnValue) {
                    clickBtnValue = "unlike"
                    $(this).removeClass("w3-theme-d2");
                    $(this).attr("liked", "");
                    let numoflikes = $("#" + MovieId).html();
                    numoflikes = parseInt(numoflikes) - 1;
                    if (numoflikes == 0) {
                        numoflikes = "";
                    }
                    $("#" + MovieId).html(numoflikes);
                } else {
                    clickBtnValue = "like"
                    $(this).addClass("w3-theme-d2");
                    $(this).attr("liked", 1);
                    let numoflikes = $("#" + MovieId).html();
                    if (numoflikes == "") {
                        numoflikes = 0;
                    } else {
                        numoflikes = parseInt(numoflikes);
                    }
                    $("#" + MovieId).html(numoflikes + 1);
                }
                var ajaxurl = 'api/ajaxmovie.php',
                    data = {
                        'action': clickBtnValue,
                        'Username': Username,
                        'MovieId': MovieId
                    };
                $.post(ajaxurl, data, function(response) {
                    console.log(response);
                });
            });
            $('.ajaxbuttoncomment').click(function() {
                var clickBtnValue = $(this).attr("liked");
                var Username = "<?php echo $_SESSION['username']; ?>";
                var CommentId = $(this).attr("CommentId");
                if (clickBtnValue) {
                    clickBtnValue = "unlike"
                    $(this).removeClass("w3-theme-d2");
                    $(this).attr("liked", "");
                    let numoflikes = $("#" + CommentId).html();
                    numoflikes = parseInt(numoflikes) - 1;
                    if (numoflikes == 0) {
                        numoflikes = "";
                    }
                    $("#" + CommentId).html(numoflikes);
                } else {
                    clickBtnValue = "like"
                    $(this).addClass("w3-theme-d2");
                    $(this).attr("liked", 1);
                    let numoflikes = $("#" + CommentId).html();
                    if (numoflikes == "") {
                        numoflikes = 0;
                    } else {
                        numoflikes = parseInt(numoflikes);
                    }
                    $("#" + CommentId).html(numoflikes + 1);
                }
                var ajaxurl = 'api/ajaxcomment.php',
                    data = {
                        'action': clickBtnValue,
                        'Username': Username,
                        'CommentId': CommentId
                    };
                $.post(ajaxurl, data, function(response) {
                    console.log(response);
                });
            });
        });
    </script>
</body>

</html>