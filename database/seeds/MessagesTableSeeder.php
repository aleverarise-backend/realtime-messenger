<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'from_id' => 1,
            'to_id'   => 2,
            'content' => 'Hello, how are you?',
        ]);

        Message::create([
            'from_id' => 2,
            'to_id'   => 1,
            'content' => 'I am fine and you?',
        ]);

        Message::create([
            'from_id' => 1,
            'to_id'   => 3,
            'content' => 'Hello, how are you?',
        ]);
    }
}
