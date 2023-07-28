<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(ModelHasRoleTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(FilmsSeeder::class);
        $this->call(FilmCountrySeeder::class);
        $this->call(FilmGanreySeeder::class);
        $this->call(TicketPriceSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(FilmRatingSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
