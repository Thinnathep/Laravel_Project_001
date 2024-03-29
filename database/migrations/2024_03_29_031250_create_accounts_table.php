<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // เพิ่มคอลัมน์ name
            $table->string('email')->unique(); // เพิ่มคอลัมน์ email และต้องมีค่าที่ไม่ซ้ำ
            $table->string('password'); // เพิ่มคอลัมน์ passwork และต้องมีค่าที่ไม่ซ้ำ
            $table->boolean('is_available')->default(true); // เพิ่มคอลัมน์ status และต้องมีค่าที่ไม่ซ้ำ
            $table->unsignedBigInteger('room_id')->nullable(); // เพิ่มคอลัมน์ room_id
            $table->unsignedBigInteger('room_status_id')->nullable(); // เพิ่มคอลัมน์ room_status_id

            // เพิ่ม foreign key constraint ถ้าต้องการ
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('room_status_id')->references('id')->on('room_status')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
