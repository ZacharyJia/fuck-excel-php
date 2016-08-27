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
        $sql = <<<SQL
CREATE TABLE "users" (
    id integer NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(150) NOT NULL,
    type character varying(20) NOT NULL,
    tags character varying(50)[],
    extra_data json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);
SQL;
        DB::statement($sql);

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
