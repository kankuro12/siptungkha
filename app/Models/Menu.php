<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function submenu(){
        return $this->hasMany(Menu::class,'parent_id');
    }

    public function parent()
    {
        if($this->parent_id==0){
            return NULL;
        }else{
            return Menu::where('id',$this->parent_id)->first();
        }
    }

public function getName(){
    if($this->parent_id==0){
        return $this->title;
    }else{

        if($this->parent() != null){
            $p=$this->parent();
            if($p->parent_id==0){
                return $p->title.' >> '.$this->title;
            }else{
                $pp=$p->parent();
                return $pp->title.' >> '.$p->title.' >> '.$this->title;
            }
        }
    }
}
}
