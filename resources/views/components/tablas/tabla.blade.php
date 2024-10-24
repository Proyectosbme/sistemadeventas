@props(['headers'])

<div class="overflow-x-auto relative shadow-lg rounded-lg">
    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
        <thead class="text-xs text-gray-600 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                @foreach ($headers as $head)
                    <th scope="col" class="{{ isset($head['align']) ? 'text-' . $head['align'] : 'text-left' }} px-6 py-2">
                        {{ $head['text'] ?? '' }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800">
            @if (isset($slot))
                {{ $slot }}
            @else
                <tr class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <td colspan="{{ count($headers) }}" class="px-6 py-2 text-center">
                        No hay datos disponibles
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
