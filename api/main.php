<?php
    require_once('Router.php');
    session_start();
    $router = new Router($_POST);