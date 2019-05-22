<?php

use Illuminate\Database\Seeder;
use App\Modules\Posts\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Posts::class, 50)->create();
    }
}
