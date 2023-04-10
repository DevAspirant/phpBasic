<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// insert the task into DB

$description = Request::get('description');

QueryBuilder::insert('tasks',['description' => $description]);

header("Location:http://172.16.2.9/phpBasic/");
