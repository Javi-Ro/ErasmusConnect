<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * Login page exists.
     *
     * @return void
     */
    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Register page exists.
     *
     * @return void
     */
    public function test_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to get all users exists.
     *
     * @return void
     */
    public function test_get_all_users()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to get one user exists.
     *
     * @return void
     */
    public function test_get_one_user()
    {
        $response = $this->get('/api/users/1');

        $response->assertStatus(200);
    }

    /**
     * Endpoint to create one user.
     *
     * @return void
     */
    public function test_create_one_user()
    {
        $data = [
            'name' => 'Ilya Slyusarchuk',
            'nickname' => '_ilyaan',
            'email' => 'ilyaniesvb@gmail.com',
            'city' => 5,
            'password' => '1234567'
        ];

        $user = User::whereNickname($data['nickname'])->first();

        if ($user) {
            $user->delete();
        }

        $response = $this->post('api/users', $data);

        $user = User::whereNickname($data['nickname'])->first();

        if ($user) {
            $user->delete();
        }

        $response->assertStatus(200);
    }

    /**
     * Endpoint to delete one user.
     *
     * @return void
     */
    public function test_delete_one_user()
    {
        $user = User::create(
            [
                'name' => 'Ilyan Slyusarchuk',
                'nickname' => '_ilyaan',
                'img_url' => '1',
                'email' => 'ilyaiesvb@gmail.com',
                'password' => '1234',
                'description' => 'i am good',
                'city_id' => 5
            ]
        );

        $response = $this->delete('api/users/' . $user->id);

        $response->assertStatus(200);
    }
}
