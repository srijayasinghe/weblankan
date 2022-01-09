<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserApiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>'TestRestUser',
            'email'=>'admin@test.com',
            'password'=>Hash::make('password')
        ];
    }
}
