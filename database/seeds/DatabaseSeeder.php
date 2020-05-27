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

        factory(CStoke\Manufacturer::class)->create(['name' => 'bambozzi']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'boshi']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'sony']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'lg']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'bombril']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'positivo']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'avon']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'faber castel']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'cbs']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'abril']);
        factory(CStoke\Manufacturer::class)->create(['name' => 'saraiva']);

        factory(CStoke\Product::class, 20)->create();

        factory(CStoke\ItemIn::class, 50)->create();
        factory(CStoke\ItemOut::class, 25)->create();
    }
}
