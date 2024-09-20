<?php

use App\Models\Party;
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
        Schema::create('guests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(Party::class)->nullable()->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('type')->default(0);
            $table->boolean('all_day')->default(false);
            $table->boolean('attending')->default(false);
            $table->date('rsvp_at')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
