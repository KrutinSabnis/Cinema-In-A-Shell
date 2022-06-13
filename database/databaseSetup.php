<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemainashell";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully" . "<br>";
} else {
    echo "Error creating database: " . $conn->error ."<br>";
}

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "

create table users(
    Username varchar(20),
    DateOfBirth date not null,
    Email varchar(64) unique,
    Password varchar(64),
    Gender varchar(10) not null,
    Coins int not null,
    PRIMARY KEY (Username)
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "

create table movies(
    MovieId varchar(32),
    MovieName varchar(50),
    ReleaseYear smallint,
    ReleaseDate date,
    Directors varchar(64),
    Casts varchar(128),
    Image varchar(256),
    Description varchar(5000),
    PRIMARY KEY (MovieId)
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "

create table comment(
    CommentId int AUTO_INCREMENT,
    Text varchar(100) unique,
    CommentDate date not null,
    Username varchar(20),
    MovieId varchar(32),
    FOREIGN KEY (Username)
        REFERENCES users(Username)
        ON DELETE CASCADE,
    FOREIGN KEY (MovieId)
        REFERENCES movies(MovieId)
        ON DELETE CASCADE,
    PRIMARY KEY (CommentId)
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "

create table commentlike(
    CommentLikeId int AUTO_INCREMENT,
    CommentId int,
    Username varchar(20),
    FOREIGN KEY (CommentId)
        REFERENCES comment(CommentId)
        ON DELETE CASCADE,
    FOREIGN KEY (Username)
        REFERENCES users(Username)
        ON DELETE CASCADE,
    PRIMARY KEY (CommentLikeId)
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "

create table movielike(
    MovieLikeId int AUTO_INCREMENT,
    MovieId varchar(32),
    Username varchar(20),
    FOREIGN KEY (MovieId)
        REFERENCES movies(MovieId)
        ON DELETE CASCADE,
    FOREIGN KEY (Username)
        REFERENCES users(Username)
        ON DELETE CASCADE,
    PRIMARY KEY (MovieLikeId)
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
ALTER TABLE commentlike ADD CONSTRAINT unique_cu UNIQUE (CommentId,Username)
";
if ($conn->query($sql) === TRUE) {
    echo "constraint added successfully" . "<br>";
} else {
    echo "Error adding constraint: " . $conn->error;
}

$sql = "
ALTER TABLE movielike ADD CONSTRAINT unique_mu UNIQUE (MovieId,Username)
";
if ($conn->query($sql) === TRUE) {
    echo "constraint added successfully" . "<br>";
} else {
    echo "Error adding constraint: " . $conn->error;
}

include('CreateUsers.php');
include('CreateMovies.php');
include('CreateComment.php');
include('CreateCommentLike.php');
include('CreateMovieLike.php');

