@props(['href', 'icon' => null, 'mobile' => false])



<a href="{{ url($href) }}" @class([
    'hover:underline py-2',
    'text-yellow-400 font-bold' => isActive($href),
    'text-white' => !isActive($href),
    'block' => $mobile,
])>
    @if ($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
