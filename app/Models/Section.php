<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Section extends Model
{
    use Translatable; // 2. To add translation methods
    use HasFactory;
    protected $fillable =['name','description'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','description'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

}
