@component('mail::message')
# Booking Cancelled

Your booking for luggage transport at Droghers has been cancelled.

@component('mail::button', ['url' => config('app.url') . '/bookings/' . $booking->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
