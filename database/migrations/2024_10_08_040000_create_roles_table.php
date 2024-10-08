<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Role name (e.g., user, admin, super_admin)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['name' => 'user', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'super_admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
