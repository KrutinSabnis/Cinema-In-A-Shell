<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
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
    .homebut:hover{
            cursor: pointer;
        }
  </style>
</head>

<body class="w3-theme-l5">

  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
    <span class="w3-bar-item w3-padding-large homebut" onclick="location='./index.php'">
            <i class="fas fa-film"></i> Cinema in a shell
            </span>
      <div class="w3-right">

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
        $startswith = $_GET['nameq'];
        if (isset($_COOKIE['lastsearches'])) {
          echo '<h3>Last Searches</h3><ul>';
          $lastsearches = explode("&&", $_COOKIE['lastsearches']);
          if (count($lastsearches) > 5) {
            $lastsearches = array_slice($lastsearches, 0, 5);
          }
          
          foreach ($lastsearches as $key => $value) {
            echo '<li><a href="search.php?nameq=' . $value . '">' . $value . '</a></li>';
          }
          echo "</ul>";
        }
        if (!isset($_COOKIE['lastsearches'])) {
          setcookie('lastsearches', $startswith);
        } else if ($startswith != "" && !in_array($startswith, $lastsearches)) {
          setcookie('lastsearches', $startswith . "&&" . implode("&&",$lastsearches)  );
        }

        echo '<h3>Search Result</h3>';

        $curl = curl_init();
        $firstletter = strtolower(substr($startswith, 0, 1));
        $searchurl = "https://sg.media-imdb.com/suggests/$firstletter/$startswith.json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $searchurl);

        $result = curl_exec($ch);
        $result = substr($result, strpos($result, "{"), -1);
        $result = json_decode($result, true);
        // print_r($result);

        for ($i = 0; $i < count($result["d"]); $i++) {
          if (isset($result["d"][$i]["q"]) && isset($result["d"][$i]["i"]) && isset($result["d"][$i]["s"]) && isset($result["d"][$i]["y"]) && in_array($result["d"][$i]["q"], ["feature", "TV series"])) {
            $row = $result["d"][$i];
            $movie = '
            <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                <img src="' . $row["i"][0] . '" alt="poster" class="w3-left w3-margin-right" style="width:60px">
                <button type="button" style="float:right;" onclick="location=\'./movie.php?id=' . $row["id"] . '\'" class="w3-button w3-theme-d2 w3-margin-bottom">Open</button>
                <!--  <span class="w3-right w3-opacity">1 min</span> -->
                <h4>' . $row["l"] . '</h4>
                <p><b>Year : </b>' . $row["y"] . '
                <br><b>stars : </b>' . $row["s"] . '
                </p><br>
                
              </div>';
            echo $movie;
          }
        }
        ?>
      </div>
    </div>
  </div>

  </div>
  <br>

</body>

</html>