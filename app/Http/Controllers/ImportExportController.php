<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    //


    public function import(Request $request){
        return "Some issue of importing please Wait for few days";
        $img = $request->file('import');
        Excel::import(new ImportUser, $img);
        return back();
    }

    public function export(){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
