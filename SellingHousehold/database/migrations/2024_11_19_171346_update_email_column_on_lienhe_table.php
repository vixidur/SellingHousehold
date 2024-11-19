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
        Schema::table('lienhe', function (Blueprint $table) {
            $table->dropUnique(['email']); // Xóa ràng buộc unique trên email
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lienhe', function (Blueprint $table) {
            $table->unique('email'); // Thêm lại ràng buộc unique nếu rollback
        });
    }
};
