@component('mail::message')
# Booking Confirmed

We have received your booking and have scheduled it up for pickup. Our representative will reach out to you in the given timespan. 

@component('mail::button', ['url' => config('app.url') . '/bookings/' . $booking->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
