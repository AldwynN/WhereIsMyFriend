<?php
$idUser=7;
session_start();

require_once '/../database/database.php';

require_once '/../class/Message.php';
require_once '/../class/User.php';
require_once '/../manager/userManager.php';
require_once '/../manager/friendManager.php';
require_once '/../manager/messageManager.php';

