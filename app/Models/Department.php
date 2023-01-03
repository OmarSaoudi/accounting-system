<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'departments';
    public $translatable = ['name'];
    protected $fillable =['name','description'];
}
