<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\Region;
use App\Enums\PlanType;
use App\Models\Country;
use App\Enums\ActiveType;
use App\Enums\BusinessType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Dingo\Api\Contract\Http\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{   

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hs_id' => hexdec(substr(uniqid(), 0, 8)),
            'mec_id' => hexdec(substr(uniqid(), 6, 6)),
            'country_id' => Country::all()->random()->id,

            'name' => fake()->name(),
            'postal' => fake()->postcode(),
            
            'email' => fake()->unique()->safeEmail(),
            'email2' => fake()->unique()->safeEmail(),
            'website' => fake()->url(),
            'fax' => hexdec(substr(uniqid(), 2, 9)),
            'address' => fake()->address(),

            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'plan_preference' => fake()->randomElement(PlanType::forMigration()),
            'leads' => rand(1, 9),
            'business_status' => fake()->randomElement(BusinessType::forMigration()),
            'google_user_ratings_total' => rand(1, 100),
            'google_rating' => rand(1, 100),
            'revisor' => fake()->name(),
            'active' => fake()->randomElement(ActiveType::forMigration()),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }


}
