<?php

namespace Database\Seeders;

use App\Models\Move;
use App\Models\Type;
use Illuminate\Database\Seeder;

class MoveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeIds = Type::pluck('id', 'name');

        Move::create([
            'name' => 'Tackle',
            'type_id' => $typeIds['Normal'],
            'move_class' => 'physical',
            'description' => 'A physical attack in which the user charges and slams into the target.',
            'power' => 40,
            'accuracy' => 100,
            'pp' => 35,
        ]);

        Move::create([
            'name' => 'Ember',
            'type_id' => $typeIds['Fire'],
            'move_class' => 'special',
            'description' => 'The target is attacked with small flames.',
            'power' => 40,
            'accuracy' => 100,
            'pp' => 25,
        ]);

        Move::create([
            'name' => 'Water Gun',
            'type_id' => $typeIds['Water'],
            'move_class' => 'special',
            'description' => 'The target is blasted with a forceful shot of water.',
            'power' => 40,
            'accuracy' => 100,
            'pp' => 25,
        ]);

        Move::create([
            'name' => 'Vine Whip',
            'type_id' => $typeIds['Grass'],
            'move_class' => 'physical',
            'description' => 'The target is struck with slender, whiplike vines.',
            'power' => 45,
            'accuracy' => 100,
            'pp' => 25,
        ]);

        Move::create([
            'name' => 'Thunder Shock',
            'type_id' => $typeIds['Electric'],
            'move_class' => 'special',
            'description' => 'A jolt of electricity crashes down on the target.',
            'power' => 40,
            'accuracy' => 100,
            'pp' => 30,
        ]);

        Move::create([
            'name' => 'Quick Attack',
            'type_id' => $typeIds['Normal'],
            'move_class' => 'physical',
            'description' => 'The user lunges at the target at a speed that makes it almost invisible.',
            'power' => 40,
            'accuracy' => 100,
            'pp' => 30,
        ]);

        Move::create([
            'name' => 'Bite',
            'type_id' => $typeIds['Dark'],
            'move_class' => 'physical',
            'description' => 'The target is bitten with viciously sharp fangs.',
            'power' => 60,
            'accuracy' => 100,
            'pp' => 25,
        ]);

        Move::create([
            'name' => 'Rock Throw',
            'type_id' => $typeIds['Rock'],
            'move_class' => 'physical',
            'description' => 'The user picks up and throws a small rock at the target.',
            'power' => 50,
            'accuracy' => 90,
            'pp' => 15,
        ]);

        Move::create([
            'name' => 'Psybeam',
            'type_id' => $typeIds['Psychic'],
            'move_class' => 'special',
            'description' => 'The target is attacked with a peculiar ray.',
            'power' => 65,
            'accuracy' => 100,
            'pp' => 20,
        ]);

        Move::create([
            'name' => 'Shadow Ball',
            'type_id' => $typeIds['Ghost'],
            'move_class' => 'special',
            'description' => 'The user hurls a shadowy blob at the target.',
            'power' => 80,
            'accuracy' => 100,
            'pp' => 15,
        ]);
    }
}
