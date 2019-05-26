<?php
    session_name("LgSge");
    session_start();
    session_destroy();

    header("Location: ../index.php");
?>
