@props(['messages'])

@if ($messages)
    <ul class="color-highlight text-center font-12">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
