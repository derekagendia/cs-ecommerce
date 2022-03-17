@component('mail::message')
# Congratulation

Your Shop is now activate

@component('mail::button', ['url' => route('shops.show',$shop->slug)])
Visite your shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
