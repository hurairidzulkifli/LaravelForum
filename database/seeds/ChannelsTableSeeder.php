<?php

use Illuminate\Database\Seeder;
use LaravelForum\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Channel::create([
            'name'=>'Laravel 5.8',
            'slug'=>str_slug('Laravel 5.8')
        ]);

        Channel::create([
            'name'=>'Vue JS',
            'slug'=>str_slug('Vue JS')
        ]);

        Channel::create([
            'name'=>'Tailwind CSS',
            'slug'=>str_slug('Tailwind CSS')
        ]);

        Channel::create([
            'name'=>'Angular 8',
            'slug'=>str_slug('Angular 8')
        ]);

        Channel::create([
            'name'=>'Ionic 4',
            'slug'=>str_slug('Ionic 4')
        ]);
    }
}
