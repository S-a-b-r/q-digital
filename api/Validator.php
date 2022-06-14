<?php

class Validator
{
    public function validateTask($params){
        if(strlen($params['text'])>0){
            return true;
        }
        return false;
    }
    public function validateTaskReady($params){
        if(isset($params['id_task'])){
            return true;
        }
        return false;
    }
    public function validateTaskDelete($params){
        if(isset($params['id_task'])){
            return true;
        }
        return false;
    }
}