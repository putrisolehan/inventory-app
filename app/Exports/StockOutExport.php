<?php

namespace App\Exports;

use App\Models\StockOut;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockOutExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $query = StockOut::with('product','productSize');

        if ($this->request->filled('start_date') && $this->request->filled('end_date')) {
            $query->whereBetween('date', [
                $this->request->start_date,
                $this->request->end_date
            ]);
        }

        return view('exports.stock_out', [
            'stockOuts' => $query->get()
        ]);
    }
}