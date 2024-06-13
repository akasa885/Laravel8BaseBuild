<div {{  $attributes->merge(['class' => 'card-header border-0']) }}>
    <h3 class="card-title align-items-start flex-column">
        @if ($subTitle)
            <span class="card-label fw-bold fs-3 mb-1">{{ $title }}</span>
            <span class="text-muted mt-1 fw-semibold fs-7">{{ $subTitle }}</span>
        @else
            <span class="card-label fw-bold fs-3 mb-1">{{ $title }}</span>
        @endif
    </h3>
    <div class="card-toolbar" data-bs-placement="top" data-bs-trigger="hover" data-kt-initialized="1">
        {{ $insideToolbar ?? '' }}
    </div>
    {{ $slot }}
</div>
