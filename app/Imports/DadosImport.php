<?php

namespace App\Imports;

use App\Models\Dados_pag;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

use Maatwebsite\Excel\Concerns\SkipsOnError;

class DadosImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts,SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dados_pag([
            'nome'     => $row['nome'],
            'cpf'    => $row['cpf'],
            'agencia'    => $row['agencia'],
            'conta'    => $row['conta'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3',
            'cpf' => 'required|cpf',
            'agencia' => 'required|min:4',
            'conta' => 'required',
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

      public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
