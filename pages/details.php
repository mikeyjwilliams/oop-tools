<?php
/**
 * License: GPL3
 * Created by PhpStorm.
 * User: mikey
 * Date: 12/21/17
 * Time: 11:02 AM
 */
 require_once('../bootstrap.php');

$id = $_GET['id']; // grabbing Global Variable GET id
$page_title = 'Tool Details';

require_once('../views/details.view.php');