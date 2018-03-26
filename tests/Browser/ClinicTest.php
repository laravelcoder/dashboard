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

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $clinic, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->clickLink('Add new')
                ->type("nickname", $clinic->nickname)
                ->type("clinic_email", $clinic->clinic_email)
                ->type("clinic_phone", $clinic->clinic_phone)
                ->type("clinic_phone_2", $clinic->clinic_phone_2)
                ->attach("logo", base_path("tests/_resources/test.jpg"))
                ->select("company_id", $clinic->company_id)
                ->select('select[name="users[]"]', $relations[0]->id)
                ->select('select[name="users[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.clinics.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $clinic->nickname)
                ->assertSeeIn("tr:last-child td[field-key='clinic_email']", $clinic->clinic_email)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $clinic->clinic_phone)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone_2']", $clinic->clinic_phone_2)
                ->assertSeeIn("tr:last-child td[field-key='company']", $clinic->company->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:last-child", $relations[1]->name);
        });
    }

    public function testEditClinic()
    {
        $admin = \App\User::find(1);
        $clinic = factory('App\Clinic')->create();
        $clinic2 = factory('App\Clinic')->make();

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $clinic, $clinic2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->click('tr[data-entry-id="' . $clinic->id . '"] .btn-info')
                ->type("nickname", $clinic2->nickname)
                ->type("clinic_email", $clinic2->clinic_email)
                ->type("clinic_phone", $clinic2->clinic_phone)
                ->type("clinic_phone_2", $clinic2->clinic_phone_2)
                ->attach("logo", base_path("tests/_resources/test.jpg"))
                ->select("company_id", $clinic2->company_id)
                ->select('select[name="users[]"]', $relations[0]->id)
                ->select('select[name="users[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.clinics.index')
                ->assertSeeIn("tr:last-child td[field-key='nickname']", $clinic2->nickname)
                ->assertSeeIn("tr:last-child td[field-key='clinic_email']", $clinic2->clinic_email)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $clinic2->clinic_phone)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone_2']", $clinic2->clinic_phone_2)
                ->assertSeeIn("tr:last-child td[field-key='company']", $clinic2->company->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:last-child", $relations[1]->name);
        });
    }

    public function testShowClinic()
    {
        $admin = \App\User::find(1);
        $clinic = factory('App\Clinic')->create();

        $relations = [
            factory('App\User')->create(), 
            factory('App\User')->create(), 
        ];

        $clinic->users()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $clinic, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.clinics.index'))
                ->click('tr[data-entry-id="' . $clinic->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='nickname']", $clinic->nickname)
                ->assertSeeIn("td[field-key='clinic_email']", $clinic->clinic_email)
                ->assertSeeIn("td[field-key='clinic_phone']", $clinic->clinic_phone)
                ->assertSeeIn("td[field-key='clinic_phone_2']", $clinic->clinic_phone_2)
                ->assertSeeIn("td[field-key='company']", $clinic->company->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:first-child", $relations[0]->name)
                ->assertSeeIn("tr:last-child td[field-key='users'] span:last-child", $relations[1]->name);
        });
    }

}
