<?php

use App\Conversation;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $conversations = Conversation::all();
        foreach ($conversations as $conversation) {
            for ($i = 0; $i < 5; $i++) {
                DB::table('replies')->insert([
                    'user_id' => rand(1, User::all()->count()),
                    'conversation_id' => $conversation->id,
                    'body' => $faker->paragraph,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

    }
}
