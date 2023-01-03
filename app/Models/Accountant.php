<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Accountant extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'accountants';
    public $translatable = ['name'];
    protected $guarded =[];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class,'accountant_day');
    }
}
