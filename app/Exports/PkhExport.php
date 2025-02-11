<?php

namespace App\Exports;

use App\Models\Pkh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PkhExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Map data to include country name
        return $this->data->map(function ($item) {
            return [
                'id' => $item->id,
                'penerima' => $item->penerima,
                'nik' => '`' . $item->nik,
                'alamat' => $item->alamat,
                'rt' => $item->rt,
                'tgl_pkh' => $item->tgl_pkh,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Penerima',
            'NIK',
            'Alamat',
            'RT',
            'Tanggal',
        ];
    }
}
