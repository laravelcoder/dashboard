<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BookingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $booking) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->clickLink('Add new')
                ->type("submitted", $booking->submitted)
                ->type("customername", $booking->customername)
                ->type("email", $booking->email)
                ->type("phone", $booking->phone)
                ->type("family_number", $booking->family_number)
                ->type("how_long", $booking->how_long)
                ->type("requested_date", $booking->requested_date)
                ->type("requested_time", $booking->requested_time)
                ->type("requested_clinic", $booking->requested_clinic)
                ->type("clinic_id", $booking->clinic_id)
                ->type("clinic_email", $booking->clinic_email)
                ->type("clinic_address", $booking->clinic_address)
                ->type("clinic_phone", $booking->clinic_phone)
                ->type("clinic_text_numbers", $booking->clinic_text_numbers)
                ->type("client_firstname", $booking->client_firstname)
                ->press('Save')
                ->assertRouteIs('admin.bookings.index')
                ->assertSeeIn("tr:last-child td[field-key='submitted']", $booking->submitted)
                ->assertSeeIn("tr:last-child td[field-key='customername']", $booking->customername)
                ->assertSeeIn("tr:last-child td[field-key='email']", $booking->email)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $booking->phone)
                ->assertSeeIn("tr:last-child td[field-key='family_number']", $booking->family_number)
                ->assertSeeIn("tr:last-child td[field-key='requested_date']", $booking->requested_date)
                ->assertSeeIn("tr:last-child td[field-key='requested_clinic']", $booking->requested_clinic)
                ->assertSeeIn("tr:last-child td[field-key='clinic_id']", $booking->clinic_id)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $booking->clinic_phone);
        });
    }

    public function testEditBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->create();
        $booking2 = factory('App\Booking')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $booking, $booking2) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->click('tr[data-entry-id="' . $booking->id . '"] .btn-info')
                ->type("submitted", $booking2->submitted)
                ->type("customername", $booking2->customername)
                ->type("email", $booking2->email)
                ->type("phone", $booking2->phone)
                ->type("family_number", $booking2->family_number)
                ->type("how_long", $booking2->how_long)
                ->type("requested_date", $booking2->requested_date)
                ->type("requested_time", $booking2->requested_time)
                ->type("requested_clinic", $booking2->requested_clinic)
                ->type("clinic_id", $booking2->clinic_id)
                ->type("clinic_email", $booking2->clinic_email)
                ->type("clinic_address", $booking2->clinic_address)
                ->type("clinic_phone", $booking2->clinic_phone)
                ->type("clinic_text_numbers", $booking2->clinic_text_numbers)
                ->type("client_firstname", $booking2->client_firstname)
                ->press('Update')
                ->assertRouteIs('admin.bookings.index')
                ->assertSeeIn("tr:last-child td[field-key='submitted']", $booking2->submitted)
                ->assertSeeIn("tr:last-child td[field-key='customername']", $booking2->customername)
                ->assertSeeIn("tr:last-child td[field-key='email']", $booking2->email)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $booking2->phone)
                ->assertSeeIn("tr:last-child td[field-key='family_number']", $booking2->family_number)
                ->assertSeeIn("tr:last-child td[field-key='requested_date']", $booking2->requested_date)
                ->assertSeeIn("tr:last-child td[field-key='requested_clinic']", $booking2->requested_clinic)
                ->assertSeeIn("tr:last-child td[field-key='clinic_id']", $booking2->clinic_id)
                ->assertSeeIn("tr:last-child td[field-key='clinic_phone']", $booking2->clinic_phone);
        });
    }

    public function testShowBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $booking) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->click('tr[data-entry-id="' . $booking->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='submitted']", $booking->submitted)
                ->assertSeeIn("td[field-key='customername']", $booking->customername)
                ->assertSeeIn("td[field-key='email']", $booking->email)
                ->assertSeeIn("td[field-key='phone']", $booking->phone)
                ->assertSeeIn("td[field-key='family_number']", $booking->family_number)
                ->assertSeeIn("td[field-key='how_long']", $booking->how_long)
                ->assertSeeIn("td[field-key='requested_date']", $booking->requested_date)
                ->assertSeeIn("td[field-key='requested_time']", $booking->requested_time)
                ->assertSeeIn("td[field-key='requested_clinic']", $booking->requested_clinic)
                ->assertSeeIn("td[field-key='clinic_id']", $booking->clinic_id)
                ->assertSeeIn("td[field-key='clinic_email']", $booking->clinic_email)
                ->assertSeeIn("td[field-key='clinic_address']", $booking->clinic_address)
                ->assertSeeIn("td[field-key='clinic_phone']", $booking->clinic_phone)
                ->assertSeeIn("td[field-key='clinic_text_numbers']", $booking->clinic_text_numbers)
                ->assertSeeIn("td[field-key='client_firstname']", $booking->client_firstname);
        });
    }

}
