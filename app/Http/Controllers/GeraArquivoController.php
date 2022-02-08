<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Dados_pag;

use Illuminate\Http\Request;

class GeraArquivoController extends Controller
{

    function cria_arquivo($arquivo)
{
    $flag=0;
	$totrem=0;

    $select = DB :: select ("SELECT left(nome,30), left (cpf,11), left (agencia,5), left (conta,9) FROM dados_pags order by nome");

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
		while ($linha = array($select))
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
				} //fim da função
}

