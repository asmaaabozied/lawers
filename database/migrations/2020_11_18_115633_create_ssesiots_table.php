<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsesiotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('ssesiots', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('reason')->nullable()->default(null);
            $table->string('date')->nullable()->default(null);
            $table->string('decision')->nullable()->default(null);
            $table->integer('case_id')->nullable()->default(null);
            $table->integer('lawyer_id')->nullable()->default(null);
            $table->longText('notes')->nullable()->default(null);
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
        Schema::dropIfExists('ssesiots');
    }
}
