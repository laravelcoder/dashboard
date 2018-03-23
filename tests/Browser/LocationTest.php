<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LocationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateLocation()
    {
        $admin = \App\User::find(1);
        $location = factory('App\Location')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $location) {
            $browser->loginAs($admin)
                ->visit(route('admin.locations.index'))
                ->clickLink('Add new')
                ->type("nickname", $location->nickname)
                ->type("address", $location->address)
                ->type("address_2", $location->address_2)
                ->type("city", $location->city)
                ->type("state", $location->state)
                ->type("phone", $location->phone)
                ->type("phone2", $location->phone2)
                ->attach("storefront", base_path("tests/_resources/test.jpg"))
                ->type("google_map_link", $location->google_map_link)
                ->press('Save')
                ->assertRouteIs('admin.locations.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $location->nickname)
                ->assertSeeIn("tr:last-child td[field-key='city']", $location->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $location->state)
                ->assertSeeIn("tr:last-child td[field-key='phone2']", $location->phone2);
        });
    }

    public function testEditLocation()
    {
        $admin = \App\User::find(1);
        $location = factory('App\Location')->create();
        $location2 = factory('App\Location')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $location, $location2) {
            $browser->loginAs($admin)
                ->visit(route('admin.locations.index'))
                ->click('tr[data-entry-id="' . $location->id . '"] .btn-info')
                ->type("nickname", $location2->nickname)
                ->type("address", $location2->address)
                ->type("address_2", $location2->address_2)
                ->type("city", $location2->city)
                ->type("state", $location2->state)
                ->type("phone", $location2->phone)
                ->type("phone2", $location2->phone2)
                ->attach("storefront", base_path("tests/_resources/test.jpg"))
                ->type("google_map_link", $location2->google_map_link)
                ->press('Update')
                ->assertRouteIs('admin.locations.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $location2->nickname)
                ->assertSeeIn("tr:last-child td[field-key='city']", $location2->city)
                ->assertSeeIn("tr:last-child td[field-key='state']", $location2->state)
                ->assertSeeIn("tr:last-child td[field-key='phone2']", $location2->phone2);
        });
    }

    public function testShowLocation()
    {
        $admin = \App\User::find(1);
        $location = factory('App\Location')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $location) {
            $browser->loginAs($admin)
                ->visit(route('admin.locations.index'))
                ->click('tr[data-entry-id="' . $location->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='nickname']", $location->nickname)
                ->assertSeeIn("td[field-key='address']", $location->address)
                ->assertSeeIn("td[field-key='address_2']", $location->address_2)
                ->assertSeeIn("td[field-key='city']", $location->city)
                ->assertSeeIn("td[field-key='state']", $location->state)
                ->assertSeeIn("td[field-key='phone']", $location->phone)
                ->assertSeeIn("td[field-key='phone2']", $location->phone2)
                ->assertSeeIn("td[field-key='google_map_link']", $location->google_map_link);
        });
    }

}
