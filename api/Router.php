<?php

require_once('Application.php');

class Router
{
    public function __construct($params)
    {
        $app = new Application();
        $action = $params['action'];
        switch ($action){
            case 'add_task': return $app->addTask($params);
            case 'remove_all': return $app->removeAll();
            case 'ready_all': return $app->readyAll();
            case 'ready_task': return $app->readyTask($params);
            case 'delete_task': return $app->deleteTask($params);
        }
    }

}