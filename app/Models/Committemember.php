<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Committemember extends Eloquent{
            protected $fillable = ['id','member_id','committe_id','designation','created_at','updated_at',];
public function member()
        {
            return $this->belongsTo('Models\Member');
        }
public function committe()
        {
          return $this->belongsTo('Models\Committe');
        }
}
