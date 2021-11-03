<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->integer('crate');
            $table->integer('delivery');
            $table->float('weight');
            $table->string('product')->default('มังคุด');
            $table->float('price');
            $table->enum('status', ['กำลังจัดส่ง', 'ได้รับสินค้าแล้ว'])->default('กำลังจัดส่ง');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
