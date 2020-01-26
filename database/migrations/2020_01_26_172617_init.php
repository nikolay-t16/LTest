<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->integer('ticket_id')->autoIncrement();
            $table->integer('user_id')->index();
            $table->boolean('open')->index()->default(1);
            $table->string('name', 255);
        });

        Schema::create('ticket_msg', function (Blueprint $table) {
            $table->integer('ticket_msg_id')->autoIncrement();
            $table->integer('ticket_id')->index();
            $table->integer('user_id')->index();
            $table->string('text');
        });

        Schema::create('user', function (Blueprint $table) {
            $table->integer('user_id')->autoIncrement();
            $table->string('login', 100)->unique();
            $table->boolean('is_admin')->index()->default(0);
        });

        // Insert some stuff
        DB::table('user')->insert(
            [
                'login' => 'admin',
                'is_admin' => 1,
            ]
        );
        DB::table('user')->insert(['login' => 'user1']);
        DB::table('user')->insert(['login' => 'user2']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket');
        Schema::drop('ticket_msg');
        Schema::drop('user');
    }
}
