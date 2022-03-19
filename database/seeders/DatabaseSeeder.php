<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
// use UsersTableSeeder;
// use ContentSeeder;
// use CurrencySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CurrencySeeder::class);
         $this->call(ContentSeeder::class);
    }
}
