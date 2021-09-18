<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('sex')->nullable();
            $table->date('birthday')->nullable()->comment('生年月日');
            $table->integer('club_id')->nullable()->comment('所属');
            $table->boolean('create_flg')->nullable()->comment('コース作成フラグ');
            $table->integer('category_id')->nullable()->comment('カテゴリ');
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
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
        Schema::dropIfExists('trainers');
    }
}
