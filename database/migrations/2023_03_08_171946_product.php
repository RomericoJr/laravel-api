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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table ->unsignedBigInteger('categoria_id')->nullable();
            $table ->unsignedBigInteger('marca_id')->nullable();

            $table->foreign('categoria_id')
                    ->references('id')->on('categorias')
                    ->onDelete('set null');

            $table->foreign('marca_id')
                    ->references('id')->on('marcas')
                    ->onDelete('set null');

            //$table->string('categoria');
            //$table->string('marca');
            $table->text('descripcion');
            $table->decimal('precio');
            $table->integer('stock');
            $table->text('UrlImage');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('products');

    }
};
