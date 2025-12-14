<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Menu;
use App\Models\Outlet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('customer123'),
            'role' => 'customer',
            'phone' => '0812345678',
            'image' => 'storage/profile_image/ronaldo.jpeg'
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'phone' => '0812345678',
            'image' => 'storage/profile_image/messi.jpeg'
        ]);

        Menu::factory()->create([
            'name' => 'Malaysian Buttermilk Chicken',
            'image' => 'storage/menu_image/buttermilk.png',
            'description' => 'Malaysian buttermilk chicken is a rich and creamy dish featuring crispy fried chicken coated in a flavorful sauce made with butter, evaporated milk, curry leaves, and chili. It’s a perfect balance of savory, creamy, and mildly spicy flavors.',
            'type' => 'Ala Carte'
        ]);

        Menu::factory()->create([
            'name' => 'Wonton Noodle Soup',
            'image' => 'storage/menu_image/wonton.png',
            'description' => 'Wonton noodle soup is a comforting Chinese dish featuring delicate wontons filled with seasoned meat or shrimp, served in a flavorful clear broth with springy egg noodles. It’s often garnished with greens, green onions, and sometimes char siu (roast pork).',
            'type' => 'Ala Carte'
        ]);

        Menu::factory()->create([
            'name' => 'Sweet and Sour Chicken Hong Kong Style',
            'image' => 'storage/menu_image/sweetsour.png',
            'description' => 'Sweet and sour chicken Hong Kong style is a popular Chinese dish featuring crispy battered chicken pieces tossed in a vibrant, tangy sauce made with pineapple, bell peppers, and onions. The sauce balances sweet and tangy flavors, making it a delicious classic.',
            'type' => 'Ala Carte'
        ]);

        Menu::factory()->create([
            'name' => 'Har Gow (Hargau)',
            'image' => 'storage/menu_image/hargao.png',
            'description' => 'Har Gow (Hargau) is a classic dim sum dish consisting of delicate steamed dumplings filled with juicy shrimp. The translucent wrapper is soft yet slightly chewy, encasing the flavorful filling for a light and savory bite.',
            'type' => 'Dimsum'
        ]);

        Menu::factory()->create([
            'name' => 'Siu Mai (Shumai)',
            'image' => 'storage/menu_image/siumai.png',
            'description' => 'Siu Mai (Shumai) is a classic dim sum dumpling made with a thin wonton wrapper filled with a savory mixture of ground pork, shrimp, and seasonings. It’s steamed to perfection and often garnished with roe or diced carrot on top.',
            'type' => 'Dimsum'
        ]);

        Menu::factory()->create([
            'name' => 'Lo Mein',
            'image' => 'storage/menu_image/lomein.png',
            'description' => 'Lo Mein is a Chinese noodle dish made with soft, stir-fried wheat noodles tossed in a savory sauce, typically featuring soy sauce and sesame oil. It’s mixed with vegetables, protein (like chicken, beef, or shrimp), and sometimes a hint of garlic or ginger.',
            'type' => 'Ala Carte'
        ]);

        Menu::factory()->create([
            'name' => 'Chow Mein',
            'image' => 'storage/menu_image/chowmein.png',
            'description' => 'Chow Mein is a popular Chinese dish made with stir-fried noodles, vegetables, and protein (such as chicken, beef, or shrimp). The noodles are typically crispy or tender, depending on the style, and are tossed in a savory sauce made from soy sauce, oyster sauce, and seasonings.',
            'type' => 'Ala Carte'
        ]);


        Outlet::factory()->create([
            'address' => 'Pesanggrahan Rd. 125',
            'city' => 'West Jakarta',
            'open_time' => Carbon::createFromTime(8, 0, 0),
            'close_time' => Carbon::createFromTime(22, 0, 0)
        ]);

        Outlet::factory()->create([
            'address' => 'Malaka Rd.24',
            'city' => 'West Jakarta',
            'open_time' => Carbon::createFromTime(5, 0, 0),
            'close_time' => Carbon::createFromTime(0, 0, 0)
        ]);

        Outlet::factory()->create([
            'address' => 'Living World, Alama Sutera',
            'city' => 'South Tangerang',
            'open_time' => Carbon::createFromTime(9, 0, 0),
            'close_time' => Carbon::createFromTime(22, 0, 0)
        ]);

        Outlet::factory()->create([
            'address' => 'Supermall Karawaci, Benconngan',
            'city' => 'Tangerang',
            'open_time' => Carbon::createFromTime(9, 0, 0),
            'close_time' => Carbon::createFromTime(22, 0, 0)
        ]);

        Outlet::factory()->create([
            'address' => 'Boulevard Raya Rd. 7, Kelapa Gading',
            'city' => 'North Jakarta',
            'open_time' => Carbon::createFromTime(8, 0, 0),
            'close_time' => Carbon::createFromTime(22, 0, 0)
        ]);

        Booking::factory()->create([
            'user_id' => 1,
            'outlet_id' => 4,
            'date_time' => Carbon::now()->addDays(2)->setTime(19, 30),
            'guests' => 4
        ]);

    }
}
