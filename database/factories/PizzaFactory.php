<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\Pizza;

class PizzaFactory extends Factory
{
    protected $model = Pizza::class;

    public function definition(): array
    {
        $toppingChoices = [
            'Pepperoni',
            'Mushrooms',
            'Onions',
            'Sausage',
            'Bacon',
            'Extra cheese',
            'Black olives',
            'Green peppers',
            'Pineapple',
            'Spinach'
        ];

        // Randomly select 0 to 5 toppings
        $toppings = Arr::random($toppingChoices, rand(0, 5));

        return [
            'id' => rand(11111, 99999),
            'user_id' => rand(1, 10),
            'size' => Arr::random(['Small', 'Medium', 'Large', 'Extra-Large']),
            'crust' => Arr::random(['Normal', 'Thin', 'Garlic']),
            'toppings' => $toppings, // Assigned random toppings here
            'status' => Arr::random(['Ordered', 'Prepping', 'Baking', 'Checking', 'Ready']),
        ];
    }
}
