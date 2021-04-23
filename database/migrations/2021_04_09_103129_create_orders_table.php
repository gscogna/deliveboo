<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->string('nome')->nullable();
            $table->float('prezzo_totale', 6, 2)->nullable();
            $table->string('indirizzo_consegna');
            $table->string('email')->nullable();
            $table->boolean('pagamento_avvenuto');
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
        Schema::dropIfExists('orders');
    }
}
