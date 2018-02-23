@component('mail::message')
# Booking {{$booking->id}} : {{ getStatusString($booking->status) }}

Your booking status with ID {{$booking->id}} has been updated to : {!! getStatus($booking->status) !!}

@component('mail::button', ['url' => '/bookings/' . $booking->id])
View Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
