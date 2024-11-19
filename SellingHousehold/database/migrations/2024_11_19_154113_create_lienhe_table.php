<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tạo các cột trong database
        Schema::create('lienhe', function (Blueprint $table) {
            $table->id('malienhe'); // Tạo khóa chính với tên malienhe
            $table->string('ten', 255); // Tên người liên hệ
            $table->string('email')->unique(); // Email
            $table->text('noi_dung'); // Nội dung liên hệ
            $table->timestamps(); // Tự động thêm cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhe');
    }
};
