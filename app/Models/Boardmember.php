<?php
       namespace App\Models;

       use Illuminate\Database\Eloquent\Factories\HasFactory;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Boardmember extends Eloquent{
            protected $fillable = ['id','member_id','board_id','designation','created_at','updated_at'];
public function member()
        {
            return $this->belongsTo(Member::class);
        }
public function board()
        {
          return $this->belongsTo(Board::class);
        }
}
