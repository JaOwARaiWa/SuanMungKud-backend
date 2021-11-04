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
            $table->enum('is_finished', ['กำลังทำ','เสร็จสิ้น'])->default("กำลังทำ");

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
                
            $table->date('date')->default(date("Y-m-d"));
            $table->enum("payment_status", ["ยังไม่ได้ค่าจ้าง", "ได้ค่าจ้างแล้ว"])->default("ยังไม่ได้ค่าจ้าง");
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
