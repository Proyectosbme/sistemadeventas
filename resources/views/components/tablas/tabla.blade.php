@props([
    'headers',
])

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($headers as $head)
                    <th scope="col" class="{{ isset($head['align']) ? 'text-' . $head['align'] : 'text-left' }} px-6 py-3">
                        {{ $head['text'] ?? '' }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if (isset($slot))
                {{ $slot }}
            @else
                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                    <td colspan="{{ count($headers) }}" class="px-6 py-4 text-center">
                        Que debo mostrar? :c
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
