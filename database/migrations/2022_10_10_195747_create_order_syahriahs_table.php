<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_syahriahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('number', 16);
            $table->decimal('total_price', 12, 2);
            $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal');
            $table->string('snap_token', 36)->nullable();
            $table->uuid('syahriah_id');
            $table->timestamps();

            $table->foreign('syahriah_id')
                ->references('id')
                ->on('syahriahs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_syahriahs');
    }
};
