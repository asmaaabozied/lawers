<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('code');
            $table->string('number')->unique();
            $table->decimal('price')->nullable()->default(null);
            $table->longText('notes')->nullable()->default(null);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('auto_no')->nullable()->default(null);
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');


            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
