<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id_student';
    protected $guarded = ['id_student'];
    public $timestamps = FALSE;

    public function grades(){
        return $this->belongsTo('App\Models\Grade','id_grade','id_grade');
    }
    public function getGenderNameAttribute()
    {
        if ($this->gender == 1) {
            return "Nữ";
        } else {
            return "Nam";
        }
    }

    public function getStatusNameAttribute()
    {
        if ($this->trangthai == 1) {
            return "Đã đăng kí";
        } else if ($this->trangthai == 2) {
            return "Chưa đăng kí";
        }


    }
    public function getSulyNameAttribute()
    {
        if ($this->su_ly == 1) {
            return "Đã nhận";
        } else if($this->su_ly == 2) {
            return "Chưa nhận";
        }
    }

}
