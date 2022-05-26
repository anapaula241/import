<?php

namespace App\Imports;

use App\Models\Dados_pag;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class DadosImport implements ToCollection, WithHeadingRow, WithValidation
{

    public function  __construct($lote)
    {
        $this->lote = $lote;
    }

    /**
     * @param array $row
     *
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            $dados = Dados_pag::create([
                // Answer::create([
                'lote' => $this->lote,
                'nome'     => $row['nome'],
                'cpf'    => $row['cpf'],
                'agencia'    => $row['agencia'],
                'conta'    => $row['conta'],
            ]);
        }
    }


    public function rules(): array
    {
        return [
            'nome' => 'required|min:3',
            'cpf' => 'required|cpf|unique:dados_pags,cpf',

        ];
    }
}
