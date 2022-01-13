<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypecourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typecourts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name2')->nullable()->default(null);
            $table->string('role')->nullable()->default(null);
            $table->string('number')->nullable()->default(null);
            $table->integer('court_id')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
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
        Schema::dropIfExists('typecourts');
    }
}
