<?php

namespace App\Http\Controllers;

use App\Models\Dados_pag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DadosImport;

class DadosPagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    public function create()
{
    return view('file-import');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Excel::import(new DadosImport, request()->file('file'));

         return back()->with('success', 'Dados foram Importados com Sucesso .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return \Illuminate\Http\Response
     */
    public function show(Dados_pag $dados_pag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dados_pag $dados_pag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dados_pag $dados_pag)
    {
        //
    }
}
