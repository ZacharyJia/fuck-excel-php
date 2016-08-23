<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100);
            $table->string('password', 150);
            $table->string('type', 20);
            $table->json('extra_data')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $sa = new \App\Models\User();
        $sa['username'] = 'jia199474';
        $sa['password'] = 'jiazequn';
        $sa['type'] = 'sa';
        $sa['tags'] = ['jia199474', 'jk1301'];
        $sa->save();

        $admin = new \App\Models\User();
        $admin['username'] = 'admin';
        $admin['password'] = 'admin888';
        $admin['type'] = 'admin';
        $admin['tags'] = ['admin', 'jk1301'];
        $admin->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
