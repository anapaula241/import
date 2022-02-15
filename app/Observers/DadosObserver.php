<?php

namespace App\Observers;

use App\Models\Dados_pag;
use Illuminate\Support\Facades\DB;

class DadosObserver
{

    public function creating(Dados_pag $dados_pag)
    {

        $dados_pag->nome = trim($dados_pag->nome);
        $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
        $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
        $dados_pag->nome = str_replace($comAcentos, $semAcentos, $dados_pag->nome);
        $dados_pag->nome  = preg_replace('/[0-9\@\.\;]+/', '', $dados_pag->nome );
        $dados_pag->nome = strtoupper($dados_pag->nome);

        $dados_pag->agencia = preg_replace("/[^a-zA-Z0-9]+/", "",  $dados_pag->agencia);
        $dados_pag->agencia = trim($dados_pag->agencia);
        $dados_pag->conta = preg_replace("/[^a-zA-Z0-9]+/", "",   $dados_pag->conta);
        $dados_pag->conta = trim($dados_pag->conta);
 $dados_pag->cpf = preg_replace("/[^a-zA-Z0-9]+/", "",   $dados_pag->cpf);
        $dados_pag->cpf = trim($dados_pag->cpf);

    }
    /**
     * Handle the Dados_pag "created" event.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return void
     */
    public function created(Dados_pag $dados_pag)
    {

        $dados_pag->status = 1;
        $dados_pag->save();

    }

    /**
     * Handle the Dados_pag "updated" event.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return void
     */
    public function updated(Dados_pag $dados_pag)
    {
        //
    }

    /**
     * Handle the Dados_pag "deleted" event.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return void
     */
    public function deleted(Dados_pag $dados_pag)
    {
        //
    }

    /**
     * Handle the Dados_pag "restored" event.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return void
     */
    public function restored(Dados_pag $dados_pag)
    {
        //
    }

    /**
     * Handle the Dados_pag "force deleted" event.
     *
     * @param  \App\Models\Dados_pag  $dados_pag
     * @return void
     */
    public function forceDeleted(Dados_pag $dados_pag)
    {
        //
    }
}
