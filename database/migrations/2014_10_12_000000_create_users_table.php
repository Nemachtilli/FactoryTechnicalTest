<?php

use App\Enums\PlanType;
use App\Enums\ActiveType;
use App\Enums\BusinessType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('hs_id');
            $table->string('mec_id');
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->foreignId('region_id')->references('id')->on('regions');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('name');
            $table->string('phone');
            $table->string('postal');
            $table->string('email')->unique();
            $table->string('email2')->unique();
            $table->string('website')->unique();
            $table->string('fax')->unique();
            $table->string('address');
            $table->string('address_short');
            $table->string('latitude');
            $table->string('longitude');
            $table->enum('plan_preference', PlanType::forMigration());
            $table->string('leads');
            $table->enum('business_status', BusinessType::forMigration());
            $table->string('google_user_ratings_total');
            $table->string('google_rating');
            $table->string('revisor');
            $table->enum('active', ActiveType::forMigration());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
