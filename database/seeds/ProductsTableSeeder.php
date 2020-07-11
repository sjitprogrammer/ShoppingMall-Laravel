<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $product = new App\Product([
        'image' => 'https://smartsolutioncomputer.com/upload-img/Products/New-Products/28b76728c9abcb2a39dceb037100b811.jpg',
        'title' =>'NoteBook Lenovo',
        'description'=>'LENOVO โน๊ตบุ๊ค (15.6", Intel Core i7, Ram 16GB, 512GB) รุ่น LEGION Y540-15IRH I7-9750HF + กระเป๋า',
        'price'=>24900
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/5ed2f00955b25870bedac8ad6e63a693',
        'title' =>'NoteBook HP',
        'description'=>'ฟรี!ของแถม 6 รายการ Notebook HP 15-DB0080AX (Silver)',
        'price'=>17000
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/eb3df3ce75b432a9edee335a0a5c9508',
        'title' =>'NoteBook Samsung',
        'description'=>'LENOVO โน๊ตบุ๊ค (15.6", Intel Core i7, Ram 16GB, 512GB) รุ่น LEGION Y540-15IRH I7-9750HF + กระเป๋า',
        'price'=>18900
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/2b93ce19c364f0cbed33c4e40c4e6477',
        'title' =>'NoteBook Dell',
        'description'=>'[ใส่ Code TQKPLAD ลดสูงสุด 700.-]Notebook Dell Inspiron 3593 (W566115401OPPTHW10) Black',
        'price'=>13500
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/b93fd5a40eeba8b1075f03d5d2372e60',
        'title' =>'NoteBook Acer',
        'description'=>'[ใส่ Code TQKPLAD ลด 700.-]ACER NOTEBOOK NITRO 5 AN515-55-517N # NH.Q7QST.001',
        'price'=>33250
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/12f151b24dce783d629fea00c218815f',
        'title' =>'NoteBook MSI',
        'description'=>'MSI Gaming Notebook GF75 Thin 10SER-269TH',
        'price'=>25000
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/9cdf39ecfc6b10dee6c8d9b1e64e6ec3',
        'title' =>'MacBook Pro 2013',
        'description'=>'MacBook Pro (13" Late 2016 ) Touch Bar Core i5 2.9GHz Ram 8GB SSD 256GB',
        'price'=>31500
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/471a33f701b6ce340deef71cea1c2f13',
        'title' =>'NoteBook Asus',
        'description'=>'ASUS ROG STRIX G15 GL542LI-HN053T/I5-10300H/8 GB/512 GB PCIe/NVMe M.2/15.6"144Hz/GTX1650TI/WINDOWS 10/BY NOTEBOO',
        'price'=>21500
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/9ac287bacf15f2584645c68a76b74b5c',
        'title' =>'NoteBook Acer Swift',
        'description'=>'โน้ตบุ๊ค Notebook Acer Swift SF114-32-P8PS/T001 (Gold)',
        'price'=>13900
       ]);
       $product->save();
       $product = new App\Product([
        'image' => 'https://cf.shopee.co.th/file/42cb13fd3e11ec996efab33f59c90224',
        'title' =>'MSI Gaming notebook ',
        'description'=>'[ลด5% : TQKPLAD ]MSI Gaming notebook GF63 Thin 10SCSR 220TH',
        'price'=>33490
       ]);
       $product->save();
    }
}
