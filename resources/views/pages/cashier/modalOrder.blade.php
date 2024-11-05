<x-app-layout>
    <!-- Modal untuk memilih varian dan kuantitas -->
    <div id="productModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-semibold mb-4">Pilih Varian dan Kuantitas</h2>
            
            <!-- Pilihan Varian -->
            <label class="block mb-2">Varian:</label>
            <select id="variant" class="w-full border border-gray-300 rounded-lg p-2 mb-4">
                <option value="variant1">Varian 1</option>
                <option value="variant2">Varian 2</option>
                <!-- Tambah varian lainnya -->
            </select>
            
            <!-- Pilihan Kuantitas -->
            <label class="block mb-2">Kuantitas:</label>
            <input type="number" id="quantity" min="1" value="1" class="w-full border border-gray-300 rounded-lg p-2 mb-4" />
            
            <!-- Tombol Add to Cart -->
            <button id="addToCartButton" class="bg-blue-500 text-white rounded-lg px-4 py-2">Add to Cart</button>
            <button onclick="closeModal()" class="ml-2 bg-gray-300 text-gray-700 rounded-lg px-4 py-2">Close</button>
        </div>
    </div>

    <!-- Produk dengan Tombol "Add to Cart" -->
    <div class="product-item">
        <img src="product_image_url" alt="Product Image">
        <h3>Nama Produk</h3>
        <p>Rp. Harga Produk</p>
        <button onclick="openModal(productId)">Add to Cart</button> <!-- Pastikan `productId` dinamis -->
    </div>
</x-app-layout>


