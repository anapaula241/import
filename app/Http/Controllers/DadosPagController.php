<?php

namespace App\Http\Controllers;

use App\Models\Dados_pag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DadosImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DadosPagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        // $dados = Dados_pag::all();
        $dadoss= Dados_pag::select('nome', 'cpf', 'agencia', 'conta','lote', 'created_at', 'id');
        $dados = $dadoss->groupBy('lote')->get();
        return view('arquivotxt', compact('dados'));
    }


    public function create()
    {

        return view('file-import');
    }


    public function download($lote)
    {

        return Storage::download('/public/arquivos'.$lote. ".txt");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ultimolote = Dados_pag::max('lote');
        $lote = $ultimolote + 1;

        Excel::import(new DadosImport($lote), request()->file('file'));

        return back()->with('success', 'Dados foram Importados com Sucesso .');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return \Illuminate\Http\Response
     */


  function cria_arquivo($lote)
    {
        $flag = 0;
        $totrem = 0;


        // $dados= Dados_pag::select('nome', 'cpf', 'agencia', 'conta')
        //                     ->orderByDesc('nome')
        //                     ->get()->toArray();


        // $dados = Dados_pag::all();
$dados = Dados_pag::where('lote', $lote)->get();
//

// dd($dados);


        // dd($dados);
        // Storage::delete('novo.txt');
        if (count($dados)) {
            //variável de 20 espaços
            $num = 1;
            $espaco_ini = "";
            while ($num <= 20) {
                $espaco_ini = $espaco_ini . " ";
                $num = $num + 1;
            }

            //variável de 60 espaços
            $num = 1;
            $espaco_fin = "";
            $espaco_fin = "";

            while ($num <= 60) {
                $espaco_fin = $espaco_fin . " ";
                $num = $num + 1;
            }


        // Apagar Arquivo
                // Storage::delete('public/storage/arquivos/novo.txt');
       // fim

            foreach ($dados as $linha) {

                $nome = $linha->nome;

                $nome = substr( Str::padRight($nome, 30),0,29);

                $cpf = $linha->cpf;


                //acrescendo zeros ao valor

                $valor = $linha->agencia;

                // $num=strlen($valor);

                $num = Str::length($valor);

                while ($num < 15) {
                    $valor = "0" . $valor;
                    $num = $num + 1;
                }
                $vlr = $linha->agencia;
                // $vlr = $vlr / 100;

                //acrescendo zeros à agencia
                $agencia = $linha->agencia;
                // $num=strlen($agencia);
                $num = Str::length($agencia);
                while ($num < 5) {
                    $agencia = "0" . $agencia;
                    $num = $num + 1;
                }

                //acrescendo zeros à conta
                $conta = $linha->agencia;
                // $num=strlen($conta);
                $num = Str::length($conta);
                while ($num < 12) {
                    $conta = "0" . $conta;
                    $num = $num + 1;
                }

                // if (!$abrir = fopen($arquivo, "a")) //fopen=abrir arq.
                // {
                // 	echo "Erro abrindo arquivo ($arquivo)";
                // 	exit;
                // }

                $abrir = fopen(storage_path('app/public/arquivos') .$linha->lote. ".txt", "a");
                $linhas = $nome . "1000" . $cpf . "001" . $agencia . $conta . $espaco_fin . "\r\n";
                fwrite($abrir, $linhas);
                // if (!fwrite($abrir, $linhas)) //fwrite=grava arq.
                // {
                // 	print "Erro escrevendo no arquivo ($arquivo)";
                // 	exit;
                // }
                fclose($abrir);
                //gravando arquivo remessas



            }

            // return Storage::download('/public/arquivos'.$linha->lote. ".txt");
            return back()->with('message', 'Arquivo foi Criado com Sucesso .');


        } else return 0;
    }
    //fim da função
}
