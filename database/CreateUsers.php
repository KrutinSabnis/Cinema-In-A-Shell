<?php
include('conn.php');

$sql = "

INSERT INTO users
VALUES ('Huzaifa', '2001-1-1', 'huzaifa@gmail.com', '1234', 'Male', 0),
('Krutin', '2000-2-2', 'krutin@gmail.com', 'abcd', 'Male', 0),
('Poonam', '2001-4-5', 'poonam@gmail.com', 'asdf', 'Female', 0);

";

if ($conn->query($sql) === TRUE) {
    echo "User created successfully" . "<br>";
} else {
    echo "Error creating User: " . $conn->error;
}
?>
