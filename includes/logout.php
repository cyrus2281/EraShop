<?php
session_start();
//loging out user
$_SESSION['user_id'] = null;
$_SESSION['username'] = null;
$_SESSION['user_role'] = null;

header("Location: ../");