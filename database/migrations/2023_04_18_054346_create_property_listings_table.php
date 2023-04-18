<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('offer_status')->nullable();
            $table->text('code')->nullable();

            $table->text('marketing_date')->nullable();

            $table->text('no')->nullable();
            $table->text('road')->nullable();

            $table->text('township_id')->nullable();
            $table->text('ward')->nullable();
            $table->integer('property_type_id')->nullable();

            $table->text('floor')->nullable();
            $table->text('house_style')->nullable();
            $table->text('price')->nullable();

            $table->text('rent_offer_contract_status')->nullable();
            $table->text('deposit_amount')->nullable();
            $table->text('area_width')->nullable();
            $table->text('area_height')->nullable();
            $table->text('area')->nullable();
            $table->text('area_type')->nullable();

            $table->text('bcc_status')->nullable();
            $table->text('owner_status')->nullable();

            $table->text('lift_status')->nullable();
            $table->text('property_status')->nullable();

            $table->text('extra_charge')->nullable();

            $table->text('rooms')->nullable();
            $table->text('shrine')->nullable();
            $table->text('bathrooms')->nullable();
            $table->text('dining')->nullable();
            $table->text('living')->nullable();
            $table->text('bedrooms')->nullable();
            $table->text('master_bedrooms')->nullable();
            $table->text('other_rooms')->nullable();

            $table->text('permission_type')->nullable();
            $table->text('grant_type')->nullable();
            $table->text('orginal_or_copy')->nullable();

            $table->text('owner_agent')->nullable();
            $table->text('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('remark')->nullable();

            $table->text('photo_status')->nullable();

            $table->integer('user_id')->nullable();

            $table->text('reject_status')->nullable();
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
        Schema::dropIfExists('property_listings');
    }
}
