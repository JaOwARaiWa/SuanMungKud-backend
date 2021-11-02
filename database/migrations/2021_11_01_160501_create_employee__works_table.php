<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_works', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_finished')->default(0);

            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')
                  ->references('id')
                  ->on('works')
                  ->cascadeOnDelete();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee__works');
    }
}
