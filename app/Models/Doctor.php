<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','appointments'];
    public $fillable= ['email','email_verified_at','password','phone','price','name','appointments','section_id'];

    /*Get the Doctor's image.*/
  public function image(){
      return $this->morphOne(Image::class, 'imageable');
    }
}
