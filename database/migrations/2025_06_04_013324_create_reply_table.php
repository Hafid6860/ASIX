<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('replied_by')->nullable()->after('status');
            $table->text('reply_message')->nullable()->after('replied_by');
            $table->timestamp('replied_at')->nullable()->after('reply_message');

            $table->foreign('replied_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['replied_by']);
            $table->dropColumn(['replied_by', 'reply_message', 'replied_at']);
        });
    }
};
