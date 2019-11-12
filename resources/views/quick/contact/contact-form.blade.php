@component('mail::message')
# Thank you for your message



Email : {{$data['email']}}

Subject : {{$data['subject']}}

Message : {{$data['message']}}

@endcomponent