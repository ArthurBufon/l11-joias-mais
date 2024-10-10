<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $urlsFotos = [
            'https://a-static.mlcdn.com.br/280x210/creatina-monohidratada-500g-100-pura-importada-soldiers-nutrition/soldiersnutrition/14/a4466053121d7ebee4b8bc64fc7cee98.jpeg',
            'https://a-static.mlcdn.com.br/280x210/smartphone-samsung-galaxy-a05-128gb-preto-4g-octa-core-4gb-ram-67-cam-dupla-selfie-8mp/magazineluiza/238036500/5be0fccafef98e0b5a4c3c65fa1f7c8b.jpg',
            'https://a-static.mlcdn.com.br/280x210/smartphone-samsung-galaxy-s23-256gb-preto-5g-8gb-ram-galaxy-buds-fe-sem-fio-grafite/magazineluiza/239000000/1755f95893363fb09129bf9ae79186ce.jpg',
            'https://a-static.mlcdn.com.br/280x210/panela-frigideira-de-inducao-e-fogao-a-gas-antiaderente-de-ceramica-reforcada-linha-premium-hyllis-home-goods/homeimports/ds-11727/4a93e35c4dc0e518a702149c4e55fca2.jpeg',
            'https://a-static.mlcdn.com.br/280x210/fritadeira-eletrica-sem-oleo-air-fryer-mondial-family-afn-40-bi-preto-4l-com-timer/magazineluiza/228887000/c8c3b47783b851f54be2594719871282.jpg',
        ];

        return [
            'nome' => fake()->words(3, true),
            'descricao' => fake()->sentence(),
            'preco' => fake()->numerify("######"),
            'url_foto' => fake()->randomElement($urlsFotos),
        ];
    }
}
