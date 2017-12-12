<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateManagepeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managepeople', function (Blueprint $table) {
            $table->string('nic');
            $table->string('name');
            $table->string('designation');
            $table->string('description');
            $table->double('longatude',16,3)->nullable();
            $table->double('latitude',16,3)->nullable();
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
        Schema::dropIfExists("managepeople");
    }
}