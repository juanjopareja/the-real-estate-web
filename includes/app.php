<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// DB Connection
$db = connectDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);