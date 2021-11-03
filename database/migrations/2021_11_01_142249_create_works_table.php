<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->default('เก็บผลไม้');
            $table->date('date');

            $table->unsignedBigInteger('assign_by');
            $table->foreign('assign_by')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->enum("payment_status", ["ยังไม่จ่ายค่าจ้าง", "จ่ายค่าจ้างแล้ว"])->default("ยังไม่จ่ายค่าจ้าง");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
