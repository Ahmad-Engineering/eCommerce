<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminClients;
use App\Models\Client;
use App\Models\ClientSocial;
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
        // \App\Models\User::factory(10)->create();
        Admin::factory(1)->create();
        Client::factory(10)->create();
        AdminClients::factory(10)->create();
        ClientSocial::factory(5)->create();
    }
}
