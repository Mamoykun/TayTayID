<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class invoice extends Model
{
    use AutoNumberTrait;
    use HasFactory;
    protected $table='data_transaksi';
    protected $guarded=['id'];

    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'TayTay?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
