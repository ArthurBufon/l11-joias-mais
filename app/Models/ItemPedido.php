<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemPedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor',
        'produto_id',
        'pedido_id',
    ];

    /**
     * Retornar produto.
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    /**
     * Retornar pedido.
     */
    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }
}
