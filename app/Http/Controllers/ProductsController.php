<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariantStock;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{

    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'nullable|exists:categories,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric',
                'image' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'has_variant' => 'boolean',
                'is_available' => 'boolean',
            ]);
    
            $validatedData = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'has_variant' => $request->has_variant ?? false,
                'is_available' => $request->is_available ?? true,
            ];
    
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
    
                $path = Storage::putFile('public/product', $photo);
    
                $url = Storage::url($path);
    
                $validatedData['image'] = $url;
            }
    
            $product = Product::create($validatedData);
    
            return redirect()->route('view-products')->with('create_success', 'Product inserted successfully.');
        } catch (\Exception $e) {
            dd("Failed.", $e->getMessage());
            return redirect()->route('view-products')->with('create_failed', 'Failed to insert product.');
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
    
            $request->validate([
                'category_id' => 'nullable|exists:categories,id',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'nullable|numeric',
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
                'has_variant' => 'boolean',
                'is_available' => 'boolean',
            ]);
    
            $validatedData = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'has_variant' => $request->has_variant ?? false,
                'is_available' => $request->is_available ?? true,
            ];
    
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $path = Storage::putFile('public/product', $photo);
                $url = Storage::url($path);
                $validatedData['image'] = $url;
            }
    
            $product->update($validatedData);
    
            return redirect()->route('view-products')->with('edit_success', 'Product updated successfully.');
        } catch (\Exception $e) {
            dd("Failed.", $e->getMessage());
            return redirect()->route('view-products')->with('edit_failed', 'Failed to update product.');
        }
    }
    
    public function delete($id)
    {
        try {
            $deleted = DB::table('products')
                ->where('id', $id)
                ->delete();
            
            return redirect()->route('view-products')->with('delete_success', 'Product variant stock deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('view-products')->with('delete_failed', 'Failed to delete product variant: ' . $e->getMessage());
        }
    }

    public function addVariants(Request $request, $id)
    {
        try {
            $request->validate([
                'variant_ids' => 'required|array',
                'variant_ids.*' => 'nullable|exists:variants,id',
                'additional_price' => 'nullable|numeric',
                'stock' => 'nullable|integer',
                'isAvailable' => 'boolean'
            ]);
    
            $productVariantStock = DB::table('product_variant_stocks')->insert([
                'product_id' => $id,
                'variant_ids' => json_encode($request->variant_ids) ?? [],
                'additional_price' => $request->additional_price ?? 0.00,
                'stock' => $request->stock ?? 0,
                'isAvailable' => $request->is_available ?? true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('view-product-detail', ['id' => $id])->with('create_success', 'Product variant stock inserted successfully.');
        } catch (\Exception $e) {
            dd("Failed to insert product variant stock", $e->getMessage());
            return redirect()->route('view-product-detail', ['id' => $id])->with('create_failed', 'Failed to insert product variant.');
        }
    }
    
    public function editVariants(Request $request, $id, $variant_id)
    {
        try {
            // Validasi input (jika diperlukan)
            $request->validate([
                'variant_ids' => 'required|array',
                'variant_ids.*' => 'nullable|exists:variants,id',
                'additional_price' => 'nullable|numeric',
                'stock' => 'nullable|integer',
            ]);
    
            // Mengupdate data di tabel product_variant_stocks
            $updated = DB::table('product_variant_stocks')
                ->where('product_id', $id)
                ->where('id', $variant_id)
                ->update([
                    'variant_ids' => json_encode($request->variant_ids) ?? [],
                    'additional_price' => $request->additional_price ?? 0.00,
                    'stock' => $request->stock ?? 0,
                    'updated_at' => now(),
                ]);
    
            if ($updated) {
                return redirect()->route('view-product-detail', ['id' => $id])->with('edit_success', 'Product variant stock updated successfully.');
            } else {
                return redirect()->route('view-product-detail', ['id' => $id])->with('edit_failed', 'No changes were made to the product variant.');
            }
        } catch (\Exception $e) {
            // Menampilkan pesan kesalahan jika terjadi error
            dd("Failed to update product variant stock", $e->getMessage());
            return redirect()->route('view-product-detail', ['id' => $id])->with('edit_failed', 'Failed to update product variant.');
        }
    }    
    
    public function deleteVariant($id, $variant_id)
    {
        try {
            $deleted = DB::table('product_variant_stocks')
                ->where('product_id', $id)
                ->where('id', $variant_id)
                ->delete();
            
            return redirect()->route('view-product-detail', ['id' => $id])->with('delete_success', 'Product variant stock deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('view-product-detail', ['id' => $id])->with('delete_failed', 'Failed to delete product variant: ' . $e->getMessage());
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
