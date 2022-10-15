<?php

namespace Database\Factories;

use App\Models\MasterFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SlaveFile>
 */
class SlaveFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // "master_file_id"=> 1,
            "master_file_id"=> MasterFile::factory()->create()->id,
            "name" => "dynahod_26092022_204623.jpg",
            "file"=> "http://127.0.0.1:8000/dynahod_26092022_204623.jpg",
            "extension" => "jpg",
            "size"=> 21106
        ];
    }
}
