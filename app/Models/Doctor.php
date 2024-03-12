<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use Translatable;
  use HasFactory;
  public $translatedAttributes = ['name'];
  public $fillable = ['email', 'email_verified_at', 'password', 'phone', 'name', 'section_id','status'];

  /*Get the Doctor's image.*/
  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }
  // One To One get section of Doctor
  public function section()
  {
    return $this->belongsTo(Section::class);
  }
  public function doctorappointments()
     {
         return $this->belongsToMany(Appointment::class,'appointment_doctor');
     }
}
