<?php

// namespace App\Exports;

// use App\Ziswaf;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class ZiswafExport implements FromCollection
// {
//     public function collection()
//     {
//         return Ziswaf::all();
//     }
// }
namespace App\Exports;

use App\Ziswaf;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ZiswafExport implements FromView
{

    public function __construct($cat_id, $month, $year, $prev_saldo)
    {
        $this->cat_id = $cat_id;
        $this->prev_saldo = $prev_saldo;
        $this->month = $month;
        $this->year = $year;

    }

    public function view(): View
    {
        return view('exports.ziswaf', [
            'cat_id' => $this->cat_id,
            'month' => $this->month,
            'year' => $this->year,
            'data_list' => $data_list = Ziswaf::where("kategori",$this->cat_id)->whereMonth('tanggal', '=', $this->month)->whereYear('tanggal', '=', $this->year)->orderBy("tanggal","ASC")->get(),
            'prev_saldo' => $this->prev_saldo,
        ]);
    }
}
