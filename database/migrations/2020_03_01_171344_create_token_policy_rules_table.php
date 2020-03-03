<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenPolicyRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('token_policy_rules', function (Blueprint $table) {
            $table->increments('id');
            //FK
            $table->bigInteger('token_policy_id')->nullable()->unsigned();
            $table->foreign('token_policy_id')->references('id')->on('token_policies')->unsigned();
            $table->bigInteger('policy_rule_id')->nullable()->unsigned();
            $table->foreign('policy_rule_id')->references('id')->on('policy_rules')->unsigned();
            
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
        Schema::dropIfExists('token_policy_rules');
    }
}
