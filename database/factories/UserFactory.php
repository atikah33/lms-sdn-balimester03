<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'siswa',
            'nisn' => null,
            'nip' => null,
            'kelas' => true, 
            'is_active' => true,
            'last_activity' => fake()-> dateTimeBetween ('-7 days', 'now'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

     public function Admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'nisn' => null,
            'nip' => null,
            'kelas' => null,
        ]);
    }
    public function guru(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'guru',
            'nip' => fake()->numerify('##############'),
            'nisn' => null,
            'kelas' => null,
        ]);
    }
}
