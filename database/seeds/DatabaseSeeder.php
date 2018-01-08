<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = '<b>Википедия</b> — общедоступная многоязычная универсальная <i>интернет-энциклопедия</i> со 
        свободным контентом, реализованная на принципах вики. 
        Расположена по <a href="http://www.wikipedia.org">адресу</a>.';

        DB::table('pages')->insert([
            'name' => 'Page 1',
            'code' => 'page1',
            'text' => $text,
            'path' => 'page1',
            'level' => 1,
        ]);

        DB::table('pages')->insert([
            'name' => 'Page 11',
            'code' => 'page11',
            'text' => $text,
            'path' => 'page1/page11',
            'level' => 2,
        ]);

        DB::table('pages')->insert([
            'name' => 'Page 12',
            'code' => 'page12',
            'text' => $text,
            'path' => 'page1/page12',
            'level' => 2,
        ]);

        DB::table('pages')->insert([
            'name' => 'Page 121',
            'code' => 'page121',
            'text' => $text,
            'path' => 'page1/page12/page121',
            'level' => 3,
        ]);

        DB::table('pages')->insert([
            'name' => 'Page 2',
            'code' => 'page2',
            'text' => $text,
            'path' => 'page2',
            'level' => 1,
        ]);


    }


}
