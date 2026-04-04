@props([
    'src',
    'alt' => '',
    'width' => null,
    'height' => null,
    'webp' => null,
    'avif' => null,
    'sizes' => '100vw',
    'srcset' => null,
    'webpSrcset' => null,
    'avifSrcset' => null,
    'loading' => 'lazy',
    'fetchpriority' => 'auto',
    'decoding' => 'async',
])

<picture>
    @if ($avif || $avifSrcset)
        <source
            type="image/avif"
            srcset="{{ $avifSrcset ?: $avif }}"
            sizes="{{ $sizes }}"
        >
    @endif
    @if ($webp || $webpSrcset)
        <source
            type="image/webp"
            srcset="{{ $webpSrcset ?: $webp }}"
            sizes="{{ $sizes }}"
        >
    @endif
    <img
        src="{{ $src }}"
        alt="{{ $alt }}"
        @if ($srcset) srcset="{{ $srcset }}" @endif
        sizes="{{ $sizes }}"
        @if ($width) width="{{ $width }}" @endif
        @if ($height) height="{{ $height }}" @endif
        loading="{{ $loading }}"
        fetchpriority="{{ $fetchpriority }}"
        decoding="{{ $decoding }}"
        {{ $attributes }}
    >
</picture>
