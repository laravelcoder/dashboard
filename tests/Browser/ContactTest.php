<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ContactTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->make();

        $relations = [
            factory('App\Contact')->create(), 
            factory('App\Contact')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $contact, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->clickLink('Add new')
                ->select("company_id", $contact->company_id)
                ->select("clinic_id", $contact->clinic_id)
                ->select("user_id", $contact->user_id)
                ->type("first_name", $contact->first_name)
                ->type("last_name", $contact->last_name)
                ->type("phone1", $contact->phone1)
                ->type("phone2", $contact->phone2)
                ->type("email", $contact->email)
                ->type("skype", $contact->skype)
                ->select('select[name="company_contacts[]"]', $relations[0]->id)
                ->select('select[name="company_contacts[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='company']", $contact->company->name)
                ->assertSeeIn("tr:last-child td[field-key='clinic']", $contact->clinic->nickname)
                ->assertSeeIn("tr:last-child td[field-key='user']", $contact->user->name)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("tr:last-child td[field-key='phone1']", $contact->phone1)
                ->assertSeeIn("tr:last-child td[field-key='phone2']", $contact->phone2)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact->email)
                ->assertSeeIn("tr:last-child td[field-key='skype']", $contact->skype)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:first-child", $relations[0]->first_name)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:last-child", $relations[1]->first_name);
        });
    }

    public function testEditContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();
        $contact2 = factory('App\Contact')->make();

        $relations = [
            factory('App\Contact')->create(), 
            factory('App\Contact')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $contact, $contact2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="' . $contact->id . '"] .btn-info')
                ->select("company_id", $contact2->company_id)
                ->select("clinic_id", $contact2->clinic_id)
                ->select("user_id", $contact2->user_id)
                ->type("first_name", $contact2->first_name)
                ->type("last_name", $contact2->last_name)
                ->type("phone1", $contact2->phone1)
                ->type("phone2", $contact2->phone2)
                ->type("email", $contact2->email)
                ->type("skype", $contact2->skype)
                ->select('select[name="company_contacts[]"]', $relations[0]->id)
                ->select('select[name="company_contacts[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.contacts.index')
                ->assertSeeIn("tr:last-child td[field-key='company']", $contact2->company->name)
                ->assertSeeIn("tr:last-child td[field-key='clinic']", $contact2->clinic->nickname)
                ->assertSeeIn("tr:last-child td[field-key='user']", $contact2->user->name)
                ->assertSeeIn("tr:last-child td[field-key='first_name']", $contact2->first_name)
                ->assertSeeIn("tr:last-child td[field-key='last_name']", $contact2->last_name)
                ->assertSeeIn("tr:last-child td[field-key='phone1']", $contact2->phone1)
                ->assertSeeIn("tr:last-child td[field-key='phone2']", $contact2->phone2)
                ->assertSeeIn("tr:last-child td[field-key='email']", $contact2->email)
                ->assertSeeIn("tr:last-child td[field-key='skype']", $contact2->skype)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:first-child", $relations[0]->first_name)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:last-child", $relations[1]->first_name);
        });
    }

    public function testShowContact()
    {
        $admin = \App\User::find(1);
        $contact = factory('App\Contact')->create();

        $relations = [
            factory('App\Contact')->create(), 
            factory('App\Contact')->create(), 
        ];

        $contact->company_contacts()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $contact, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.contacts.index'))
                ->click('tr[data-entry-id="' . $contact->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='company']", $contact->company->name)
                ->assertSeeIn("td[field-key='clinic']", $contact->clinic->nickname)
                ->assertSeeIn("td[field-key='user']", $contact->user->name)
                ->assertSeeIn("td[field-key='first_name']", $contact->first_name)
                ->assertSeeIn("td[field-key='last_name']", $contact->last_name)
                ->assertSeeIn("td[field-key='phone1']", $contact->phone1)
                ->assertSeeIn("td[field-key='phone2']", $contact->phone2)
                ->assertSeeIn("td[field-key='email']", $contact->email)
                ->assertSeeIn("td[field-key='skype']", $contact->skype)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:first-child", $relations[0]->first_name)
                ->assertSeeIn("tr:last-child td[field-key='company_contacts'] span:last-child", $relations[1]->first_name);
        });
    }

}
