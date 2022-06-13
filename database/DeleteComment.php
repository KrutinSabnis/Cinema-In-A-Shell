<?php
include('conn.php');

$sql = "

DELETE from comment
WHERE comment.MovieId = 'tt1375666' AND comment.Username = 'Huzaifa';

";

if ($conn->query($sql) === TRUE) {
    echo "comment deleted successfully" . "<br>";
} else {
    echo "Error deleting comment: " . $conn->error;
}
?>
