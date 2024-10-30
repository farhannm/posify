<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariantStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function store(Request $request)
    {
        try {
            // Validasi input (jika diperlukan)
            $request->validate([
                'category_id' => 'nullable|exists:categories,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric',
                'image' => 'nullable|string',
                'has_variant' => 'boolean',
                'is_available' => 'boolean',
            ]);
    
            // Menyimpan data produk
            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'has_variant' => $request->has_variant ?? false,
                'is_available' => $request->is_available ?? true,
            ]);
    
            return redirect()->route('view-products')->with('create_success', 'Product inserted successfully.');
        } catch (\Exception $e) {
            // dd("Data gagal disimpan", $e->getMessage());
            return redirect()->route('view-products')->with('create_failed', 'Failed to insert product.');

        }
    }

    public function addVariants(Request $request, $id)
    {
        try {
            // Validasi input (jika diperlukan)
            $request->validate([
                'variants' => 'required|array',
                'variants.*.type' => 'required|string',
                'variants.*.size' => 'required|string',
                'variants.*.flavour' => 'required|string',
                'variants.*.stock' => 'required|integer',
                'variants.*.price' => 'required|numeric',
            ]);

            // Menyimpan data variant
            foreach ($request->variants as $variant) {
                $variantData = [
                    'product_id' => $id,
                    'variant_ids' => json_encode([$variant['type'], $variant['size'], $variant['flavour']]),
                    'additional_price' => $variant['price'],
                    'stock' => $variant['stock'],
                    'isAvailable' => true,
                ];

                ProductVariantStock::create($variantData);
            }

            dd($variantData);
            return redirect()->route('view-variants')->with('create_success', 'Variant inserted successfully.');
        } catch (\Exception $e) {
            dd("Data gagal disimpan", $e->getMessage());
            return redirect()->route('view-variants')->with('create_failed', 'Failed to insert variant.');
        }
    }



    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'category_id' => 'nullable|exists:categories,id',
    //         'description' => 'nullable|string',
    //         'price' => 'nullable|numeric|min:0',
    //         'image' => 'nullable|file|image|max:2048',
    //         'variants' => 'nullable|array',
    //         'variants.*.ids' => 'required|array',  // Id varian harus berupa array
    //         'variants.*.additional_price' => 'required|numeric|min:0',
    //         'variants.*.stock' => 'required|integer|min:0',
    //     ]);

    //     try {
    //         DB::beginTransaction();

    //         // Upload image jika ada
    //         $imagePath = $request->file('image') 
    //             ? $request->file('image')->store('products', 'public') 
    //             : null;

    //         // Simpan produk ke tabel products
    //         $product = Product::create([
    //             'name' => $validated['name'],
    //             'category_id' => $validated['category_id'],
    //             'description' => $validated['description'],
    //             'price' => $validated['price'],
    //             'image' => $imagePath,
    //             'has_variant' => !empty($validated['variants']),  // True jika ada varian
    //             'is_available' => false, // Akan diperbarui berdasarkan stok
    //         ]);

    //         $totalStock = 0;  // Untuk menghitung total stok

    //         // Jika ada varian, simpan ke product_variant_stocks
    //         if (!empty($validated['variants'])) {
    //             foreach ($validated['variants'] as $variant) {
    //                 ProductVariantStock::create([
    //                     'product_id' => $product->id,
    //                     'variant_ids' => json_encode($variant['ids']), // Simpan varian dalam bentuk JSON
    //                     'additional_price' => $variant['additional_price'],
    //                     'stock' => $variant['stock'],
    //                     'isAvailable' => $variant['stock'] > 0, // True jika stok > 0
    //                 ]);

    //                 $totalStock += $variant['stock']; // Tambah stok varian ke total stok
    //             }
    //         } else {
    //             // Jika tidak ada varian, simpan stok default sebagai 0
    //             ProductVariantStock::create([
    //                 'product_id' => $product->id,
    //                 'variant_ids' => json_encode([]),  // Tidak ada varian
    //                 'additional_price' => 0,
    //                 'stock' => 0,
    //                 'isAvailable' => false,  // Tidak tersedia karena stok 0
    //             ]);
    //         }

    //         // Update kolom is_available pada tabel products
    //         $product->update([
    //             'is_available' => $totalStock > 0,  // True jika ada stok
    //         ]);

    //         DB::commit();

    //         return redirect()->back()->with('success', 'Product added successfully!');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->withErrors(['error' => 'Failed to add product: ' . $e->getMessage()]);
    //     }
    // }
}
