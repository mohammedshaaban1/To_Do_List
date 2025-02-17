<?php

try {
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=todolist;", "root", "");
} catch (Exception $error) {
    echo "connection error" . $error->getmessage();
}
