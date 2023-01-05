<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['title'];
    protected $fillable = ['title','amount','department_id','year','description','fee_type'];

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function fee_type()
    {
        return $this->fee_type ? 'Study fees' : "Bus fees";
    }
}
