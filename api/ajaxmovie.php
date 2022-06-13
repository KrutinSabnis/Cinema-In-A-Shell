<?php
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'like':
                like();
                break;
            case 'unlike':
                unlike();
                break;
            case 'addcomment':
                addcomment();
                break;
            case 'deletecomment':
                deletecomment();
                break;
            case 'editcomment':
                editcomment();
                break;
        }
    }

    function deletecomment(){
        include("../database/conn.php");
        $CommentId = $_POST['CommentId'];
        $query = "DELETE FROM comment WHERE CommentId = $CommentId";
        echo $query;
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    function editcomment(){
        include("../database/conn.php");
        $CommentId = $_POST['CommentId'];
        $Comment = $_POST['Comment'];
        $query = "UPDATE comment SET Text = '$Comment' WHERE CommentId = $CommentId";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    function addcomment() {
        include("../database/conn.php");
        $movieid = $_POST['MovieId'];
        $comment = $_POST['comment'];
        $username = $_POST['Username'];
        $date = date('Y-m-d');
        $sql = "INSERT INTO comment (Text,CommentDate , Username, MovieId) VALUES ('$comment', '$date', '$username', '$movieid')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    function unlike() {
        include("../database/conn.php");
        $sql = "
        
        DELETE FROM movielike
        WHERE Username = '".$_POST['Username']."' and MovieId = '".$_POST['MovieId']."'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Success";
        } else {
            echo "Failed";
        }
        exit;
    }

    function like() {
        include("../database/conn.php");
        $sql = "
        
        INSERT INTO movielike(Username,MovieId) VALUES ('".$_POST['Username']."', '".$_POST['MovieId']."')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Success";
        } else {
            echo "Failed";
        }
        exit;
    }
