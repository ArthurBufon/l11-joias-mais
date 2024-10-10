<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'url_foto',
        'vendedor_id',
    ];

    /**
     * Retornar vendedor.
     */
    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
