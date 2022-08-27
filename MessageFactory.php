<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Message::class;

    public function definition()
    {
        return [
            'message_content' => 'ssfssfs',
            'created_at' =>  '2008-12-03 00:00:00',
            'updated_at' =>  '2008-12-03 00:00:00'
        ];
    }
}
