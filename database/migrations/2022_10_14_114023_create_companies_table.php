<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        // Schema::dropIfExists('companies');
        // DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
