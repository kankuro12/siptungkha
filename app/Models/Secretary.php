<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Secretary extends Eloquent{
            protected $fillable = ['id','name','designation','address','phone','email','image','created_at','updated_at',];
}
