<meta name="{{ $metaPart }}" @if (!$isContent) content="@yield('meta-'.$metaPart, $getDefaultMeta($metaPart))" @else content="{{ $metaString }}" @endif/>