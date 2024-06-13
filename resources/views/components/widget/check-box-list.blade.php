<div class="card mb-5">
    <x-card.card-header :title="$title" class="min-h-50px px-5 border-bottom-2 bg-gray-300 border-success">
        @if ($withSearch)
            <input type="text" id="{{ 'inputSearchList_' . $attrName }}" onkeyup="searchList()"
                class="form-control form-control-sm" placeholder="Search...">
        @endif
    </x-card.card-header>
    <x-card.card-body class="h-150px overflow-scroll py-1 px-3">
        <ul class="px-2" id="{{ 'chkbx_' . $attrName }}">
            @foreach ($items as $item)
                <li class="form-check my-2">
                    <input class="form-check-input cursor-pointer" name="{{ $attrName . '[]' }}" type="checkbox"
                        value="{{ $item->slug . '-' . $item->id }}" id="{{ 'chkbx_' . $item->name }}" @if($isKeySelected($item->id) || $isOldValueSelected(old($attrName), $item->id))  checked @endif>
                    <label class="form-check-label" for="checkbox1">
                        {{ $item->name }}
                    </label>
                </li>
            @endforeach
        </ul>
    </x-card.card-body>
</div>


@push('scripts_down_custom')
    <script>
        $(document).ready(function() {
            var list = $("#{{ 'chkbx_' . $attrName }}"),
                origOrder = list.children();

            @if ($withSearch)
                var searchBox = $("#{{ 'inputSearchList_' . $attrName }}");
                searchBox.on("keyup", function() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById("{{ 'inputSearchList_' . $attrName }}");
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("{{ 'chkbx_' . $attrName }}");
                    li = ul.getElementsByTagName('li');

                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < li.length; i++) {
                        // a = li[i].getElementsByTagName("label")[0];
                        txtValue = li[i].textContent || li[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                            // li[i].style.display = "block";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                });
            @endif

            list.on("click", ":checkbox", function() {
                var i, checked = document.createDocumentFragment(),
                    unchecked = document.createDocumentFragment();
                for (i = 0; i < origOrder.length; i++) {
                    if (origOrder[i].getElementsByTagName("input")[0].checked) {
                        checked.appendChild(origOrder[i]);
                    } else {
                        unchecked.appendChild(origOrder[i]);
                    }
                }
                list.append(checked).append(unchecked);
            });
            var _rearrangeCheckbox{{ $attrName }} = () => {
                var i, checked = document.createDocumentFragment(),
                    unchecked = document.createDocumentFragment();
                for (i = 0; i < origOrder.length; i++) {
                    if (origOrder[i].getElementsByTagName("input")[0].checked) {
                        checked.appendChild(origOrder[i]);
                    } else {
                        unchecked.appendChild(origOrder[i]);
                    }
                }
                list.append(checked).append(unchecked);
            }
            _rearrangeCheckbox{{ $attrName }}();
        });
    </script>
@endpush
