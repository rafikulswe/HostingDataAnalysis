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
        Schema::create('main_d_b_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 50);
            $table->string('phone', 30);
            $table->string('ip', 100);
            $table->string('card_name', 150);
            $table->text('card_details')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('main_d_b_tables');
    }
};
