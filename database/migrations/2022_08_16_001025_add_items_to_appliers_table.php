<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('appliers', function (Blueprint $table) {
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->foreignId('platform_id')->nullable()->constrained('platforms')->onDelete('cascade');
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('cascade');
            $table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('cascade');
            $table->foreignId('perfil_id')->nullable()->constrained('perfils')->onDelete('cascade');
            $table->foreignId('turn_id')->nullable()->constrained('turns')->onDelete('cascade');
            $table->time('fecha_postulacion')->nullable();
            $table->string('wsp_status')->nullable();
            $table->text('observacion')->nullable();
            $table->string('device')->nullable();
            $table->string('ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appliers', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('image');
            $table->dropColumn('gender');
            $table->dropColumn('country_id');
            $table->dropColumn('platform_id');
            $table->dropColumn('division_id');
            $table->dropColumn('areas_id');
            $table->dropColumn('perfils_id');
            $table->dropColumn('turns_id');
            $table->dropColumn('fecha_postulacion');
            $table->dropColumn('wsp_status');
            $table->dropColumn('observacion');
            $table->dropColumn('device');
            $table->dropColumn('ip');
        });
    }
};
