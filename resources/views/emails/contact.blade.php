@component('mail::message')
# <b>Contact</b>


<p>{{ $data['message'] }}</p>


Thanks,for using our app<br>
{{ config('app.name') }}
@endcomponent
