<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id_book';
    protected $guarded = ['id_book'];
    public $timestamps = FALSE;

    public function subjects(){
        return $this->belongsTo('App\Models\Subjects','id_subjects','id_subjects');
    }
}
