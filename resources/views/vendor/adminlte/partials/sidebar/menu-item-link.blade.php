<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">
    <a class="nav-link flex items-center space-x-3 py-2 px-4 text-base font-medium text-gray-300 hover:bg-blue-600 hover:text-white rounded-lg transition duration-150 ease-in-out {{ $item['class'] }} @isset($item['shift']) {{ $item['shift'] }} @endisset"
       href="{{ $item['href'] }}" @isset($item['target']) target="{{ $item['target'] }}" @endisset
       {!! $item['data-compiled'] ?? '' !!}>
        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{ isset($item['icon_color']) ? 'text-'.$item['icon_color'] : 'text-gray-400' }}"></i>
        <p class="flex-1">{{ $item['text'] }}</p>

        @isset($item['label'])
            <span class="ml-auto badge bg-{{ $item['label_color'] ?? 'primary' }} right">
                {{ $item['label'] }}
            </span>
        @endisset
    </a>
</li>
