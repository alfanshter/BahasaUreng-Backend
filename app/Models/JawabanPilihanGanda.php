<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPilihanGanda extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function question(){
        return $this->belongsTo(PilihanGanda::class,'id_pilihanganda','id');
    }
}
