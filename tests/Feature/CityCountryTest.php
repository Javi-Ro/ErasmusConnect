<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityCountryTest extends TestCase
{
    /**
     * Endpoint to get all cities.
     *
     * @return void
     */
    public function test_get_all_cities()
    {
        $response = $this->get('api/cities');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to get all countries.
     *
     * @return void
     */
    public function test_get_all_countries()
    {
        $response = $this->get('api/countries');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to get all cities in a country.
     *
     * @return void
     */
    public function test_get_all_cities_by_country()
    {
        $data = [
            'country_id' => 1
        ];

        $response = $this->post('api/get_cities_by_country', $data);

        $response->assertStatus(200);
    }
}
