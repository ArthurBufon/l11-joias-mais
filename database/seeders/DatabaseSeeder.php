<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

        $this->gerarPedidos($user->id);
    }

    /**
     * Gerar clientes.
     */
    private function gerarClientes(int $vendedorId): void
    {
        Cliente::factory()
            ->count(10)
            ->create(['vendedor_id' => $vendedorId])
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
    private function gerarProdutos(int $vendedorId): void
    {
        Produto::factory()
            ->count(10)
            ->create(['vendedor_id' => $vendedorId])
            ->each(function ($produto) {

                $produto->estoque()->create([
                    'quantidade' => fake()->numerify("###")
                ]);

                $produto->save();
            });
    }

    /**
     * Gerar pedidos.
     */
    private function gerarPedidos(int $vendedorId): void
    {
        Pedido::factory()
            ->count(10)
            ->create(['vendedor_id' => $vendedorId])
            ->each(function ($pedido) use ($vendedorId) {

                $clienteAleatorio = $this->buscarClienteAleatorio($vendedorId);

                $pedido->cliente_id = $clienteAleatorio->id;

                $pedido->save();

                $produtosAleatorios = $this->buscarProdutosAleatorios($vendedorId);

                $produtosAleatorios->each(function ($produto) use ($pedido) {

                    $pedido->itens()->create([
                        'pedido_id'  => $pedido->id,
                        'produto_id' => $produto->id,
                        'quantidade' => rand(1, 30),
                        'valor_unitario' => $produto->preco,
                    ]);
                });
            });
    }

    /**
     * Retornar cliente aleatório.
     */
    private function buscarClienteAleatorio(int $vendedorId): Cliente
    {
        $clientes = Cliente::where('vendedor_id', $vendedorId)->get();

        return $clientes->random();
    }

    /**
     * Retornar produtos aleatórios.
     */
    private function buscarProdutosAleatorios(int $vendedorId): Collection
    {
        return Produto::inRandomOrder()->where('vendedor_id', $vendedorId)->limit(5)->get();
    }
}
