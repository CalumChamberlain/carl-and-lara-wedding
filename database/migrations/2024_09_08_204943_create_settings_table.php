<?php

use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Setting::create([
            'key' => 'app_name',
            'value' => 'Wedding Planner',
        ]);

        Setting::create([
            'key' => 'wedding_date',
            'value' => null,
        ]);

        Setting::create([
            'key' => 'wedding_venue',
            'value' => null,
        ]);

        Setting::create([
            'key' => 'wedding_venue_address',
            'value' => [
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
