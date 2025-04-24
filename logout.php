<?php
require 'config.php'; require 'autoload.php';
User::logout();
header('Location: login.php');
