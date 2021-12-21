<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Member extends Eloquent{
            protected $fillable = ['id','name','address','phone','education','image','email','descr','activity','updated_at','created_at',];
public function Committemembers()
        {
            return $this->hasMany('Models\Committemember');
        }
public function boardmember()
        {
          return $this->hasMany('Models\Boardmember');
        }
}
