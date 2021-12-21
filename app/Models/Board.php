<?php
        namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
          class Board extends Model{
            protected $fillable = ['id','startdate','enddate','active','created_at','updated_at',];

          public function boardmember(){
            //   return Boardmember::where('id',$this->id)->get();
            return $this->hasMany(Boardmember::class);
          }
 }
