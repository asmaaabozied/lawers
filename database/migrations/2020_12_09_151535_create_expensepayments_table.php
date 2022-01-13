<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expensepayments', function (Blueprint $table) {
            $table->id();
            $table->decimal('value');
            $table->timestamp('date')->nullable()->default(null);
            $table->longText('details')->nullable()->default(null);
            $table->integer('case_id')->nullable()->default(null);
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
        Schema::dropIfExists('expensepayments');
    }
}
