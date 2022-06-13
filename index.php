<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema in a Nutshell</title>
  <link rel="icon" type="image/png" href="assets/favicon.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: "Open Sans", sans-serif
    }

    .w3buttononlyoutline {
      border: 5px sold #4d636f !important;
      background-color: transparent !important;
    }
  </style>
</head>

<body class="w3-theme-l5">

  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
      <span class="w3-bar-item w3-padding-large">
        <i class="fas fa-film"></i> Cinema in a shell</span>
      <div class="w3-right" style="float: left;">
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          $icon = "";
          if ($_SESSION["gender"] == "Male") {
            $icon = "https://www.w3schools.com/w3images/avatar2.png";
          } else {
            $icon = "https://www.w3schools.com/w3images/avatar6.png";
          }
          echo '<div class="w3-dropdown-hover" style="background-color:rgba(0,0,0,0)">
          <button class="w3-button w3-padding-large" style="min-width:150px;color:#fff" title="Notifications">
            <img src="' . $icon . '" class="w3-circle" style="height:23px;width:23px" alt="Avatar">
            ' . $username . ' </button>
          <div class="w3-dropdown-content w3-card-4 w3-bar-block">
            <button  onclick="location=\'./profile.php?Username=' . $username . '\'" class="w3-bar-item w3-button">profile</button>
            <button onclick="location=\'./logout.php\'" class="w3-bar-item w3-button">logout</button>
          </div>
        </div>';
        } else {
          echo '<button class=" w3-button w3-padding-large w3-right" onclick="location=\'./login.php\'" title="My Account" style="min-width:100px">
          Login
        </button>
          <button class=" w3-button w3-padding-large w3-right" onclick="location=\'./signup.php\'" title="My Account" style="min-width:100px">
          Sign up
          </button>
        ';
        }
        ?>
      </div>
    </div>
  </div>


  <div class="container" style="max-width:1400px;margin-top:60px">
    <div class="row">
      <div style="float: right;margin-right:20px">
        <form action="search.php" method="get" class="input-group" style="display: flex;">
          <input style="z-index: 0 !important;" type="search" placeholder="Search" style="flex: 5;" id="form1" name="nameq" class="form-control" />
          <button type="submit" style="flex:1" class="btn btn-primary w3-theme-d2">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="row justify-content-center">

      <div class="col-8">
        <?php
        include("database/conn.php");
        $sql = "SELECT *,(SELECT count(*) FROM movielike WHERE MovieId = movies.MovieId) as likes FROM movies ORDER BY likes DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
          $numberoflikes = $row["likes"];
          $likedisab = "disabled";
          $username = "";
          $likedbyuser = "";
          $likedclassadd = "";
          if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $sql = "SELECT count(*) as likedby FROM movielike WHERE MovieId = '" . $row["MovieId"] . "' AND Username = '" . $_SESSION["username"] . "'";
            $likedbyuser = $conn->query($sql)->fetch_assoc()["likedby"] == 1;
            $likedisab = "";
            if ($likedbyuser) {
              $likedclassadd = "w3-theme-d2";
            }
          }
          if ($numberoflikes == 0) {
            $numberoflikes = "";
          }
          
          $movie = '
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <img src="' . $row["Image"] . '" alt="poster" class="w3-left w3-margin-right" style="width:60px">
          <!--  <span class="w3-right w3-opacity">1 min</span> -->
          <h4>' . $row["MovieName"] . '</h4>
          <p>' . substr($row["Description"], 0, min(400, strlen($row["Description"]))) . '...</p>
          <button type="button" Username="' . $username . '" MovieId="' . $row["MovieId"] . '" liked="' . $likedbyuser . '" class="ajaxbutton w3-button ' . $likedclassadd . ' w3-margin-bottom" ' . $likedisab . '>
          <i class="fa fa-thumbs-up"></i> <span id="' . $row["MovieId"] . '">' . $numberoflikes . '</span> Likes</button>
          <button type="button" onclick="location=\'./movie.php?id=' . $row["MovieId"] . '\'" class="w3-button w3-margin-bottom"><i class="fa fa-comment"></i> Nutshells</button>
        </div>';
          echo $movie;
        }
        ?>
      </div>
    </div>
  </div>

  </div>
  <br>
  <script>
    $(document).ready(function() {
      $('.ajaxbutton').click(function() {
        var clickBtnValue = $(this).attr("liked");
        var Username = $(this).attr("Username");
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
    });
  </script>

</body>

</html>