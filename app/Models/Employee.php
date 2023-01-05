<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Employee extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'employees';
    public $translatable = ['name'];
    protected $guarded =[];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    public function employee_account()
    {
        return $this->hasMany('App\Models\EmployeeAccount', 'employee_id');
    }
}
