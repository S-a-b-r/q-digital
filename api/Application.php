<?php

require_once('Validator.php');

class Application
{
    private $validator;

    const STATUS_READY = '1';
    const STATUS_UNREADY = '0';

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function addTask($params){
        if($this->validator->validateTask($params)){
            $_SESSION['tasks'][] = ['text'=> $params['text'], 'status'=>self::STATUS_UNREADY];
            header('Location: /index.php');
        }
        echo 'Неверно введен текст задачи';
    }
    public function deleteTask($params){
        if($this->validator->validateTaskDelete($params)){
            $id_task = $params['id_task'];
            array_splice($_SESSION['tasks'], $id_task, 1);
            header('Location: /index.php');
        }
        echo 'Что-то пошло не так';
    }

    public function readyTask($params){
        if($this->validator->validateTaskReady($params)){
            $id_task = $params['id_task'];
            $_SESSION['tasks'][$id_task]['status'] = self::STATUS_READY;
            header('Location: /index.php');
        }
        echo 'Что-то пошло не так';
    }

    public function removeAll(){
        $_SESSION['tasks'] = [];
        header('Location: /index.php');
    }
    public function readyAll(){
        for($i = 0; $i < count($_SESSION['tasks']); $i++){
            if(!is_null($_SESSION['tasks'][$i])){
                $_SESSION['tasks'][$i]['status'] = '1';
            }
        }
        header('Location: /index.php');
    }
}