<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('event_payments')) {
            return;
        }

        Schema::create('event_payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10,2);
            $table->unsignedBigInteger('registrant_id');
            $table->unsignedBigInteger('event_id');
            $table->string('MerchantRequestID')->nullable();
            $table->string('CheckoutRequestID')->nullable();
            $table->string('ResponseCode')->nullable();
            $table->string('CustomerMessage')->nullable();
            $table->string('MpesaReceiptNumber')->nullable();
            $table->string('TransactionDate')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->integer('payment_status')->nullable()->default(0);
            $table->timestamps();
            $table->string('cert_sent_at')->nullable();

            $table->foreign('registrant_id')
                ->references('id')
                ->on('event_registrations');

            $table->foreign('event_id')
                ->references('id')
                ->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_payments');
    }
}
