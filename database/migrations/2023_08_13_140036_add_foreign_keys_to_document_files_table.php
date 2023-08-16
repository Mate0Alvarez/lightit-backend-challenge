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
        Schema::table('document_files', function (Blueprint $table) {
            $table->foreign(['patient_id'], 'fk_document_files_patients')->references(['id'])->on('patients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_files', function (Blueprint $table) {
            $table->dropForeign('fk_document_files_patients');
        });
    }
};
