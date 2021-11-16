<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>W3.CSS Template</title>
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
  </style>
</head>

<body class="w3-theme-l5">

  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
      <span class="w3-bar-item w3-padding-large">
        <i class="fas fa-film"></i> Cinema in a shell</span>
      <button class=" w3-button w3-padding-large w3-right" title="My Account" style="min-width:100px">
        <span>Logout</span>
      </button>
      <button class=" w3-button w3-padding-large w3-right" title="My Account" style="min-width:100px">
        <span>Sign up</span>
      </button><button class=" w3-button w3-padding-large w3-right" title="My Account" style="min-width:100px">
        <span>Login</span>
      </button>
    </div>
  </div>

  <?php
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://sg.media-imdb.com/suggests/b/back%20to.json",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  $response = json_decode($response, true);
  echo 'Online: ' . $response['players']['online'];
  ?>


  <div class="container" style="max-width:1400px;margin-top:60px">
    <div class="w3-row justify-content-center">
      <div class="w3-col m4">
        <div class="w3-card w3-round w3-white w3-margin">
          <div class="w3-container">
            <h4 class="w3-center">My Profile</h4>
            <center><img src="https://cdn2.iconfinder.com/data/icons/flat-style-svg-icons-part-1/512/user_man_male_profile_account-512.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
              <h5>Huzaifa</h5>
            </center>
            <hr>
            <p><i class="fas fa-coins fa-fw w3-margin-right w3-text-theme"></i> 500</p>
            <p><i class="fa fa-venus-mars fa-fw w3-margin-right w3-text-theme"></i> Male</p>
            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
          </div>
        </div>
      </div>

      <div class="w3-col m8">
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
          <img src="https://m.media-amazon.com/images/M/MV5BZmU0M2Y1OGUtZjIxNi00ZjBkLTg1MjgtOWIyNThiZWIwYjRiXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg" alt="poster" class="w3-left w3-margin-right" style="width:60px">
          <span class="w3-right w3-opacity">1 min</span>
          <h4>Back to the future</h4>
          <p>Marty McFly, a 17-year-old high school student, is accidentally sent thirty years into the past in a time-traveling DeLorean invented by his close friend, the eccentric scientist Doc Brown.</p>
          <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
          <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
        </div>

      </div>
    </div>

  </div>

  </div>
  <br>

</body>

</html>