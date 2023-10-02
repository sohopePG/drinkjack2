@props([
    'href' => '',
    'str' =>'',
    'theme' => 'primary',
])
@php
    if (!function_exists('getThemeClassForButtonA')) {
        function getThemeClassForButtonA($theme)
        {
            return match ($theme) {
                'primary' => 'text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500 mx-3.5',
                'cancel' => 'text-white bg-gray-500 hover:bg-gray-600 focus:ring-gray-500 mx-3.5',
                'secondary' => 'text-white bg-red-500 hover:bg-red-600 focus:ring-red-500 mx-3.5',
                default => '',
            };
        }
    }
@endphp
<a href="{{ $href }}"
   class="inline-flex justify-center py-1 px-2 sm:py-2 sm:px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 {{ getThemeClassForButtonA($theme) }}"
   onclick="return confirm('{{ $str }}')">
   {{ $slot }}
</a>
