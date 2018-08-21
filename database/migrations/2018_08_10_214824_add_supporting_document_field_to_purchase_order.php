<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSupportingDocumentFieldToPurchaseOrder extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_headers', function (Blueprint $table) {
            $table->string('supporting_document_url', 255)->after('vendor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_headers', function (Blueprint $table) {
            $table->dropColumn('supporting_document_url');
        });
    }

}
