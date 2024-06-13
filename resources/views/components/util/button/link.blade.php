@props([
    'class' => '',
    'text' => 'Link Button',
    'href' => '#',
])
<a href="{{ $href }}" class="{{ $class }}">{{ $text }}</a>