<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Notice extends Eloquent{
            protected $fillable = ['id','title','published','publisher','desc','created_at','updated_at','image'];
}
