<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('company');
            $table->string('from');
            $table->string('to');
            $table->longText('achievements');
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        DB::table('experiences')->insert(

            [
                'title' => 'Software Engineer',
                'location' => 'Dar es Salaam',
                'company' => 'Multics Systems',
                'from' => '10/2020',
                'to' => 'Present',
                'achievements' =>
                '<div> 
                    <p>Develop Agriculture Dashboard for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks.</p>
                    <p>Develop Agriculture crops-stock dynamic web system and offline mobile app for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks.</p>
                    <p>Develop Budget, Expenditure, CPA & CSR, Administration and Fleet modules (ERP) for Tanzania National Housing Corporation(NHC) using Django python framework.</p>
                    <p>Develop strong experience on working with Git Version Control System while working on the ERP system.</p>
                    <p>Gained the presentation skills since as a developer i was involved in presenting the products to the customers as well as training them on how to use the product.</p>
                    <p>Develop an offline mobile app using Flutter for the Tanzania Ministry of Agriculture (MoA).</p>
                </div>',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};
