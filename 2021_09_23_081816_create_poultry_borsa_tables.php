<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultryBorsaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('customers');
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('email',200)->unique();
            $table->string('customer_address',500);
            $table->string('customer_contact1',25);
            $table->string('customer_contact2',25);
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('customer_inventory');
        Schema::create('customer_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->smallInteger('breed');
            $table->smallInteger('kind');
            $table->string('poultry_sex',8);
            $table->integer('poultry_count');
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('poultry_breeds');
        Schema::create('poultry_breeds', function (Blueprint $table) {
            $table->id();
            $table->string('breed_name',200);
            $table->string('breed_name_ar',200);
            $table->string('description',500);
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('poultry_kinds');      
        Schema::create('poultry_kinds', function (Blueprint $table) {
            $table->id();
            $table->string('poultry_kind_name',200);
            $table->string('poultry_kind_name_ar',200);
            $table->string('description',500);
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('purchases');      
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->integer('user_id');
            $table->smallInteger('breed');
            $table->smallInteger('kind');
            $table->string('poultry_sex',8);
            $table->integer('poultry_count');
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('customer_notifications');      
        Schema::create('customer_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->integer('user_id');
            $table->smallInteger('breed');
            $table->smallInteger('kind');
            $table->string('poultry_sex',8);
            $table->integer('poultry_count');
            $table->string('user_message',500);          
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::dropIfExists('user_confirmations');      
        Schema::create('user_confirmations', function (Blueprint $table) {
            $table->id();
            $table->integer('cust_id');
            $table->integer('user_id');
            $table->smallInteger('breed');
            $table->smallInteger('kind');
            $table->string('poultry_sex',8);
            $table->integer('poultry_count');
            $table->string('customer_message',500);          
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_inventory');
        Schema::dropIfExists('poultry_breeds');
        Schema::dropIfExists('poultry_kinds');  
        Schema::dropIfExists('purchases');  
        Schema::dropIfExists('customer_notifications');  
        Schema::dropIfExists('user_confirmations');  
    }
}
