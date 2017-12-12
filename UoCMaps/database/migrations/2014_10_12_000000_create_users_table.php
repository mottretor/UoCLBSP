<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('title')->default(0);
            $table->string('name')->required();
            $table->string('email')->unique();
            $table->string('nic')->unique();
            $table->string('job_title')->required();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->boolean('approve')->default(0);
            $table->string('description')->default($null=true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
