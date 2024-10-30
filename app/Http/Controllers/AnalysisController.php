<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;


class AnalysisController extends Controller
{
    public function revenue() {
        $rentangTanggal = request()->input('rentang_tanggal');
        if($rentangTanggal) {

            $tanggal = explode(" to ", $rentangTanggal);
            $startDate = $tanggal[0];
            $endDate = $tanggal[1] ?? $tanggal[0];
            
            $totalRevenue = Transaction::
            where('payment_status', 'settlement')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_paid');
        } else {
            $startDate = Carbon::today()->toDateString();
            $totalRevenue = Transaction::
            where('payment_status', 'settlement')
            ->whereDate('created_at', $startDate)
            ->sum('total_paid');
        }
        
        

        return $totalRevenue;
    }
}
