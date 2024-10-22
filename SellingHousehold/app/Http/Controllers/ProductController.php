<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function showProducts()
    {
        $products = Product::all(); // Get all products from the database
        // Giả sử bạn muốn lấy các sản phẩm liên quan dựa trên danh mục của sản phẩm đầu tiên
        $relatedProducts = Product::where('category_id', 14)->limit(5)->get();

        // Pass the $products variable to the view
        return view('overview.overview', compact('products', 'relatedProducts'));
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'required|url', // Đảm bảo image_url là một URL hợp lệ
            'discount' => 'nullable|numeric|min:0|max:100',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url, // Lưu URL của ảnh
            'discount' => $request->discount,
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }


    public function edit($id)
    {
        // Fetch the product and categories
        $product = Product::findOrFail($id);
        $categories = Category::all();

        // Pass the product and categories to the edit view
        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        // Log::info('Discount value being updated: ' . $request->discount);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|string|max:255',
            'discount' => 'nullable|numeric|min:0|max:100' // Kiểm tra giá trị giảm
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
            'discount' => $request->discount, // Cập nhật giá giảm
        ]);

        return redirect()->route('products.index')->with('success', 'Thay đổi thông tin sản phẩm thành công!');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Đã xoá sản phẩm có ID là ' . $id . ' !');
    }

    public function showNoiChao()
    {
        return view('products.noi-chao');
    }
    public function showChao()
    {
        return view('products.chao');
    }
    public function showCoc()
    {
        return view('products.coc');
    }
    public function showBinh()
    {
        return view('products.binh');
    }
    public function showHop()
    {
        return view('products.hop');
    }
    public function showPhich()
    {
        return view('products.phich');
    }
}