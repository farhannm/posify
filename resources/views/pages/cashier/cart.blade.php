<!-- resources/views/pages/cashier/cart.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Belanja</h2>
    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Varian</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            @if($item['variant'])
                                @foreach($item['variant'] as $key => $value)
                                    <span>{{ $key }}: {{ $value }}</span><br>
                                @endforeach
                            @else
                                Tidak ada varian
                            @endif
                        </td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['total'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Keranjang belanja Anda kosong.</p>
    @endif
</div>
@endsection
