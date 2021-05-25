<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = "detalle_pedido";
    protected $primaryKey = "id";
    public $timestamps = false;
}
