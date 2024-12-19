<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketsCategoryValueToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_executors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->references("id")->on("ticket_categories")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("category_value");
            $table->foreignId("executor_id")->nullable()->references("id")->on("users")->nullOnDelete()->cascadeOnDelete();
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
        Schema::dropIfExists('ticket_executors');
    }
}
