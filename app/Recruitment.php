<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table  = "recruitment";
    public $timestamps = false;
    protected $fillable = ['title',
    'job_title',
    'job_description',
'job_requirements',
'welfare',
'job_work_place',
'quantity',
'additional_information',
'expiration',
'created_at'];
}
