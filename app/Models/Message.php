<?php
         namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Message extends Eloquent{
            protected $fillable = ['id','name','email','sub','detail','updated_at','created_at'];

          }
