<?php

namespace App\Imports;

use App\Models\Dados_pag;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;



// use Illuminate\Contracts\Queue\ShouldQueue;
class DadosImport implements ToCollection, WithHeadingRow, WithValidation
{

    /**
    * @param array $row
    *

    */
    public function collection(Collection $rows)
    {

            foreach ($rows as $row)
            {
                $dados= Dados_pag::create([
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
            'agencia' => 'required|min:5',
            'conta' => 'required|min:6',
        ];
    }

    // public function batchSize(): int
    // {
    //     return 500;
    // }

    // public function onError(\Throwable $e)
    // {
    //     // Handle the exception how you'd like.
    // }

  }
