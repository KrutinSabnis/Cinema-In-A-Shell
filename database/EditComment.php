<?php
include('conn.php');

$sql = "

UPDATE comment SET Text = 'Interesting but confusing. Will watch again\r\n(Edit watched it again and movie was really fun to watch)' 
WHERE comment.MovieId = 'tt1375666' AND comment.Username = 'Huzaifa';

";

if ($conn->query($sql) === TRUE) {
    echo "comment edited successfully" . "<br>";
} else {
    echo "Error editing comment: " . $conn->error;
}
?>
