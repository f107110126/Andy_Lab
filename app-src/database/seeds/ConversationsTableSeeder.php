<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Generate by command:
     * php artisan make:seed ConversationsTableSeeder
     * to execute this seeder:
     * php artisan db:seed --class ConversationsTableSeeder
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('conversations')->insert([
                'user_id' => rand(1, User::all()->count()),
                'title' => $faker->sentence,
                'body' => implode(' ', $faker->paragraphs),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $this->call(RepliesTableSeeder::class);
    }
}
