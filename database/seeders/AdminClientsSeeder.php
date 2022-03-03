<?php

namespace Database\Seeders;

use App\Models\AdminClients;
use Illuminate\Database\Seeder;

class AdminClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AdminClients::factory(10)->create();
    }
}
