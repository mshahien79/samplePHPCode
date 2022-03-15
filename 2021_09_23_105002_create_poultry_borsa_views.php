<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultryBorsaViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE or replace VIEW customer_view AS
        (
         SELECT c.name AS cust_name,c.email AS cust_email,pk.poultry_kind_name AS pkname, pk.poultry_kind_name_ar AS pkname_ar, 
           pb.breed_name AS pbname, pb.breed_name_ar AS pbname_ar,cinv.poultry_sex AS psex,cinv.poultry_count AS pcount
  
          FROM `customers` c, `customer_inventory` cinv, `poultry_breeds` pb, `poultry_kinds` pk
          where c.id = cinv.cust_id and cinv.breed=pb.id and cinv.kind=pk.id
        )
      ");
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poultry_borsa_views');
    }
}
