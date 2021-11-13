<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade';
    protected $primaryKey = 'id_grade';
    protected $guarded = ['id_grade'];
    public $timestamps = FALSE;

    public function courses(){
        return $this->belongsTo('App\Models\Course','id_course','id_course');
    }
    public function  getStatusNameAttribute()
    {
        if ($this->trang_thai== 1) {
            return "đã phát";
        } else if ($this->trang_thai== 2){
            return "chưa phát";
        }
    }
    public function book(){
        return $this->belongsToMany(Book::class,'invoice','id_grade','id_book')->withPivot('quantitys');
    }
    public function books(){
        return $this->book()
        ->selectRaw('book.id_book,book.title_book,sum(invoice.quantitys) as quantitys')
        ->groupBy('invoice.id_book');
    }
}
