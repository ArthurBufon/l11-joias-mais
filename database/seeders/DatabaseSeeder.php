<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'nome' => 'Arthur',
            'email' => 'arthur@gmail.com',
        ]);

        $this->gerarClientes($user->id);

        $this->gerarProdutos($user->id);
    }

    /**
     * Gerar clientes.
     */
    private function gerarClientes(int $userId): void
    {
        Cliente::factory()
            ->count(10)
            ->create(['vendedor_id' => $userId])
            ->each(function ($cliente, $index) {

                // Gerar pessoas físicas.
                if ($index < 5) {
                    $cliente->cpf = fake()->numerify('###########');
                    $cliente->cnpj = null;
                }
                // Gerar pessoas jurídicas.
                else {

                    $cliente->cpf = null;
                    $cliente->cnpj = fake()->numerify('##############');
                }

                $cliente->save();
            });
    }

    /**
     * Gerar produtos.
     */
    private function gerarProdutos(int $userId): void
    {
        Produto::factory()
            ->count(10)
            ->create(['vendedor_id' => $userId])
            ->each(function ($produto) {

                $produto->estoque()->create([
                    'quantidade' => fake()->numerify("###")
                ]);

                $produto->save();
            });
    }
}
