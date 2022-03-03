<?php

namespace Database\Seeders;

use App\Models\ClientSocial;
use Illuminate\Database\Seeder;

class ClientSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ClientSocial::factory(5)->create();
    }
}
