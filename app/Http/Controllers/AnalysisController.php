<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Transaction;
use Carbon\Carbon;


class AnalysisController extends Controller
{
    public function revenue() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
        
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $totalRevenue = Transaction::
                where('payment_status', 'settlement')
                ->whereDate('created_at', $startDate)
                ->sum('total_paid');
            } else {
                $totalRevenue = Transaction::
                where('payment_status', 'settlement')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('total_paid');
            }
            $revenueSebelum = Cache::get('revenue_sebelum', 0);


            if ($revenueSebelum != 0) {
                $persentase = ($totalRevenue - $revenueSebelum) / $revenueSebelum * 100;
            } else {
                $persentase = $totalRevenue > 0 ? $totalRevenue * 100 : 0;
            }
    
            Cache::put('revenue_sebelum', $totalRevenue);
        } else {
            $totalRevenue = Transaction::
                where('payment_status', 'settlement')
                ->whereDate('created_at', Carbon::today())
                ->sum('total_paid');
            

                $yesterday = Carbon::now()->subDay()->format('Y-m-d');
            
                $revenueSebelum = Transaction::
                where('payment_status', 'settlement')
                ->whereDate('created_at', $yesterday)
                ->sum('id');
    
                if ($revenueSebelum != 0) {
                    $persentase = ($totalRevenue - $revenueSebelum) / $revenueSebelum * 100;
                } else {
                    $persentase = $totalRevenue > 0 ? $totalRevenue * 100 : 0;
                }
        
                Cache::put('revenue_sebelum', $totalRevenue);
        }

        return [
            'totalRevenue' => $totalRevenue,
            'revenueSebelum' => $revenueSebelum,
            'isRevenueIncreased' => $totalRevenue > $revenueSebelum,
            'persentase' => $persentase,
        ];
    }

    public function totalTransaction() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
            
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $totalTransaksi = Transaction::
                where('payment_status', 'settlement')
                ->whereDate('created_at', $startDate)
                ->count('id');
            } else {
                $totalTransaksi = Transaction::
                where('payment_status', 'settlement')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count('id');
            }
            $transaksiSebelum = Cache::get('transaksi_sebelum', 0);

            if ($transaksiSebelum != 0) {
                $persentase = ($totalTransaksi - $transaksiSebelum) / $transaksiSebelum * 100;
            } else {
                $persentase = $totalTransaksi > 0 ? $totalTransaksi * 100 : 0;
            }

            Cache::put('transaksi_sebelum', $totalTransaksi);
        } else {
            $totalTransaksi = Transaction::
                where('payment_status', 'settlement')
                ->whereDate('created_at', Carbon::today())
                ->count('id');

            $yesterday = Carbon::now()->subDay()->format('Y-m-d');
            
            $transaksiSebelum = Transaction::
            where('payment_status', 'settlement')
            ->whereDate('created_at', $yesterday)
            ->count('id');

            if ($transaksiSebelum != 0) {
                $persentase = ($totalTransaksi - $transaksiSebelum) / $transaksiSebelum * 100;
            } else {
                $persentase = $totalTransaksi > 0 ? $totalTransaksi * 100 : 0;
            }
    
            Cache::put('transaksi_sebelum', $totalTransaksi);
        }
        
        
        return [
            'totalTransaksi' => $totalTransaksi,
            'transaksiSebelum' => $transaksiSebelum,
            'isTransactionIncreased' => $totalTransaksi > $totalTransaksi,
            'persentase' => $persentase,
        ];
    }
}
