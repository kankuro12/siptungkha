<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class News extends Eloquent{
            protected $fillable = ['id','title','image','published','publisher','updated_at','created_at','descr','galary_id'];

            public function getdate(){
              $published=$this->published;
              $date=new \Carbon\Carbon($published);
              return $date;

             }

             public function galary(){
               return $this->belongsTo('Models\Galary');
             }

          }
