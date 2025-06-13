<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}