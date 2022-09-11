<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\Expenses;
use App\Models\GlobalSetting;
use App\Models\Notice;
use App\Models\pCategory;
use App\Models\PurchaseItem;
use App\Models\PurchaseUnit;
use App\Models\Salary;
use App\Models\SaleItem;
use App\Models\SaleUnit;
use App\Models\sCategory;
use App\Models\Speech;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Admin::create([
            'name' => 'KS Sadi',
            'email' => 'mdsadi4@gmail.com',
            'username' => 'sadi',
            'phone' => '01741022832',
            'password' => Hash::make('sadi123'),

        ]);
       GlobalSetting::create([
           'full_name' => 'Notre Dame College',
           'bn_name' => 'নটর ডেম কলেজ',
           'short_name' => 'NDCM',
           'address' => 'Mymensigh',
           'email' => 'demo@gmail.com',
           'phone' => '01700000000',
           'icon' => 'upload/XEMwtJaRWP6JHCvxWK2MxjQ77zHltq1JN7mXKeyd.png',
           'logo' => 'upload/HVL5wl3Zptc3qcSExoPrjKmoSlL3AVlcOSgCZIRS.png',
       ]);

       Speech::create([
           'head_teacher_name' => 'Khaled Saifullah Sadi',
           'president_name' => 'Mazharul Haque',
           'head_teacher_designation' => 'Chairman',
           'president_designation' => 'President',
           'head_teacher_image' => 'upload/FxEx10bPAwaRdfc1eNBfjxnuC0ELWT5yz5Yv7PVB.jpg',
           'president_image' => 'upload/pnSJZKecNfiNHH4A6MPQRGdhqmJImzRNty2HIg88.png',
           'head_teacher_massage' => 'Demo Name',
           'president_massage' => 'Demo Name',
       ]);
       Notice::create([
           'title' => 'Demo Notice',
           'notice_file' => 'notice/cqfcPQvvll1HngbpgC8akjA5bV9WCgGw4aXOv4PN.pdf',
           'description' => 'Demo Notice',
           'date' => '2022-09-16',
       ]);
        Notice::create([
            'title' => 'Sample Title',
            'description' => 'Welcome to our school',
            'notice_file' => 'notice/cqfcPQvvll1HngbpgC8akjA5bV9WCgGw4aXOv4PN.pdf',
            'date' => '2022-10-16',
        ]);

    }
}
