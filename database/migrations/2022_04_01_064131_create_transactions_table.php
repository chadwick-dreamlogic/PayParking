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
            $table->bigInteger('user_id')->unsigned();
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->index('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->bigInteger('pass_id')->unsigned();
            $table->index('pass_id');
            $table->foreign('pass_id')->references('id')->on('packages');
            $table->string('bank_transaction_id');
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->string('status');
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('users_user_id_foreign');
            $table->dropIndex('users_user_id_index');
            $table->dropColumn('user_id');

            $table->dropForeign('vehicles_vehicle_id_foreign');
            $table->dropIndex('vehicles_vehicle_id_index');
            $table->dropColumn('vehicle_id');

            $table->dropForeign('users_pass_id_foreign');
            $table->dropIndex('users_pass_id_index');
            $table->dropColumn('pass_id');
        });
        Schema::dropIfExists('transactions');
    }
}
