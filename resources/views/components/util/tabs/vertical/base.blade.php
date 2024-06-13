<div {{ $attributes->merge(['class' => 'd-flex flex-column flex-md-row rounded border']) }}>
    <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
        {{ $nav }}
    </ul>
    {{ $content }}
</div>
