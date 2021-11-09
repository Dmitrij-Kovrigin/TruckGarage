<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Dimi',
            'email' => 'dmitrij.kovrigin@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $maker = [
            'Gräf & Stift',
            'BelAZ',
            'ÖAF',
            'Tatra',
            'Scania',
            'Peugeot'
        ];

        $plate = [
            '12458965',
            '21899565566',
            '12215484',
            '121549594',
            '2154848451',
            '659566559'
        ];

        $years = [
            2000,
            1999,
            2001,
            2002,
            2003,
            2004,
            2005,
            2006
        ];

        $notices = [
            'Technology – the sum of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.',
            'People – plurality of persons considered as a whole, as is the case with an ethnic group or nation.',
            'Religions – social-cultural systems of designated behaviors and practices, morals, worldviews, texts, sanctified places, prophecies, ethics, or organizations, that relates humanity to supernatural, transcendental, or spiritual elements',
            'Natural science – branch of science concerned with the description, prediction, and understanding of natural phenomena, based on empirical evidence from observation and experimentation.'
        ];

        $name = [
            'John',
            'Frenk',
            'Isner',
            'Kory',
            'Blake',
            'Tim',
            'Harden',
            'LeBron',
            'James',
            'Ozy'
        ];

        $surname = [
            'White',
            'Black',
            'Green',
            'Brown',
            'Grey',
            'Duncan',
            'McLoud',
            'Shwarz',
            'Stilwart',
            'Kennedy'
        ];

        $truckImage = [
            'http://localhost/truck_garage/public/img/truck-image1.png',
            'http://localhost/truck_garage/public/img/truck-image2.ipg',
            'http://localhost/truck_garage/public/img/truck-image3.jpg',
            'http://localhost/truck_garage/public/img/truck-image4.jpg',
            'http://localhost/truck_garage/public/img/truck-image5.jpg',
            'http://localhost/truck_garage/public/img/truck1.jfif',
            'http://localhost/truck_garage/public/img/truck2.jfif',
            'http://localhost/truck_garage/public/img/truck3.jfif',
            'http://localhost/truck_garage/public/img/truck4.jfif',
            'http://localhost/truck_garage/public/img/truck5.jfif',
            'http://localhost/truck_garage/public/img/truck6.jfif',
            'http://localhost/truck_garage/public/img/truck7.jfif'
        ];

        foreach (range(1, 10) as $key => $_) {

            DB::table('mechanics')->insert([

                'name' => $name[$key],
                'surname' => $surname[$key]
            ]);
        }


        foreach (range(1, 30) as $_) {

            DB::table('trucks')->insert([
                'maker' => $maker[rand(0, count($maker) - 1)],
                'image' => $truckImage[rand(1, count($truckImage) - 1)],
                'plate' => $plate[rand(0, count($plate) - 1)],
                'make_year' => $years[rand(0, count($years) - 1)],
                'mechanic_notices' => $notices[rand(0, count($notices) - 1)],
                'mechanic_id' => rand(1, 10)
            ]);
        }
    }
}
