<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendiente extends Model
{
    use HasFactory;
    public function buscar_pendiente($pendiente){
        return $this->where('pendiente','like','%'.$pendiente.'%')->paginate(4);
    }
}
