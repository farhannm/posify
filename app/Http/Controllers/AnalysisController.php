<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Transaction;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade as PDF;


class AnalysisController extends Controller
{
    public function revenue() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
        
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $totalRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereDate('transactions.created_at', $startDate)
                ->sum('transactions.total_paid');
            } else {
                $totalRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereBetween('transactions.created_at', [$startDate, $endDate])
                ->sum('transactions.total_paid');
            }
        } else {
            $totalRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed')
            ->whereDate('transactions.created_at', Carbon::today())
            ->sum('transactions.total_paid');
        }

        return [
            'totalRevenue' => $totalRevenue,
        ];
    }

    public function totalTransaction() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
            
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $totalTransaksi = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
                ->where('transactions.payment_status',  'settlement')
                ->where('orders.order_status', 'completed')
                ->whereDate('transactions.created_at', $startDate)
                ->count('transactions.id');
            } else {
                $totalTransaksi = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
                ->where('transactions.payment_status',  'settlement')
                ->where('orders.order_status', 'completed')
                ->whereBetween('transactions.created_at', [$startDate, $endDate])
                ->count('transactions.id');
            }
        } else {
            $totalTransaksi = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereDate('transactions.created_at', Carbon::today())
                ->count('transactions.id');
        }
        
        
        return [
            'totalTransaksi' => $totalTransaksi,

        ];
    }

    public function revenueThisMonth() {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        
        $totalBulanRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
        ->where('transactions.payment_status', 'settlement')
        ->where('orders.order_status', 'completed')
        ->whereBetween('transactions.created_at', [$startOfMonth, $endOfMonth])
        ->sum('transactions.total_paid');

        $bulanSebelum = Carbon::now()->subMonth();
        $startMonthBefore = $bulanSebelum->startOfMonth()->format('Y-m-d');
        $endMonthBefore = $bulanSebelum->endOfMonth()->format('Y-m-d');

        $revenueBulanSebelum = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
        ->where('transactions.payment_status', 'settlement')
        ->where('orders.order_status', 'completed')
        ->whereBetween('transactions.created_at', [$startMonthBefore, $endMonthBefore])
        ->sum('transactions.total_paid');
        
    
        if ($revenueBulanSebelum > 0) {
            $persentase = (($totalBulanRevenue - $revenueBulanSebelum) / $revenueBulanSebelum) * 100;
        } else {
            $persentase = $totalBulanRevenue > 0 ? 100 : 0; 
        }

        $persentase = round($persentase, 2);

        return [
            'totalBulanRevenue' => $totalBulanRevenue,
            'revenueBulanSebelum' => $revenueBulanSebelum,
            'isRevenueBulananIncreased' => $totalBulanRevenue > $revenueBulanSebelum,
            'persentase' => $persentase,
        ];
    }
    


    



    public function itemSold() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
        
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $totalItemTerjual = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
                ->join('transactions', 'orders.id', '=', 'transactions.order_id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereDate('transactions.created_at', $startDate)
                ->sum('order_items.quantity');
            } else {
                $totalItemTerjual = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
                ->join('transactions', 'orders.id', '=', 'transactions.order_id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereBetween('transactions.created_at', [$startDate, $endDate])
                ->sum('order_items.quantity');
            }
            
        } else {
            $totalItemTerjual = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
                ->join('transactions', 'orders.id', '=', 'transactions.order_id')
                ->where('transactions.payment_status', 'settlement')
                ->where('orders.order_status', 'completed')
                ->whereDate('transactions.created_at', Carbon::today())
                ->sum('order_items.quantity');
        }
    
        return [
            'totalItemTerjual' => $totalItemTerjual,
        ];
    }

    public function rankSoldItem() {
        $rentangTanggal = request()->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);
        
        $startDate = $tanggal[0];
        $endDate = $tanggal[1] ?? $tanggal[0];

        if($rentangTanggal) {
            if ($startDate == $endDate) {
                $mostSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
                ->join('transactions as t', 'o.id', '=', 't.order_id')
                ->join('products as p', 'order_items.product_id', '=', 'p.id')
                ->where('t.payment_status', 'settlement')
                ->where('o.order_status', 'completed')
                ->whereDate('t.created_at', $startDate)
                ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->groupBy('p.name')
                ->orderByDesc('total_quantity')
                ->limit(1)
                ->first();

                $leastSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
                ->join('transactions as t', 'o.id', '=', 't.order_id')
                ->join('products as p', 'order_items.product_id', '=', 'p.id')
                ->where('t.payment_status', 'settlement')
                ->where('o.order_status', 'completed')
                ->whereDate('t.created_at', $startDate)
                ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->groupBy('p.name')
                ->orderBy('total_quantity')
                ->limit(1)
                ->first();

            } else {
                $mostSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
                ->join('transactions as t', 'o.id', '=', 't.order_id')
                ->join('products as p', 'order_items.product_id', '=', 'p.id')
                ->where('t.payment_status', 'settlement')
                ->where('o.order_status', 'completed')
                ->whereBetween('t.created_at', [$startDate, $endDate])
                ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->groupBy('p.name')
                ->orderByDesc('total_quantity')
                ->limit(1)
                ->first();

                $leastSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
                ->join('transactions as t', 'o.id', '=', 't.order_id')
                ->join('products as p', 'order_items.product_id', '=', 'p.id')
                ->where('t.payment_status', 'settlement')
                ->where('o.order_status', 'completed')
                ->whereBetween('t.created_at', [$startDate, $endDate])
                ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->groupBy('p.name')
                ->orderBy('total_quantity')
                ->limit(1)
                ->first();

            }
        } else {
            $mostSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
            ->join('transactions as t', 'o.id', '=', 't.order_id')
            ->join('products as p', 'order_items.product_id', '=', 'p.id')
            ->where('t.payment_status', 'settlement')
            ->where('o.order_status', 'completed')
            ->whereDate('t.created_at', Carbon::today())
            ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('p.name')
            ->orderByDesc('total_quantity')
            ->limit(1)
            ->first();

            $leastSold = OrderItem::join('orders as o', 'order_items.order_id', '=', 'o.id')
            ->join('transactions as t', 'o.id', '=', 't.order_id')
            ->join('products as p', 'order_items.product_id', '=', 'p.id')
            ->where('t.payment_status', 'settlement')
            ->where('o.order_status', 'completed')
            ->whereDate('t.created_at', Carbon::today())
            ->select('p.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('p.name')
            ->orderBy('total_quantity')
            ->limit(1)
            ->first();

        }

        return [
            'mostSold' => $mostSold,
            'leastSold' => $leastSold,
        ];
    }

    public function soldItemToday() {
        $soldProduct = Product::join('product_variant_stocks as pvs', 'products.id', '=', 'pvs.product_id')
            ->where('pvs.stock', '<', '11')  
            ->select(
                'products.name as product_name', 
                'pvs.stock as product_stock' 
            )
            ->orderBy('pvs.stock')
            ->get(); 
    
        return $soldProduct; 
    }

    public function revenuePerMonth() {
        
        $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d');
        $endOfYear = Carbon::now()->endOfYear()->format('Y-m-d');
    
        $monthlyRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed')
            ->whereBetween('transactions.created_at', [$startOfYear, $endOfYear])
            ->selectRaw('DATE_PART(\'year\', transactions.created_at) as year, DATE_PART(\'month\', transactions.created_at) as month, SUM(transactions.total_paid) as total_revenue')
            ->groupBy(DB::raw('DATE_PART(\'year\', transactions.created_at), DATE_PART(\'month\', transactions.created_at)'))
            ->orderBy(DB::raw('DATE_PART(\'year\', transactions.created_at), DATE_PART(\'month\', transactions.created_at)'))
            ->get();
    
        $monthlyRevenueFormatted = $monthlyRevenue->map(function ($item) {
            $item->total_revenue;
            return $item;
        });
    
        return $monthlyRevenueFormatted;
    }

    public function index()
    {
        // Ambil data yang diperlukan untuk tampilan laporan
        $revenueData = $this->revenue();
        $transactionData = $this->totalTransaction();
        $monthlyRevenueData = $this->revenuePerMonth();
        $itemSoldData = $this->itemSold();
        $rankSoldItemData = $this->rankSoldItem();
    
        // Tampilkan view dengan data yang diperlukan
        return view('pages.owner.laporan', [
            'revenue' => $revenueData['totalRevenue'],
            'totalTransaction' => $transactionData['totalTransaksi'],
            'monthlyRevenue' => $monthlyRevenueData,
            'itemSold' => $itemSoldData['totalItemTerjual'],
            'rankSoldItem' => $rankSoldItemData
        ]);
    }
    public function laporanView(Request $request)
    {
        // Ambil rentang tanggal dari input
        $rentangTanggal = $request->input('rentang_tanggal');
        $tanggal = explode(" to ", $rentangTanggal);

        $startDate = $tanggal[0] ?? null;
        $endDate = $tanggal[1] ?? $tanggal[0] ?? null;

        // Query untuk total revenue
        $totalRevenueQuery = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $totalRevenueQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        } else {
            $totalRevenueQuery->whereDate('transactions.created_at', Carbon::today());
        }

        $totalRevenue = $totalRevenueQuery->sum('transactions.total_paid');

        // Query untuk total transaksi
        $totalTransactionQuery = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $totalTransactionQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        } else {
            $totalTransactionQuery->whereDate('transactions.created_at', Carbon::today());
        }

        $totalTransaction = $totalTransactionQuery->count();

        // Query untuk total barang terjual
        $itemSoldQuery = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('transactions', 'orders.id', '=', 'transactions.order_id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $itemSoldQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        } else {
            $itemSoldQuery->whereDate('transactions.created_at', Carbon::today());
        }

        $itemSold = $itemSoldQuery->sum('order_items.quantity');

        // Laporan Bulanan
        $monthlyRevenueQuery = Transaction::selectRaw('MONTH(created_at) as month, SUM(total_paid) as total_revenue')
            ->join('orders', 'transactions.order_id', '=', 'orders.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $monthlyRevenueQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        }

        $monthlyRevenue = $monthlyRevenueQuery->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Barang Terlaris
        $mostSoldQuery = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('transactions', 'orders.id', '=', 'transactions.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $mostSoldQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        }

        $mostSold = $mostSoldQuery->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderByDesc('total_quantity')
            ->first();

        // Barang Paling Sedikit Terjual
        $leastSoldQuery = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('transactions', 'orders.id', '=', 'transactions.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('transactions.payment_status', 'settlement')
            ->where('orders.order_status', 'completed');

        if ($startDate && $endDate) {
            $leastSoldQuery->whereBetween('transactions.created_at', [$startDate, $endDate]);
        }

        $leastSold = $leastSoldQuery->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('products.name')
            ->orderBy('total_quantity')
            ->first();

        // Kirim data ke view
        return view('pages.owner.laporan', [
            'totalRevenue' => $totalRevenue,
            'totalTransaction' => $totalTransaction,
            'itemSold' => $itemSold,
            'monthlyRevenue' => $monthlyRevenue,
            'rankSoldItem' => [
                'mostSold' => $mostSold,
                'leastSold' => $leastSold
            ]
        ]);        
    }    
    
   
    // public function revenuePerMonth() {
    //     $startDate = Carbon::now()->startOfYear(); 
    //     $endDate = Carbon::now()->endOfYear(); 

    //     $monthlyRevenue = Transaction::join('orders', 'transactions.order_id', '=', 'orders.id')
    //         ->where('transactions.payment_status', 'settlement')
    //         ->where('orders.order_status', 'completed')
    //         ->whereBetween('transactions.created_at', [$startDate, $endDate])
    //         ->selectRaw('MONTH(transactions.created_at) as month, SUM(transactions.total_paid) as total_revenue')
    //         ->groupBy('month')
    //         ->orderBy('month', 'asc')
    //         ->get();

    //     $revenueData = [];
    //     $categories = [];

    //     foreach ($monthlyRevenue as $data) {
    //         $revenueData[] = (int) $data->total_revenue;
    //         $categories[] = Carbon::createFromFormat('m', $data->month)->format('M');
    //     }

    //     return response()->json([
    //         'data' => $revenueData,
    //         'categories' => $categories
    //     ]);
    // }
    
    
    
}    