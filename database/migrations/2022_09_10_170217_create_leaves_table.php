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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type')->unique();
            $table->string('date_from');
            $table->string('date_to');
            $table->string('description')->nullable();

            $table->foreignId('emp_id')
                ->nullable()
                ->constrained('users','id')
                ->nullOnDelete();

            $table->enum('status',['waiting','approved','rejected'])->default('waiting');

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
        Schema::dropIfExists('leaves');
    }
};
