<?php

namespace App\Solid\SRP;

use Illuminate\Support\Facades\DB;

class SaleReports 
{
    public function between($startDate, $endDate)
    {
        return DB::table('sales')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->latest()
            ->get();
    }
}