<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('name',255)->default('')->comment('姓名');
            $table->unsignedInteger('age')->default('0')->comment('年龄');
            $table->unsignedInteger('sex')->default('10')->comment('性别');
            $table->integer('created_at')->default('0')->comment('新增时间');
            $table->integer('updated_at')->default('0')->comment('修改时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
