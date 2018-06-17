<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('catergories')->insert([
           array(
               'name' => 'Nam',
               'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
               'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
           ),
            array(
                'name' => 'Nữ',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),

        ]);

        DB::table('catergory_details')->insert([
            //Nam
            array(
                'catergory_id' => '1',
                'code' => 'QAM0',
                'description' => 'Áo thun cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '1',
                'code' => 'QAM1',
                'description' => 'Quần dài cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '1',
                'code' => 'QAM2',
                'description' => 'Áo khoác cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '1',
                'code' => 'GDM0',
                'description' => 'Dép sandals cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '1',
                'code' => 'GDM1',
                'description' => 'Giầy thể thao cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '1',
                'code' => 'GDM2',
                'description' => 'Giầy da cho nam',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            //Het Nam

            //Nu
            array(
                'catergory_id' => '2',
                'code' => 'QAN0',
                'description' => 'Áo thun cho nu',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '2',
                'code' => 'QAN1',
                'description' => 'Quần dài cho nu',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '2',
                'code' => 'QAN2',
                'description' => 'Áo khoác cho nu',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '2',
                'code' => 'GDN0',
                'description' => 'Dép sandals cho nu',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '2',
                'code' => 'GDN1',
                'description' => 'Giầy thể thao cho nu',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergory_id' => '2',
                'code' => 'GDN2',
                'description' => 'Giầy da cho n',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            //Het Nu

        ]);

        //Product
        DB::table('products')->insert([
            array(
                'catergorydetails_code' => 'QAM0',
                'name' => 'Áo T-Shirt 1',
                'price' => '100000',
                'imagefront' => '/img/product2.jpg',
                'imageback' => '/img/product2_2.jpg',
                'mainimage' => '/img/detailbig1.jpg',
                'mainsquare' => '/img/detailsquare.jpg',
                'detailimagetwo' => '/img/detailbig2.jpg',
                'detailsquaretwo' => '/img/detailsquare2.jpg',
                'detailimagethree' => '/img/detailbig3.jpg',
                'detailsquarethree' => '/img/detailsquare3.jpg',
                'event_code' => '',
                'detail' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
                'material' => 'Polyester',
                'care' => 'Machine wash',
                'size' => 'The model (height 5\'8" and chest 33") is wearing a size S',
                'fit' => 'Regular fit',
                'advice' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
                'brands' => 'Armani',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergorydetails_code' => 'QAM1',
                'name' => 'Áo T-Shirt 3',
                'price' => '100000',
                'imagefront' => '/img/product2.jpg',
                'imageback' => '/img/product2_2.jpg',
                'mainimage' => '/img/detailbig1.jpg',
                'mainsquare' => '/img/detailsquare.jpg',
                'detailimagetwo' => '/img/detailbig2.jpg',
                'detailsquaretwo' => '/img/detailsquare2.jpg',
                'detailimagethree' => '/img/detailbig3.jpg',
                'detailsquarethree' => '/img/detailsquare3.jpg',
                'event_code' => '',
                'detail' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
                'material' => 'Polyester',
                'care' => 'Machine wash',
                'size' => 'The model (height 5\'8" and chest 33") is wearing a size S',
                'fit' => 'Regular fit',
                'advice' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
                'brands' => 'Armani',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergorydetails_code' => 'QAM0',
                'name' => 'Áo T-Shirt 2',
                'price' => '150000',
                'imagefront' => '/img/product2.jpg',
                'imageback' => '/img/product2_2.jpg',
                'mainimage' => '/img/detailbig1.jpg',
                'mainsquare' => '/img/detailsquare.jpg',
                'detailimagetwo' => '/img/detailbig2.jpg',
                'detailsquaretwo' => '/img/detailsquare2.jpg',
                'detailimagethree' => '/img/detailbig3.jpg',
                'detailsquarethree' => '/img/detailsquare3.jpg',
                'event_code' => '',
                'detail' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
                'material' => 'Polyester',
                'care' => 'Machine wash',
                'size' => 'The model (height 5\'8" and chest 33") is wearing a size S',
                'fit' => 'Regular fit',
                'advice' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
                'brands' => 'Armani',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergorydetails_code' => 'GDM0',
                'name' => 'Dép sandals nam 1',
                'price' => '150000',
                'imagefront' => '/img/product2.jpg',
                'imageback' => '/img/product2_2.jpg',
                'mainimage' => '/img/detailbig1.jpg',
                'mainsquare' => '/img/detailsquare.jpg',
                'detailimagetwo' => '/img/detailbig2.jpg',
                'detailsquaretwo' => '/img/detailsquare2.jpg',
                'detailimagethree' => '/img/detailbig3.jpg',
                'detailsquarethree' => '/img/detailsquare3.jpg',
                'event_code' => '',
                'detail' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
                'material' => 'Polyester',
                'care' => 'Machine wash',
                'size' => 'The model (height 5\'8" and chest 33") is wearing a size S',
                'fit' => 'Regular fit',
                'advice' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
                'brands' => 'Armani',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'catergorydetails_code' => 'QAM1',
                'name' => 'Áo nam ',
                'price' => '150000',
                'imagefront' => '/img/product2.jpg',
                'imageback' => '/img/product2_2.jpg',
                'mainimage' => '/img/detailbig1.jpg',
                'mainsquare' => '/img/detailsquare.jpg',
                'detailimagetwo' => '/img/detailbig2.jpg',
                'detailsquaretwo' => '/img/detailsquare2.jpg',
                'detailimagethree' => '/img/detailbig3.jpg',
                'detailsquarethree' => '/img/detailsquare3.jpg',
                'event_code' => '',
                'detail' => 'White lace top, woven, has a round neck, short sleeves, has knitted lining attached',
                'material' => 'Polyester',
                'care' => 'Machine wash',
                'size' => 'The model (height 5\'8" and chest 33") is wearing a size S',
                'fit' => 'Regular fit',
                'advice' => 'Define style this season with Armani\'s new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.',
                'brands' => 'Armani',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),


        ]);

        DB::table('pricefilters')->insert([
            array(
                'description' => '<= 100.000 VNĐ',
                'code' => 'B001',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'description' => '> 100.000  <= 500.000 VNĐ ',
                'code' => 'I015',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'description' => '> 500.000  <= 1.000.000 VNĐ',
                'code' => 'I510',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),
            array(
                'description' => '> 1.000.000 VNĐ',
                'code' => 'G010',
                'created_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh')),
                'updated_at' => Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'))
            ),

        ]);
    }





}
