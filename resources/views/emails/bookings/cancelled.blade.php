@component('mail::message')
# Booking Cancelled

Your booking for luggage transport at HassleFreeLuggage has been cancelled.

@component('mail::button', ['url' => '/bookings/' . $booking->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
