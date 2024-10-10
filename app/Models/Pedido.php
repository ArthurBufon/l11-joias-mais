<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor',
        'acrescimos',
        'descontos',
        'cliente_id',
        'vendedor_id',
    ];

    /**
     * Retornar vendedor.
     */
    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retornar cliente.
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Retornar itens do pedido.
     */
    public function itens(): HasMany
    {
        return $this->hasMany(ItemPedido::class);
    }
}
