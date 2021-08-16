<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if($_SESSION['status'] == "customer"){
        header("location: ../editProfilCust.php", TRUE, 302);
    }else{
        header("location: ../editProfiWork.php", TRUE, 302);
    }
} else {
    echo '<div> Please log in first..</div>
                <br>
                <button onclick="history.go(-1);">Go Back </button>';
}

?>