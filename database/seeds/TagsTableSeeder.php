<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
          1 => 'Branding',
          2 => 'Ilustración',
          3 => 'Lettering',
          4 => 'Comunicación'
        ];

        foreach ($tags as $tag => $props) {
          $tag = \App\Tag::create([
            "name" => $props
          ]);
        }
    }
}
