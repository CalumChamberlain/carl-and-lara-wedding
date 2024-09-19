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
            $table->string('key');
            $table->string('value');
            $table->timestamps();
        });

        Setting::create([
            'key' => 'app_name',
            'value' => 'Wedding Planner',
        ]);

        Setting::create([
            'key' => 'wedding_date',
            'value' => '2024-09-08',
        ]);

        Setting::create([
            'key' => 'wedding_venue',
            'value' => 'The Woods',
        ]);

        Setting::create([
            'key' => 'wedding_venue_address',
            'value' => [
                'address_1' => '123 Main St',
                'address_2' => 'Apt 1',
                'city' => 'New York',
                'state' => 'NY',
                'zip' => '10001',
                'country' => 'USA',
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
