<?php
require './classes/dbConnect.php';
require './Models/user.php';
require './manager/userManager.php';


$req = new UserManager('a','a','a','a');

var_dump($req);

;