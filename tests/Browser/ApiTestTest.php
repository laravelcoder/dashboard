<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ApiTestTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateApiTest()
    {
        $admin = \App\User::find(1);
        $api_test = factory('App\ApiTest')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $api_test) {
            $browser->loginAs($admin)
                ->visit(route('admin.api_tests.index'))
                ->clickLink('Add new')
                ->type("name", $api_test->name)
                ->type("subject", $api_test->subject)
                ->type("message", $api_test->message)
                ->type("submitted_user_city", $api_test->submitted_user_city)
                ->type("submitted_user_state", $api_test->submitted_user_state)
                ->type("searched_for", $api_test->searched_for)
                ->type("email", $api_test->email)
                ->press('Save')
                ->assertRouteIs('admin.api_tests.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $api_test->name)
                ->assertSeeIn("tr:last-child td[field-key='subject']", $api_test->subject)
                ->assertSeeIn("tr:last-child td[field-key='message']", $api_test->message)
                ->assertSeeIn("tr:last-child td[field-key='email']", $api_test->email);
        });
    }

    public function testEditApiTest()
    {
        $admin = \App\User::find(1);
        $api_test = factory('App\ApiTest')->create();
        $api_test2 = factory('App\ApiTest')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $api_test, $api_test2) {
            $browser->loginAs($admin)
                ->visit(route('admin.api_tests.index'))
                ->click('tr[data-entry-id="' . $api_test->id . '"] .btn-info')
                ->type("name", $api_test2->name)
                ->type("subject", $api_test2->subject)
                ->type("message", $api_test2->message)
                ->type("submitted_user_city", $api_test2->submitted_user_city)
                ->type("submitted_user_state", $api_test2->submitted_user_state)
                ->type("searched_for", $api_test2->searched_for)
                ->type("email", $api_test2->email)
                ->press('Update')
                ->assertRouteIs('admin.api_tests.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $api_test2->name)
                ->assertSeeIn("tr:last-child td[field-key='subject']", $api_test2->subject)
                ->assertSeeIn("tr:last-child td[field-key='message']", $api_test2->message)
                ->assertSeeIn("tr:last-child td[field-key='email']", $api_test2->email);
        });
    }

    public function testShowApiTest()
    {
        $admin = \App\User::find(1);
        $api_test = factory('App\ApiTest')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $api_test) {
            $browser->loginAs($admin)
                ->visit(route('admin.api_tests.index'))
                ->click('tr[data-entry-id="' . $api_test->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $api_test->name)
                ->assertSeeIn("td[field-key='subject']", $api_test->subject)
                ->assertSeeIn("td[field-key='message']", $api_test->message)
                ->assertSeeIn("td[field-key='submitted_user_city']", $api_test->submitted_user_city)
                ->assertSeeIn("td[field-key='submitted_user_state']", $api_test->submitted_user_state)
                ->assertSeeIn("td[field-key='searched_for']", $api_test->searched_for)
                ->assertSeeIn("td[field-key='email']", $api_test->email);
        });
    }

}
