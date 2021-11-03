<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')
                   ->references('id')
                   ->on('users')
                   ->cascadeOnDelete();

            $table->unsignedBigInteger('sent_to');
            $table->foreign('sent_to')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();

            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                    ->references('id')
                    ->on('invoices')
                    ->cascadeOnDelete();

            $table->date('date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__invoices');
    }
}
