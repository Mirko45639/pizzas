<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'id', 'categoria_id');
    }
}
