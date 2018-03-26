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
        
        $this->call(ContactCompanySeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(ClinicSeed::class);
        $this->call(WebsiteSeed::class);
        $this->call(AdwordSeed::class);
        $this->call(ContactSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(UserSeedPivot::class);

    }
}
