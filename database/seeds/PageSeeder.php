<?php

use Illuminate\Database\Seeder;
use App\Modules\Page\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Page::class, 30)->create();
       
    }
}
