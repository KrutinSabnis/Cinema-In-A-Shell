<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <title>Get Movie</title>
</head>

<body>
<form method="POST">
<label>Enter Movie ID:</label><br />
<input type="text" name="MovieId" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>
<?php
if (isset($_POST['MovieId']) && $_POST['MovieId']!="") {
    $MovieId = $_POST['MovieId'];
    $url = "http://localhost/Cinema-In-A-Shell/api/movieapi.php?MovieId=".$MovieId;
    
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    
    $result = json_decode($response,true);
    
    echo '<div class="col-md-12">
    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
        <div class="g-mb-15 main-div-forbut" style="overflow: auto;">
            <img src="' . $result["Image"] . '" alt="poster" class="w3-left w3-margin-right" style="width:200px">
            <h3 style="margin-top: 0px;">' . $result["MovieName"] . '</h3>
            <h5><b>Release Date:</b> ' . $result["ReleaseDate"] . '<br></h5>
            <h5><b>Directors:</b> ' . $result["Directors"] . '<br></h5>
            <h5><b>Casts:</b> ' . $result["Casts"] . '<br></h5>
            <h5><b>Description:</b> ' . $result["Description"] . '<br></h5>
            <h5><b>Likes:</b> ' . $result["likes"] . '<br></h5>
        </div>
    </div>
</div>';
   }
?>
</body>
</html>

