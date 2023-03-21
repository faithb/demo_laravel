<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id') -> toArray();
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'type' => fake()->randomNumber(1),
            'status' => fake()->randomNumber(1),
            'start_date' => fake()->date(),
            'due_date' => fake()->date(),
            'assignee' => fake()->randomElement($users),
            'estimate' =>fake()->randomFloat(1),
            'actual' => fake()->randomFloat(1),
        ];
    }
}
