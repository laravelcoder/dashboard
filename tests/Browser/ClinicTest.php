<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClinicTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateClinic()
    {
        $admin = \App\User::find(1);
        $clinic = factory('App\Clinic')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clinic) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->clickLink('Add new')
                ->type("nickname", $clinic->nickname)
                ->type("clinic_email", $clinic->clinic_email)
                ->type("clinic_phone", $clinic->clinic_phone)
                ->type("clinic_phone_2", $clinic->clinic_phone_2)
                ->attach("logo", base_path("tests/_resources/test.jpg"))
                ->press('Save')
                ->assertRouteIs('admin.clinics.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $clinic->nickname)
                ->assertSeeIn("tr:last-child td[field-key='clinic_email']", $clinic->clinic_email)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $clinic->clinic_phone)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone_2']", $clinic->clinic_phone_2);
        });
    }

    public function testEditClinic()
    {
        $admin = \App\User::find(1);
        $clinic = factory('App\Clinic')->create();
        $clinic2 = factory('App\Clinic')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clinic, $clinic2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->click('tr[data-entry-id="' . $clinic->id . '"] .btn-info')
                ->type("nickname", $clinic2->nickname)
                ->type("clinic_email", $clinic2->clinic_email)
                ->type("clinic_phone", $clinic2->clinic_phone)
                ->type("clinic_phone_2", $clinic2->clinic_phone_2)
                ->attach("logo", base_path("tests/_resources/test.jpg"))
                ->press('Update')
                ->assertRouteIs('admin.clinics.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $clinic2->nickname)
                ->assertSeeIn("tr:last-child td[field-key='clinic_email']", $clinic2->clinic_email)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $clinic2->clinic_phone)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone_2']", $clinic2->clinic_phone_2);
        });
    }

    public function testShowClinic()
    {
        $admin = \App\User::find(1);
        $clinic = factory('App\Clinic')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clinic) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->click('tr[data-entry-id="' . $clinic->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='nickname']", $clinic->nickname)
                ->assertSeeIn("td[field-key='clinic_email']", $clinic->clinic_email)
                ->assertSeeIn("td[field-key='clinic_phone']", $clinic->clinic_phone)
                ->assertSeeIn("td[field-key='clinic_phone_2']", $clinic->clinic_phone_2);
        });
    }

}
