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


        // try {
        //     Excel::import(new UsersImport, request()->file('file'));
        //     return back()->with('success', 'Dados foram Importados com Sucesso .');
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //      $failures = $e->failures();
        //      return back()->with('import_erros',   $failures );
        //     //  foreach ($failures as $failure) {
        //     //      $failure->row(); // row that went wrong
        //     //      $failure->attribute(); // either heading key (if using heading row concern) or column index
        //     //      $failure->errors(); // Actual error messages from Laravel validator
        //     //      $failure->values(); // The values of the row that has failed.
        //     //  }
        // }

        // try {
        //     Excel::import(new UsersImport, request()->file('file'));

        //     return back()->with('success', 'Dados foram Importados com Sucesso .');
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //      $failures = $e->failures();

        //      foreach ($failures as $failure) {
        //          $failure->row(); // row that went wrong
        //          $failure->attribute(); // either heading key (if using heading row concern) or column index
        //          $failure->errors(); // Actual error messages from Laravel validator
        //          $failure->values(); // The values of the row that has failed.
        //      }
        // }

        Excel::import(new UsersImport, request()->file('file'));

        return back()->with('success', 'Dados foram Importados com Sucesso .');
    }
}
