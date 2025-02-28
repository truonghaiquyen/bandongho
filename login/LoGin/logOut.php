<?php
session_start();
unset($_SESSION['loGin']);
header("location:../../index.php");
