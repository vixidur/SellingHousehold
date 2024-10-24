<?php
// app/Http/Controllers/CategoryController.php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('categories.index')->with('success', 'Danh mục sản phẩm đã được thêm thành công!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Thay đổi danh mục sản phẩm thành công!.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
    
        // Xóa tất cả các sản phẩm liên quan đến danh mục này
        $category->products()->delete();
    
        // Sau đó mới xóa danh mục
        $category->delete();
    
        return redirect()->route('categories.index')->with('success', 'Đã xoá danh mục sản phẩm có ID là ' . $id . ' !');
    }    
}
