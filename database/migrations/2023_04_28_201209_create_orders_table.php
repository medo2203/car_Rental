<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')
                    ->constrained('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreignId('carId')
                    ->constrained('cars')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('pick_up_location');
            $table->date('pick_up_date');
            $table->time('pick_up_time');
            $table->string('drop_off_location');
            $table->date('drop_off_date');
            $table->time('drop_off_time');
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }

    public function validateOrder($id)
    {

        $order = Order::findOrFail($id);
        dd($order);
        $order->validated = true;
        $order->save();

        return redirect()->route('Orders.show');
    }

};
