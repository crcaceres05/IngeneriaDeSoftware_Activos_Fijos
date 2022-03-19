<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable=["codusr","password","idrol"];
    protected $increments=false;

    public function idrol(){
        return  $this->belongsTo("App\Models\Rol","idrol","id");
    }
}
