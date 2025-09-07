@props([
    'type' => 'success',
    'message' => null,
    'timeout' => 5000,
])

@php
    $colors = [
        'success' => 'bg-green-100 border border-green-400 text-green-700',
        'error' => 'bg-red-100 border border-red-400 text-red-700',
        'warning' => 'bg-yellow-100 border border-yellow-400 text-yellow-700',
        'info' => 'bg-blue-100 border border-blue-400 text-blue-700',
    ];

    $classes = $colors[$type] ?? $colors['info'];
    if ($message) {
        $content = $message;
    } elseif (session()->has($type)) {
        $content = session($type);
    } else {
        $content = null;
    }
@endphp

@if ($content)
    <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm rounded-lg $classes"]) }} role="alert"
        x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, {{ $timeout }})">
        {{ $content }}
    </div>
@endif
