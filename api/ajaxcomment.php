<?php
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'like':
                like();
                break;
            case 'unlike':
                unlike();
                break;
        }
    }

    

    function unlike() {
        include("../database/conn.php");
        $sql = "
        
        DELETE FROM commentlike
        WHERE Username = '".$_POST['Username']."' and CommentId = '".$_POST['CommentId']."'";
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
        
        INSERT INTO commentlike(Username,CommentId) VALUES ('".$_POST['Username']."', '".$_POST['CommentId']."')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Success";
        } else {
            echo "Failed";
        }
        exit;
    }
