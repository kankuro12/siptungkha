<?php
          namespace App\Models;
         use Illuminate\Database\Eloquent\Model as Eloquent;
          class Galaryimage extends Eloquent{
            protected $fillable = ['id','image_id','galary_id','created_at','updated_at',];
            protected $appends = ['cdn'];

        public function image()
        {
            return $this->belongsTo(Image::class);
        }
        public function galary()
        {
            return $this->belongsTo(Galary::class);
        }

        public function getGalaryImageAttribute()
        {
            return $this->image->image;
        }


        public function getCdnAttribute()
        {
            return "/back/gallery/img/".$this->image_id."/";
        }

}
