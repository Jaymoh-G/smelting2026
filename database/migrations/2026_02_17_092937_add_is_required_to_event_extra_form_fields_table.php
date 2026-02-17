<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRequiredToEventExtraFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_extra_form_fields', function (Blueprint $table) {
            $table->boolean('is_required')->default(false)->after('name_of_form_field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_extra_form_fields', function (Blueprint $table) {
            $table->dropColumn('is_required');
        });
    }
}
