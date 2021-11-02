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

            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->unsignedBigInteger('to');
            $table->foreign('to')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->enum('status', ['delivered', 'accepted'])->default('delivered');
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
