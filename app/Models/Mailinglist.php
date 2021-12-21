<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Mailinglist extends Eloquent{
            protected $fillable = ['id','email','create_at','updated_at',];
}
