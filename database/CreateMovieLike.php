<?php
include('conn.php');

$sql = "

INSERT INTO movielike (MovieId, Username)
VALUES ('tt0096657', 'Poonam'), ('tt0120338', 'Poonam'),
('tt0418279', 'Huzaifa'),('tt1375666', 'Huzaifa'),
('tt0096657', 'Huzaifa'),('tt0096657', 'Krutin'),
('tt0120338', 'Krutin'),('tt0418279', 'Krutin');

";

if ($conn->query($sql) === TRUE) {
    echo "comment liked successfully" . "<br>";
} else {
    echo "Error liking comment: " . $conn->error;
}
?>
