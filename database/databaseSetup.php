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
    echo "Error creating database: " . $conn->error;
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
    BgColor varchar(6) not null,
    IconId int not null,
    Coins int not null,
    PRIMARY KEY (Username)
);

CREATE TABLE movies(
    MovieId int AUTO_INCREMENT,
    Name varchar(50),
    ReleaseYear smallint,
    Cast1 varchar(20),
    Cast2 varchar(20),
    Image varchar(100),
    lastUpdated date,
    PRIMARY KEY (MovieId)
);

create table watchlist(
    WatchlistId int primary key,
    Username varchar(20),
    MovieId int,
    FOREIGN KEY (Username)
        REFERENCES users(Username)
        ON DELETE CASCADE,
    FOREIGN KEY (MovieId)
        REFERENCES movies(MovieId)
        ON DELETE CASCADE
);

create table comment(
    CommentId int primary key,
    Text varchar(100) unique,
    CommentDate date not null,
    Username varchar(20),
    MovieId int,
    FOREIGN KEY (Username)
        REFERENCES users(Username)
        ON DELETE CASCADE,
    FOREIGN KEY (MovieId)
        REFERENCES movies(MovieId)
        ON DELETE CASCADE
);


";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
