<?php
        namespace App\Models;
        use Illuminate\Database\Eloquent\Factories\HasFactory;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Boardinfo extends Eloquent{
            protected $fillable = ['id','title','date','descr','files','created_at','updated_at',];


 }
