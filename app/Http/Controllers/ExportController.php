<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Export;
use App\Modules\News\Models\News;
use App\Exports\NewsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    use Export;

    public function exportExcel($type) {
        $filename = time().'.'.$type;
        return Excel::download(new NewsExport, $filename);
       
    }
}
