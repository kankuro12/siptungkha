<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Setting extends Eloquent{
            protected $fillable = ['id','channelid','apikey','create_at','updated_at',];
}
