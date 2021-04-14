<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('SearchDate');
            $table->integer('NationalId');
            $table->string('phone');
            $table->string('AddressId', 300);
            $table->string('currentAddress', 300);
            $table->string('ResidenceStatus');
            $table->string('valueRent')->nullable();
            $table->string('IncomeMethod');
            $table->string('IncomeValue');
            $table->string('SocialStatus');
            $table->string('HealthStatus');
            $table->string('MedicalCondition')->nullable();
            $table->string('HusbundOrWifeName')->nullable();
            $table->string('HusbundOrWifeId')->nullable();
            $table->string('HusbundOrWifePhone')->nullable();
            $table->string('HusbundOrWifeAddress', 300)->nullable();
            $table->string('HusbundOrWifeCurrentAddress', 300)->nullable();
            $table->string('HusbundOrWifeJob')->nullable();
            $table->string('firstPersonName')->nullable();
            $table->string('firstPersonType')->nullable();
            $table->string('firstPersonId')->nullable();
            $table->string('secondPersonName')->nullable();
            $table->string('secondPersonType')->nullable();
            $table->string('secondPersonId')->nullable();
            $table->string('thirdPersonName')->nullable();
            $table->string('thirdPersonType')->nullable();
            $table->string('thirdPersonId')->nullable();
            $table->string('fourthPersonName')->nullable();
            $table->string('fourthPersonType')->nullable();
            $table->string('fourthPersonId')->nullable();
            $table->string('fifthPersonName')->nullable();
            $table->string('fifthPersonType')->nullable();
            $table->string('fifthPersonId')->nullable();
            $table->string('sixPersonName')->nullable();
            $table->string('sixPersonType')->nullable();
            $table->string('sixPersonId')->nullable();
            $table->string('sevenPersonName')->nullable();
            $table->string('sevenPersonType')->nullable();
            $table->string('sevenPersonId')->nullable();
            $table->string('eightPersonName')->nullable();
            $table->string('eightPersonType')->nullable();
            $table->string('eightPersonId')->nullable();
            $table->string('ninePersonName')->nullable();
            $table->string('ninePersonType')->nullable();
            $table->string('ninePersonId')->nullable();
            $table->string('tenPersonName')->nullable();
            $table->string('tenPersonType')->nullable();
            $table->string('tenPersonId')->nullable();
            $table->unsignedBigInteger('charity_id');
            $table->foreign('charity_id')->references('id')->on('branches')->onDelete('cascade');

            // $table->string('NumberOfWifesForMan');
            // $table->string('ResearcherDesicion');
            // $table->string('GirlsNumber');
            // $table->string('BoysNumber');
            // $table->string('ChildrenFromOtherHusbund');
            // $table->string('ChildrenFromOtherWife');
            // $table->string('MarriedChildrens');
            // $table->string('EducationStages');


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
        Schema::dropIfExists('details');
    }
}
