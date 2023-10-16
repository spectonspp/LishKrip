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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('username', 50)->unique();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 200);
            $table->string('address', 255);
            $table->string('tel', 10);
            $table->string('status', 1)->default('1');
            $table->rememberToken();
            $table->enum('role', ['ADMIN', 'USER'])->default('USER');
            $table->foreignId('product_interest')->constrained('product_types', 'protype_id');
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
        Schema::dropIfExists('users');
    }
};
