<?php
        namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Committe extends Eloquent{
            protected $fillable = ['id','name','startdate','enddate','active','created_at','updated_at',];

      public function committemember()
                      {
                        return $this->hasMany('Models\Committemember');
                      }


 }
