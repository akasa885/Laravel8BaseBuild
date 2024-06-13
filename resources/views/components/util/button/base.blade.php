@if ($type == 'link')
    <x-util.button.link :class="$buildClass" :text="$text" :href="$href" />
@endif