<?php

namespace App\Exports;

use App\Models\StockIn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockInExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $query = StockIn::with('product','productSize','supplier');

        if ($this->request->filled('start_date') && $this->request->filled('end_date')) {
            $query->whereBetween('date', [
                $this->request->start_date,
                $this->request->end_date
            ]);
        }

        return view('exports.stock_in', [
            'stockIns' => $query->get()
        ]);
    }
}