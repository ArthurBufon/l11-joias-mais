<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cpf',
        'cnpj',
        'email',
        'telefone',
    ];

    /**
     * Retornar vendedor.
     */
    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retornar pedidos.
     */
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class);
    }
}
