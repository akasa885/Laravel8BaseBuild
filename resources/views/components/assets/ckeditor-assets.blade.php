@props([
    'type' => 'classic',
    'ver' => '5',
])
@push('scripts_down_custom')
    @if ($ver == '5')
        @if ($type == 'classic')
            <script src="{{ asset('vendor/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
            {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script> --}}
        @elseif ($type == 'inline')
            <script src="{{ asset('vendor/admin/plugins/custom/ckeditor/ckeditor-inline.bundle.js') }}"></script>
        @elseif ($type == 'balloon')
            <script src="{{ asset('vendor/admin/plugins/custom/ckeditor/ckeditor-balloon.bundle.js') }}"></script>
        @elseif ($type == 'balloon-block')
            <script src="{{ asset('vendor/admin/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js') }}"></script>
        @elseif ($type == 'document')
            <script src="{{ asset('vendor/admin/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}"></script>
        @elseif ($type == 'super')
            <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
        @endif
    @else
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    @endif
@endpush


@push('scripts_down_custom')
    <script>
        var ckEditorAssets5 = function ()
        {
            var toolbarCkEditor = [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'Image', 'imageCaption', 'imageToolbar', 'imageUpload', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', '|',
                'alignment', '|',
                'link', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
            ]

            var font = {
                'family': [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                'size': [
                    10, 12, 14, 'default', 18, 20, 22
                ]
            }

            var headings = [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]

            return {
                init: function () {
                    console.log('oke');
                },
                _toolbar: function () {
                    return toolbarCkEditor;
                },
                _font: function () {
                    return font;
                },
                _headings: function () {
                    return headings;
                }
            }
        }();

        $(document).ready(function () {
            ckEditorAssets5.init();
        });
    </script>
@endpush
