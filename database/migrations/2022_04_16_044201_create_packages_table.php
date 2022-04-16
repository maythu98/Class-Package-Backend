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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('pack_id')->unique();
            $table->string('pack_name');
            $table->text('pack_description')->nullable();
            $table->string('pack_type')->default("non_shareable");
            $table->unsignedInteger('total_credit')->default(0);
            $table->string('tag_name')->nullable();
            $table->unsignedInteger('validity_month')->default(0);
            $table->decimal('pack_price', 10, 2)->default(0);
            $table->boolean('first_attend')->default(1);
            $table->unsignedInteger('additional_credit')->default(0)->nullable();
            $table->text('note')->nullable();
            $table->string('pack_alias')->nullable();
            $table->decimal('estimate_price', 10, 2)->default(0);
            $table->timestamps();
            //Index
            $table->index(['pack_name', 'pack_type', 'pack_alias']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
