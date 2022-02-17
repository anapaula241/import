<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UserController extends Controller
{

    public function import()
    {
       return view('file-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {


        Excel::import(new UsersImport, request()->file('file'));

        return back()->with('success', 'Dados foram Importados com Sucesso .');
    }
}
