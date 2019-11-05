<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('section_id');
            $table->integer('category_id');
            $table->integer('region_id');
            $table->integer('district_id');
            $table->integer('suburb_id');
            $table->integer('plan_id')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->string('title')->nullable();
            $table->string('contact', 500)->nullable();
            $table->text('address');
            $table->float('geocode_lng',  9, 6);
            $table->float('geocode_lat',  9, 6);
            $table->string('short_description', 1024)->nullable();
            $table->text('full_description')->nullable();
            $table->string('video', 1000)->nullable();
            $table->boolean('price_negotiable')->default(0);
            $table->integer('min_area')->nullable();
            $table->integer('max_area')->default(0);
            $table->integer('min_capacity')->nullable();
            $table->integer('max_capacity')->default(0);
            $table->integer('min_cost')->nullable();
            $table->integer('max_cost')->default(0);
            $table->boolean('outgoings')->default(0);
            $table->boolean('expiry_notification')->default(0);
            $table->integer('current_step')->default(1);
            $table->boolean('archived')->default(0);
            $table->timestamp('listed_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->enum('status', ['archived', 'disabled', 'enabled', 'expired', 'suspended']);
            $table->datetime('published_at')->nullable();
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
        Schema::dropIfExists('listings');
    }
}
