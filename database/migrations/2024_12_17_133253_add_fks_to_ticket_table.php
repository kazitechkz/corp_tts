<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFksToTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->boolean("is_reopen")->nullable()->after("user_id");
            $table->dateTime("reopen_at")->nullable()->after("user_id");
            $table->dateTime("deadline_date")->nullable()->after("user_id");
            $table->foreignId("status_id")->nullable()->after("user_id")->references("id")->on("ticket_status")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("deadline_id")->nullable()->after("user_id")->references("id")->on("ticket_deadlines")->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("executor_id")->nullable()->after("user_id")->references("id")->on("users")->nullOnDelete()->cascadeOnDelete();
            $table->string("category_value")->nullable()->after("user_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['deadline_id']);
            $table->dropForeign(['executor_id']);
            $table->dropColumn([
                'is_reopen',
                'reopen_at',
                'deadline_date',
                'status_id',
                'deadline_id',
                'executor_id',
                'category_value'
            ]);
        });
    }
}
