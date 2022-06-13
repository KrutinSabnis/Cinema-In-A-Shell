<?php
include('conn.php');

$sql = "

INSERT INTO commentlike (CommentId, Username)
VALUES ('1', 'Poonam'), ('2', 'Poonam'),('1', 'Huzaifa'),
('2', 'Huzaifa'),('4', 'Huzaifa'),('2', 'Krutin'),
('1', 'Krutin'), ('5', 'Krutin'), ('6', 'Krutin'), ('5', 'Huzaifa'), ('6', 'Poonam'),('5','Poonam');

";

if ($conn->query($sql) === TRUE) {
    echo "comment liked successfully" . "<br>";
} else {
    echo "Error liking comment: " . $conn->error;
}
?>
