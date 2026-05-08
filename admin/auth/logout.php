<?php
session_start();

// supprimer toutes les sessions
session_unset();

// détruire la session
session_destroy();

// redirect login
header("Location: login.php");
exit();
?>