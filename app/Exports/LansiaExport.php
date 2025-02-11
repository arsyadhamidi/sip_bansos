<?php

namespace App\Exports;

use App\Models\Lansia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LansiaExport implements FromCollection, WithHeadings
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
                'tgl_lansia' => $item->tgl_lansia,
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
