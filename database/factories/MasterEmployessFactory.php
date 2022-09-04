<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterEmployess>
 */
class MasterEmployessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip'=>fake()->phoneNumber,
            'name'=>fake('id')->name,
            'jabatan'=>fake('id')->colorName,
            'path_photo'=>fake('id')->filePath()
        ];
    }
}
