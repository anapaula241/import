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
    //     public function cria_arquivo(Request $request)
    //     {


    //         {
    //             // $select = mysql_query("SELECT left(nome,30), left (cpf,11), left (agencia,5), left (conta,9) FROM portalpesquisa.tab_financeiro order by nome") or die(mysql_error());
    //             $select = DB :: select ("SELECT nome, cpf, agencia, conta FROM dados_pags order by nome");
    // // dd($select);






    // // if(mysql_num_rows($select))
    //             if(count($array))
    //             {
    //                             //variável de 20 espaços
    //                 $num=1;
    //                 $espaco_ini="";
    //                 while ($num <= 20)
    //                 {
    //                     $espaco_ini=$espaco_ini." ";
    //                     $num=$num+1;
    //                 }

    //                             //variável de 60 espaços
    //                 $num=1;
    //                 $espaco_fin="";
    //                 $espaco_fin= "";

    //                 while ($num <= 60)
    //                 {
    //                     $espaco_fin=$espaco_fin." ";
    //                     $num=$num+1;
    //                 }
    //                 //$espaco_fin=$espaco_fin."        ";


    // //                             //gerando arquivo
    //                 // while ($linha = mysql_fetch_array($select))
    //                 while ($linha = $array)
    //                     {
    //                         echo $linha[0];
    //                         $nome=$linha[0];
    //                         $request->nome = $linha[0];
    //                         $nome=str_pad($nome);

    //                         $request->cpf = $linha[1];
    //                         $cpf=$linha[1];
    //                                 $id=$linha[5];

    // //                                 //acrescendo zeros ao valor

    //                         $valor=$linha[2];
    //                         $num=strlen($valor);
    //                         while ($num < 15)
    //                         {
    //                             $valor="0".$valor;
    //                             $num=$num+1;
    //                         }
    //                         $vlr=$linha[2];
    //                         $vlr=($vlr/100);

    //                                 //acrescendo zeros à agencia
    //                         $request->agencia = $linha[2];
    //                         // $agencia=$linha[2];
    //                         $num=strlen($request->agencia);
    //                         while ($num < 5)
    //                         {
    //                             $request->agencia="0".$request->agencia;
    //                             $num=$num+1;
    //                         }

    // //                         //         //acrescendo zeros à conta
    // //                         //         $request->conta=$linha[3];
    //                         // $conta=$linha[3];
    //                         // $num=strlen($conta);
    //                         $num=strlen($request->conta);
    //                         while ($num < 12)
    //                         {
    //                             $request->conta="0".$request->conta;
    //                             $num=$num+1;
    //                         }


    //                         $conteudo='teste';

    //                            if(!file_exists($caminho)){
    //                                fwrite($arquivo, $conteudo);
    //                            }else{
    //                                fwrite($arquivo, $conteudo);
    //                            }
    //                            fclose($arquivo);

    // ;
    //                         // }
    //                                 if (!$abrir = fopen($arquivo, "a")) //fopen=abrir arq.
    //                                 {
    //                                     echo "Erro abrindo arquivo ($arquivo)";
    //                                     exit;
    //                                 }

    //                                 // $linhas= $nome."1000".$cpf."001".$agencia.$conta.$espaco_fin."\r\n";
    //                                 $linhas= $request->nome."1000".$request->cpf."001".$request->agencia.$request->conta.$espaco_fin."\r\n";
    //                                 if (!fwrite($abrir, $linhas)) //fwrite=grava arq.
    //                                 {
    //                                     print "Erro escrevendo no arquivo ($arquivo)";
    //                                     exit;
    //                                 }

    // //                                 // // gravando arquivo remessas


    //                                 fclose($abrir);
    // //                             }
    // //                             // // dd($arquivo);
    //                             // return $arquivo;

    // //                         }
    //                         else return 0;
    //                         } //fim da funçã



    //     }

    //     /**
    //      * Update the specified resource in storage.
    //      *
    //      * @param  \Illuminate\Http\Request  $request
    //      * @param  \App\Models\Dados_pag  $dados_pag
    //      * @return \Illuminate\Http\Response
    //      */
    //     // public function update(Request $request, Dados_pag $dados_pag)
    //     // {
    //     //     //
    //     // }

    //     /**
    //      * Remove the specified resource from storage.
    //      *
    //      * @param  \App\Models\Dados_pag  $dados_pag
    //      * @return \Illuminate\Http\Response
    //      */
    //     // public function destroy(Dados_pag $dados_pag)
    //     // {
    //     //     //
    //     // }
    // }



    function cria_arquivo()
    {
        $flag = 0;
        $totrem = 0;


        // $dados= Dados_pag::select('nome', 'cpf', 'agencia', 'conta')
        //                     ->orderByDesc('nome')
        //                     ->get()->toArray();



        $dados = Dados_pag::all();


        // dd($dados);

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



            while ($linha = $dados) {
                //echo $linha[0]['nome'];

                $nome = $linha[0]['nome'];
                // $nome=str_pad($nome,30);
                $nome = Str::padRight($nome, 30);

                $cpf = $linha[0]['cpf'];
                //$id=$linha[5];

                //acrescendo zeros ao valor

                $valor = $linha[0]['agencia'];

                // $num=strlen($valor);

                $num = Str::length($valor);

                while ($num < 15) {
                    $valor = "0" . $valor;
                    $num = $num + 1;
                }
                $vlr = $linha[0]['agencia'];
                $vlr = ($vlr / 100);

                //acrescendo zeros à agencia
                $agencia = $linha[0]['agencia'];
                // $num=strlen($agencia);
                $num = Str::length($agencia);
                while ($num < 5) {
                    $agencia = "0" . $agencia;
                    $num = $num + 1;
                }

                //acrescendo zeros à conta
                $conta = $linha[0]['conta'];
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
                $abrir = fopen(storage_path('app/public/arquivos') . "/novo.txt", "w");
                $linhas = $nome . "1000" . $cpf . "001" . $agencia . $conta . $espaco_fin . "\r\n";
                fwrite($abrir, $linhas);
                // if (!fwrite($abrir, $linhas)) //fwrite=grava arq.
                // {
                // 	print "Erro escrevendo no arquivo ($arquivo)";
                // 	exit;
                // }

                //gravando arquivo remessas

                fclose($abrir);
                return Storage::download('/public/arquivos/novo.txt');
            }
            return Storage::download('/public/arquivos/novo.txt');
        } else return 0;
    }
    //fim da função
}
