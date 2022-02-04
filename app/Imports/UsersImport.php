<?php

namespace App\Imports;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class UsersImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password'])
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email'=>'required|email|unique:users',
            'password' => 'required|min:5',

        ];
    }
}
