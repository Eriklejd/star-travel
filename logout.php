<?php
session_start(); // Nisim sesionin per ta aksesuar

// 1. Fshijme te gjitha variablat e sesionit
session_unset();

// 2. Shkaterrojme sesionin
session_destroy();

// 3. Kthejme perdoruesin ne faqen kryesore (home.php)
header("Location: home.php");
exit(); // Sigurohemi qe kodi ndalon se ekzekutuari
?>