<?php

namespace App\Models;

class Callback{
    public $success;
    public $data;
    public $error;


    public function __construct($array=[]){
        $this->data=[];
        foreach ($array as $key => $value){
            $this->data[$key]=$value;
        }
        $this->success=true;
    }
    public function loaddata($array){
        foreach ($array as $key => $value){
            $this->data[$key]=$value;
        }
        $this->success=true;
    }

    public function status($success){
        $this->success=true;
    }

    public function error($error){
        $this->success=false;
        $this->error=$error;
    }
}




