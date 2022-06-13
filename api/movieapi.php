<?php
header("Content-Type:application/json");
if (isset($_GET['MovieId']) && $_GET['MovieId'] != "") {
    $con = mysqli_connect("localhost", "root", "", "CinemaInAShell");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
    $MovieId = $_GET['MovieId'];
    $result = $con->query(
        "SELECT *,(SELECT count(*) FROM movielike WHERE MovieId = '$MovieId') as likes FROM movies WHERE MovieId = '$MovieId'"
    );
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        response($row);
        mysqli_close($con);
    } else {
        response(NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}

function response($data)
{
    foreach ($data as $key => $value){
        $response[$key] = $value;
    }

    $json_response = json_encode($response);
    echo $json_response;
}
