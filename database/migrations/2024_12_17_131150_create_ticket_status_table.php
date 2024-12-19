<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_status', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("value");
            // Внешние ключи для prev_id и next_id
            $table->unsignedBigInteger('prev_id')->nullable();
            $table->unsignedBigInteger('next_id')->nullable();
            // Флаги is_first и is_last
            $table->boolean('is_first')->default(false);
            $table->boolean('is_last')->default(false);
            // Определяем связи для prev_id и next_id
            $table->foreign('prev_id')->references('id')->on('ticket_status')->nullOnDelete();
            $table->foreign('next_id')->references('id')->on('ticket_status')->nullOnDelete();
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
        Schema::dropIfExists('ticket_status');
    }
}
