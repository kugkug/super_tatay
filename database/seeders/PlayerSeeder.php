<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'age' => 25,
                'contact_number' => '+1234567890',
                'jersey_number' => 10,
                'photo' => null,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'age' => 23,
                'contact_number' => '+1987654321',
                'jersey_number' => 7,
                'photo' => null,
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Johnson',
                'age' => 28,
                'contact_number' => '+1122334455',
                'jersey_number' => 15,
                'photo' => null,
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Williams',
                'age' => 22,
                'contact_number' => '+1555666777',
                'jersey_number' => 9,
                'photo' => null,
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'age' => 26,
                'contact_number' => '+1888999000',
                'jersey_number' => 5,
                'photo' => null,
            ],
        ];

        foreach ($players as $playerData) {
            Player::create($playerData);
        }
    }
} 