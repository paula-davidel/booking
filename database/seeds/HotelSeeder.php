<?php

use Illuminate\Database\Seeder;
use App\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array of specific hotels to populate database
        $hotels = [
            [
                'name' => 'Hotel Ramada',
                'location' => 'Iasi',
                'description' => 'Hotelul este amplasat la kilometrul zero al orasului, chiar pe esplanada Complexului Comercial Palas, unul dintre cele mai noi si mai frumoase din intreaga Europa. Localizarea centrala, la numai 15 minute distanta de aeroport si la doar 7 minute de Gara Centrala, permite un acces extrem de facil catre hotel si atingerea oricarui punct de interes din oras in cel mai scurt timp. Apropierea de principalele obiective turistice precum si linistea zonei, ferite de traficul si agitatia urbana, ii asigura hotelului Ramada un amplasament ideal.',
                'image' => 'https://www.ramadaiasi.ro/wp-content/uploads/2017/02/Hotel_Ramada_Iasi_rooms_26.jpg'
            ],
            [
                'name' => 'Grand Hotel Traian',
                'location' => 'Iasi',
                'description' => 'Dear guests,

                We would like to offer you an unforgettable experience at the Grand Hotel Traian and that is why we have set a series of principles and rules that we respectfully ask you to take into account both during and after your stay.',
                'image' => 'https://www.grandhoteltraian.ro/wp-content/uploads/2019/10/single.jpg'
            ],
            [
                'name' => 'Hotel Bellaria',
                'location' => 'Iasi',
                'description' => 'Bellaria Hotel se distinge prin prin amplasamentul natural deosebit - pe dealurile Buciumului, excelent loc de reincarcare a bateriilor. Oaspetii sunt placuti impresionati de linistea locului, dar si de atentia acordata confortului in procesul decorarii celor 47 de camere.',
                'image' => 'https://www.bellaria.ro/uploads/imagini/GPfCo1DhEtkknzf2c6cQTZqc88FkYbBPZMrvqqPL.jpg'
            ],
            [
                'name' => 'Pensiunea Popasul Domnesc – Cazare Voronet Bucovina',
                'location' => 'Gura-Humorului',
                'description' => 'Apartament Popasul Domnesc ce ofera conditii excelente pentru familiile ceva mai numeroase. Este compus din dormitor cu pat matrimonial, living cu canapea extensibila.',
                'image' => 'https://popasuldomnesc.ro/wp-content/uploads/2018/05/apartament-1.jpg'
            ],
            [
                'name' => 'Perla Bucovinei - Cazare Voronet Bucovina',
                'location' => 'Gura-Humorului',
                'description' => 'Pensiunea Perla Bucovinei - Cazare Voronet Bucovina, este amplasata intr-o zona montana deosebit de pitoreasca si linistita, este ideala pentru petrecerea concediilor si a weekend-urilor, oferindu-va servicii de cazare si masa de inalta calitate. In aceasta locatie se pot organiza activitati de team-building si training.',
                'image' => 'http://www.perlabucovinei.ro/images/galerie/perla_bucovinei_01.jpg'
            ],
            [
                'name' => 'Hotel Best Western Bucovina',
                'location' => 'Gura-Humorului',
                'description' => 'Best Western Bucovina este singurul hotel din zona, cotat de 4 stele care poarta prestigiul unui lant hotelier international de renume. Situat la km 0 al orasului Gura Humorului, hotelul promite sa iti ofere o experienta desavarsita, cu servicii impecabile, atmosfera senina si chipuri zambitoare.',
                'image' => 'https://r-cf.bstatic.com/images/hotel/max1024x768/195/195739998.jpg'
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create(array(
                'name' => $hotel['name'],
                'location' => $hotel['location'],
                'description' => $hotel['description'],
                'image' => $hotel['image']
            ));
        }
    }
}