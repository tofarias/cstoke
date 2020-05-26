<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(CStoke\User::class)->create();
        factory(CStoke\Category::class)->create(['name' => 'diversão']);
        factory(CStoke\Category::class)->create(['name' => 'saúde']);
        factory(CStoke\Category::class)->create(['name' => 'informática']);
        factory(CStoke\Category::class)->create(['name' => 'livros']);
        factory(CStoke\Category::class)->create(['name' => 'roupas']);
        factory(CStoke\Category::class)->create(['name' => 'cozinha']);
        factory(CStoke\Category::class)->create(['name' => 'brinquedos e jogos']);
        factory(CStoke\Category::class)->create(['name' => 'automotivo']);
        factory(CStoke\Category::class)->create(['name' => 'alimentos e bebidas']);
    }
}
