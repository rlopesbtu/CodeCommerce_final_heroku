<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREING_KEY_CHECKS=0;');

        $this->call('CategoryTableSeeder');
        $this->call('ProductTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('OrderStatusTableSeeder');

        DB::statement('SET FOREING_KEY_CHECKS=1;');

        Model::reguard();
    }
}
