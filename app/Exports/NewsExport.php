<?php

namespace App\Exports;

use App\Modules\News\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    /**
     * php artisan make:export NewsExport --model=App\Modules\News\Models\News
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return News::all();
    }
}
