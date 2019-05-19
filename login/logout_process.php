<?php

// Session start
session_start();
// Check if this page was accessed through URL directly or through the login process
// If this page was accessed through URL directly then access must be dened and user must be brought back to
// the login page, else user stays on this page.
if ($_SESSION["loggedin"] == false) {
    header("Location: http://localhost/login.php");
}
else {
    // User session will be destroyed and the user will be logged out
    unset($_SESSION);
    session_destroy();
    session_write_close();
    header("Location: http://localhost/login.php?logout=1");
    die();
}

?>
