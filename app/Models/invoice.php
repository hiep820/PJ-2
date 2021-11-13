<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model

{
    protected $table = 'invoice';
    protected $primaryKey = 'id_invoice';
    protected $guarded = ['id_invoice'];
    public $timestamps = FALSE;

    public function subjects(){
        return $this->belongsTo('App\Models\Invoice','id_invoice','id_invoice');
    }

}
