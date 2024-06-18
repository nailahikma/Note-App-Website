<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users
        $users = User::all();

        // Loop through each user and insert a note
        foreach ($users as $user) {
            DB::table('notes')->insert([
                'user_id' => $user->id,
                'title' => "Hi, User",
                'content' => 'Welcome to our Note!',
                'created_at' => "2024-06-01 12:24:20"
            ]);
        }
    }
}
