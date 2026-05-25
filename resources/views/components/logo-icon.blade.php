@props(['class' => 'h-10 w-auto'])

<img src="{{ asset('images/logo.png') }}" alt="Mokes Infotech logo" {{ $attributes->merge(['class' => $class]) }}>
