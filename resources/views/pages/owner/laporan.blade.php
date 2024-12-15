<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-5xl mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-center mb-6">Laporan Penjualan</h1>

            <!-- Form Rentang Tanggal -->
            <form method="GET" action="{{ route('laporan') }}" class="mb-6">
                <div class="flex space-x-4 items-center">
                    <label for="rentang_tanggal" class="font-semibold">Pilih Rentang Tanggal:</label>
                    <input type="text" name="rentang_tanggal" id="rentang_tanggal" 
                           placeholder="YYYY-MM-DD to YYYY-MM-DD" value="{{ request('rentang_tanggal') }}"
                           class="p-2 border rounded w-64" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Filter
                    </button>
                </div>
            </form>

            <!-- Ringkasan Laporan -->
            <div class="mb-6 p-4 bg-blue-50 rounded-lg">
                <h2 class="text-xl font-semibold mb-2">Ringkasan Laporan</h2>
                {{-- <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalRevenue ?? 0, 2, ',', '.') }}</p> --}}
                <p><strong>Total Transaksi:</strong> {{ $totalTransaction ?? 0 }} transaksi</p>
                <p><strong>Total Barang Terjual:</strong> {{ $itemSold ?? 0 }} barang</p>
                <p><strong>Rentang Waktu:</strong> {{ $rentangTanggal ?? 'Hari Ini' }}</p>
            </div>            

            <!-- Laporan Bulanan -->
            <h2 class="text-xl font-semibold mb-4">Laporan Bulanan</h2>
            <table class="w-full border-collapse border border-gray-200 text-sm mb-6">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Bulan</th>
                        <th class="border px-4 py-2 text-left">Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyRevenue as $monthData)
                    <tr>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::createFromFormat('m', $monthData->month)->format('F') }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($monthData->total_revenue, 2, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            

            <!-- Barang Terlaris -->
            <h2 class="text-xl font-semibold mb-4">Barang Terlaris</h2>
            <table class="w-full border-collapse border border-gray-200 text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Nama Barang</th>
                        <th class="border px-4 py-2 text-left">Total Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">{{ $rankSoldItem['mostSold']->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $rankSoldItem['mostSold']->total_quantity ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">{{ $rankSoldItem['leastSold']->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $rankSoldItem['leastSold']->total_quantity ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>            

            <!-- Tombol Download PDF -->
            <div class="flex justify-end mt-6">
                <button id="downloadPdf" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Download PDF
                </button>
            </div>
        </div>
    </div>

    <!-- jsPDF dan AutoTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.getElementById("downloadPdf").addEventListener("click", function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
    
            // Judul Laporan
            doc.setFontSize(18);
            doc.text("Laporan Penjualan", 105, 20, null, null, "center");
    
            // Ambil data dari Blade dengan json_encode
            const totalRevenue = {!! json_encode(number_format($totalRevenue ?? 0, 2, ',', '.')) !!};
            const totalTransaction = {!! json_encode($totalTransaction ?? 0) !!};
            const itemSold = {!! json_encode($itemSold ?? 0) !!};
            const monthlyRevenue = {!! json_encode($monthlyRevenue) !!};
            const rankSoldItem = {!! json_encode($rankSoldItem) !!};
    
            // Ringkasan Laporan
            doc.setFontSize(12);
            doc.text("Ringkasan Laporan", 20, 40);
            doc.text(`Total Transaksi: ${totalTransaction} transaksi`, 20, 60);
            doc.text(`Total Barang Terjual: ${itemSold} barang`, 20, 70);
    
            // Tabel Laporan Bulanan
            doc.text("Laporan Bulanan", 20, 90);
            const monthlyData = monthlyRevenue.map(item => [
                item.month || 'N/A', 
                `Rp ${Number(item.total_revenue).toLocaleString("id-ID")}`
            ]);
    
            doc.autoTable({
                startY: 100,
                head: [['Bulan', 'Revenue']],
                body: monthlyData.length > 0 ? monthlyData : [['-', '-']],
            });
    
            // Barang Terlaris
            doc.text("Barang Terlaris", 20, doc.lastAutoTable.finalY + 10);
            const bestSellingItems = [
                ['Barang Terlaris', rankSoldItem?.mostSold?.name || 'N/A', rankSoldItem?.mostSold?.total_quantity || 0],
                ['Barang Paling Sedikit', rankSoldItem?.leastSold?.name || 'N/A', rankSoldItem?.leastSold?.total_quantity || 0],
            ];
    
            doc.autoTable({
                startY: doc.lastAutoTable.finalY + 20,
                head: [['Keterangan', 'Nama Barang', 'Total Terjual']],
                body: bestSellingItems,
            });
    
            // Simpan file PDF
            doc.save("laporan-penjualan.pdf");
        });
    </script>                                                     
</body>

</html>
