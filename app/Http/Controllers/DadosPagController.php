<?php

namespace App\Http\Controllers;

use App\Models\Dados_pag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DadosImport;
use Illuminate\Support\Facades\DB;


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
    public function cria_arquivo($arquivo)
    {
        {
            $flag=0;
            $totrem=0;

            $select = DB :: select ("SELECT left(nome,30), left (cpf,11), left (agencia,5), left (conta,9) FROM dados_pags order by nome");
dd($select);
            if(count($select))
            {
                            //variável de 20 espaços
                $num=1;
                $espaco_ini="";
                while ($num <= 20)
                {
                    $espaco_ini=$espaco_ini." ";
                    $num=$num+1;
                }

                            //variável de 60 espaços
                $num=1;
                $espaco_fin="";
                $espaco_fin= "";

                while ($num <= 60)
                {
                    $espaco_fin=$espaco_fin." ";
                    $num=$num+1;
                }
                //$espaco_fin=$espaco_fin."        ";


                            //gerando arquivo
                while ($linha = $select)
                    { echo $linha[0];
                        $nome=$linha[0];
                        $nome=str_pad($nome,30);

                        $cpf=$linha[1];
                                //$id=$linha[5];

                                //acrescendo zeros ao valor

                        $valor=$linha[2];
                        $num=strlen($valor);
                        while ($num < 15)
                        {
                            $valor="0".$valor;
                            $num=$num+1;
                        }
                        $vlr=$linha[2];
                        $vlr=($vlr/100);

                                //acrescendo zeros à agencia
                        $agencia=$linha[2];
                        $num=strlen($agencia);
                        while ($num < 5)
                        {
                            $agencia="0".$agencia;
                            $num=$num+1;
                        }

                                //acrescendo zeros à conta
                        $conta=$linha[3];
                        $num=strlen($conta);
                        while ($num < 12)
                        {
                            $conta="0".$conta;
                            $num=$num+1;
                        }

                                if (!$abrir = fopen($arquivo, "a")) //fopen=abrir arq.
                                {
                                    echo "Erro abrindo arquivo ($arquivo)";
                                    exit;
                                }

                                $linhas= $nome."1000".$cpf."001".$agencia.$conta.$espaco_fin."\r\n";
                                if (!fwrite($abrir, $linhas)) //fwrite=grava arq.
                                {
                                    print "Erro escrevendo no arquivo ($arquivo)";
                                    exit;
                                }

                                //gravando arquivo remessas


                                fclose($abrir);
                            }
                            return $arquivo;
                        }
                        else return 0;
                        } //fim da funçã
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
