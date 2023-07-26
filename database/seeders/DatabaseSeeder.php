<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(5)->create();

        foreach(range(1,150) as $index) {
            do {
                $from = $users->random();
                $to = $users->random();
            } while ($from->id === $to->id);

            // Create a message between two different users
            Message::factory()->create([
                'from_user_id' => $from->id,
                'to_user_id' => $to->id,
            ]);
        }
    }
}
