<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->integer('sex')->nullable();
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->integer('trainer_id')->nullable()->comment('担当トレーナー');
            $table->string('class_id')->nullable()->comment('クラス');
            $table->text('comment')->nullable()->comment('備考');
            $table->boolean('status_flg')->nullable()->comment('ステータス');
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
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
