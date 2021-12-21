<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Event extends Eloquent{
         protected $fillable = ['id','title','address','descr','eventtime','eventdate','image','updated_at','created_at',];


         public function getdate(){
          $eventdate=$this->eventdate;
          $date=new \Carbon\Carbon($eventdate);
          return $date;

         }

        }
