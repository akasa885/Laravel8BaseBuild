@props([
    'attrName' => 'featured_image',
    'title' => 'Featured Image',
    'thumbnail' => null,
])
<div class="card mb-5">
    <x-card.card-header :title="$title" class="min-h-50px px-5 border-bottom-2 bg-gray-300 border-success" />
    <x-card.card-body class="py-1 px-3">
        <div class="d-flex flex-column">
            <div class="col-auto align-self-center my-2">
                <div class="fileinput-new thumbnail" id="holder" style="max-width: 200px; max-height: 150px;">
                    <img id="previewimg_thumb" src="{{ $thumbnail ?? asset('/placeholder/no-image.png') }}" alt="" height="150px" />
                </div>
            </div>
            <div class="col p-4">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="{{ 'lfm_'.$attrName }}" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-sm">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control form-control-sm" type="text" name="filepath">
                </div>
            </div>
        </div>
    </x-card.card-body>
</div>

@push('scripts_down_custom')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $(document).ready(function() {
            var route_prefix = "{{ config('lfm.prefix') }}";
            $("#{{ 'lfm_'.$attrName }}").filemanager('image', {
                prefix: route_prefix
            });
        });
    </script>
@endpush
