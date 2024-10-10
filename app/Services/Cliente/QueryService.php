<?php

namespace App\Services\Cliente;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;

class QueryService
{
    /**
     * Retornar recurso.
     */
    public function getByCustom(array $colunas = null, bool $collection = false): Cliente|Collection|null
    {
        return Cliente::query()
            ->when(
                isset($colunas['nome']),
                function ($q) use ($colunas) {
                    return $q->where('nome', $colunas['nome']);
                }
            )
            ->when(
                isset($colunas['cpf']),
                function ($q) use ($colunas) {
                    return $q->where('cpf', $colunas['cpf']);
                }
            )
            ->when(
                isset($colunas['cnpj']),
                function ($q) use ($colunas) {
                    return $q->where('cnpj', $colunas['cnpj']);
                }
            )
            ->when(
                $collection,
                function ($q) {
                    return $q->get();
                },
                function ($q) {
                    return $q->first();
                }
            );
    }
}
