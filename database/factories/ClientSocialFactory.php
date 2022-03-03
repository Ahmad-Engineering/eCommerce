<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientSocialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'twitter' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'facebook' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'instagram' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'github' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'codepen' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'slack' => 'https://laracasts.com/discuss/channels/general-discussion/404-not-found-but-route-exists',
            'client_id' => Client::inRandomOrder()->first()->id,
        ];
    }
}
