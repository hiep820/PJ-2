<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id_subjects';
    protected $guarded = ['id_subjects'];
    public $timestamps = FALSE;

    public function grades(){
        return $this->belongsTo('App\Models\Grade','id_grade','id_grade');
    }
}
