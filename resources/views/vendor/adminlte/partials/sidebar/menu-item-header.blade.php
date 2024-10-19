<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-header text-gray-400 uppercase text-xs font-semibold tracking-wider {{ $item['class'] ?? '' }}">
    {{ is_string($item) ? $item : $item['header'] }}
</li>
