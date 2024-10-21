<?php
// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    // method hasMany: Định nghĩa một mối quan hệ 1-nhiều
    // Tức là trong bảng sản phẩm có nhiều danh mục nồi
    // => khi xoá Danh mục: nôi thì tất cả các sản phẩm liên quan đến nồi đều bị xoá
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
