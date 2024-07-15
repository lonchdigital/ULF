<?php

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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('VehicleId')->nullable();
            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->boolean('HasGasInstallation')->nullable();
            $table->boolean('HasGuarantee')->nullable();
            $table->boolean('HasDealer')->nullable();
            $table->boolean('HasAddonTyres')->nullable();
            $table->boolean('HasAirbag')->nullable();
            $table->boolean('HasAirbagDr')->nullable();
            $table->boolean('HasAirbagFull')->nullable();
            $table->boolean('HasAirbagSide')->nullable();
            $table->boolean('HasAirConditioning')->nullable();
            $table->boolean('HasAirFlowSeats')->nullable();
            $table->boolean('HasAlloyWheels')->nullable();
            $table->boolean('HasBackCamera')->nullable();
            $table->boolean('HasCentralLocking')->nullable();
            $table->boolean('HasChangedGlasses')->nullable();
            $table->boolean('HasClimatControl')->nullable();
            $table->boolean('HasClimatControl2')->nullable();
            $table->boolean('HasCloth')->nullable();
            $table->boolean('HasClothLeather')->nullable();
            $table->boolean('HasCruiseControl')->nullable();
            $table->boolean('HasElectroTrunk')->nullable();
            $table->boolean('HasGasInstallation2')->nullable();
            $table->boolean('HasHeadlightWasher')->nullable();
            $table->boolean('HasHeatingMirrors')->nullable();
            $table->boolean('HasHeatingSeatDr')->nullable();
            $table->boolean('HasHeatingSeats')->nullable();
            $table->boolean('HasImmobilizer')->nullable();
            $table->boolean('HasJack')->nullable();
            $table->boolean('HasKeyBalloon')->nullable();
            $table->boolean('HasLeather')->nullable();
            $table->boolean('HasLightSensor')->nullable();
            $table->boolean('HasNavigationSystem')->nullable();
            $table->boolean('HasOnboardComputer')->nullable();
            $table->boolean('HasPanorama')->nullable();
            $table->boolean('HasPowerMirrors')->nullable();
            $table->boolean('HasPowerSteering')->nullable();
            $table->boolean('HasPowerWindows')->nullable();
            $table->boolean('HasPowerWindowsFront')->nullable();
            $table->boolean('HasPrivateOwner')->nullable();
            $table->boolean('HasPublicOwner')->nullable();
            $table->boolean('HasRadio')->nullable();
            $table->boolean('HasRadioAux')->nullable();
            $table->boolean('HasRadioCd')->nullable();
            $table->boolean('HasRadioUsb')->nullable();
            $table->boolean('HasRainSensor')->nullable();
            $table->boolean('HasRemoteStart')->nullable();
            $table->boolean('HasSafeAbs')->nullable();
            $table->boolean('HasSafeEsc')->nullable();
            $table->boolean('HasSafeParktronic')->nullable();
            $table->boolean('HasSalonCleaner')->nullable();
            $table->boolean('HasSalonColorDark')->nullable();
            $table->boolean('HasSalonColorLight')->nullable();
            $table->boolean('HasSaintood')->nullable();
            $table->boolean('HasSalonPaint')->nullable();
            $table->boolean('HasSalonRenew')->nullable();
            $table->boolean('HasSalonRepair')->nullable();
            $table->boolean('HasSeat2Electro')->nullable();
            $table->boolean('HasSeat2Hand')->nullable();
            $table->boolean('HasSeat2Memory')->nullable();
            $table->boolean('HasSeatElectro')->nullable();
            $table->boolean('HasSeatHand')->nullable();
            $table->boolean('HasSeatHandHeight')->nullable();
            $table->boolean('HasSeatMemory')->nullable();
            $table->boolean('HasSignaling')->nullable();
            $table->boolean('HasSignalingFeedback')->nullable();
            $table->boolean('HasSmellBurning')->nullable();
            $table->boolean('HasSmellCatsDogs')->nullable();
            $table->boolean('HasSmellCigarettes')->nullable();
            $table->boolean('HasSmellClean')->nullable();
            $table->boolean('HasSmellFuel')->nullable();
            $table->boolean('HasSmellOther')->nullable();
            $table->boolean('HasSmellSwamp')->nullable();
            $table->boolean('HasSpareWheel')->nullable();
            $table->boolean('HasStartstopSystem')->nullable();
            $table->boolean('HasSteeringWheel1m')->nullable();
            $table->boolean('HasSteeringWheel2m')->nullable();
            $table->boolean('HasSteeringWheelElectro')->nullable();
            $table->boolean('HasSunRoof')->nullable();
            $table->boolean('HasSuspensionHydraulic')->nullable();
            $table->boolean('HasSuspensionMechanic')->nullable();
            $table->boolean('HasSuspensionPnevmo')->nullable();
            $table->boolean('HasToning')->nullable();
            $table->boolean('HasXenon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
