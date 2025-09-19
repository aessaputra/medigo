@props([
    'user',
    'size' => 'sm',
    'rounded' => true,
    'class' => '',
])

@php
    $avatarClasses = trim(sprintf('avatar avatar-%s %s %s', $size, $rounded ? 'avatar-rounded' : '', $class));
    $profilePhotoPath = $user?->profile_photo_path ?? null;
    $profilePhotoUrl = $profilePhotoPath ? \Illuminate\Support\Facades\Storage::url($profilePhotoPath) : null;
@endphp

@if ($profilePhotoUrl)
    <span {{ $attributes->merge(['class' => $avatarClasses]) }} style="background-image: url('{{ $profilePhotoUrl }}')"></span>
@else
    <span {{ $attributes->merge(['class' => $avatarClasses . ' text-uppercase fw-semibold d-inline-flex align-items-center justify-content-center']) }}
        style="background-color: {{ $user?->avatar_color ?? '#206bc4' }}; color: #fff;">
        {{ $user?->avatar_initials ?? 'U' }}
    </span>
@endif
