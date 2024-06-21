<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 1; $i <= 100; $i++) {
            $cliente = new Cliente();
            $cliente->nome = $faker->name;
            $cliente->telefone = $faker->phoneNumber;
            $cliente->email = $faker->unique()->safeEmail;
            $cliente->endereco = $faker->address;
            $cliente->save();
        }
    }
}
