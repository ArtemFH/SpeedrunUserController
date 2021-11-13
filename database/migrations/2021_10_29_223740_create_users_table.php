<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique(true)->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->string('password', 255)->nullable(false);
            $table->foreignId('role_id')->nullable()->default(1)->constrained('roles')->onDelete('cascade');
            $table->boolean('banned')->nullable(false)->default(false);
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
}
