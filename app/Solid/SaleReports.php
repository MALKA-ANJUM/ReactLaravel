<?php

namespace App\Solid;

use Illuminate\Support\Facades\DB;

class SaleReports 
{
    public function between($startDate, $endDate)
    {
        return DB::table('sales')
            ->whereBetween('created_by', [$startDate, $endDate])
            ->latest()
            ->get();
    }
}