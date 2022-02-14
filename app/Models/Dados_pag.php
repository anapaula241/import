<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Support\Facades\DB;

class Dados_pag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'agencia',
        'conta',
        'banco',
        'lote',
        'status',
    ];

    // public function setLoteAttribute($value)
    // {
    //     // $ultimolote= Dados_pag::max('lote');
    //     // $value=$ultimolote;
    //     $num=1;
    //     $this->attributes['lote'] = $value + $num;
    // }
}




