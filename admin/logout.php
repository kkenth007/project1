<?php
session_start();
unset($_SESSION['Userlevel']);
session_destroy();
header("Location: ../index.php ");	

?>