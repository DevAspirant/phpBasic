<?php


require 'app/Database/DBConnection.php';
require 'app/Database/QueryBuilder.php';
require 'app/Core/Router.php';
require 'app/Core/Request.php';
require 'app/Controllers/TaskController.php'; // 1

QueryBuilder::make(DBConnection::make());