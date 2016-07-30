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
        
        $this->call('StateTableSeeder');
        
        //$this->call('EpworkplanTableSeeder');
        //$this->call('WorkplanTableSeeder');
        //$this->call('DocsTableSeeder');
        //$this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
