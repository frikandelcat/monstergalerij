<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(['name' => 'Normal', 'color' => '#A8A77A', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Fire', 'color' => '#EE8130', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Water', 'color' => '#6390F0', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Grass', 'color' => '#7AC74C', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Electric', 'color' => '#F7D02C', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Ice', 'color' => '#96D9D6', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Fighting', 'color' => '#C22E28', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Poison', 'color' => '#A33EA1', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Ground', 'color' => '#E2BF65', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Flying', 'color' => '#A98FF3', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Psychic', 'color' => '#F95587', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Bug', 'color' => '#A6B91A', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Rock', 'color' => '#B6A136', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Ghost', 'color' => '#735797', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Dragon', 'color' => '#6F35FC', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Dark', 'color' => '#705746', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Steel', 'color' => '#B7B7CE', 'is_custom' => false, 'user_id' => null]);
        Type::create(['name' => 'Fairy', 'color' => '#D685AD', 'is_custom' => false, 'user_id' => null]);
    }
}
