@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-center text-danger']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
