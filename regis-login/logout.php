<?php
session_start();
session_destroy();
header("location:../beranda/beranda_awal.php");
?>