<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observer extends Model
{
    protected $table = 'observers' ;
    protected $fillable = [
        'internship_student_id', 'group_projects_schedule_id'
    ];

    public function InternshipStudent() {
        return $this->belongsTo('App\InternshipStudent');
    }
}
