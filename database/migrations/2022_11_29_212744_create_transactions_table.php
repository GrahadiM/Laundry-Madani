<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('code_order')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('employe_id')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('order_by'); // pakai kurir atau tidak
            $table->string('status'); // Pending, Proses, Success
            $table->integer('total')->nullable();
            $table->string('bukti_tf')->nullable();
            $table->timestamp('tgl_penjemputan')->nullable();
            $table->timestamp('tgl_pengantaran')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
