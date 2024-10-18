<div class="-z-50">
    <img src="{{ Storage::url($ornament->topleft) }}" alt="" @class([
        'fixed top-0 left-0',
        '!opacity-20' => $light,
        '!opacity-30' => !$light,
    ])>
    <img src="{{ Storage::url($ornament->topright) }}" alt="" @class([
        'fixed top-0 right-0',
        '!opacity-20' => $light,
        '!opacity-30' => !$light,
    ])>
    <img src="{{ Storage::url($ornament->bottomleft) }}" alt="" @class([
        'fixed bottom-0 left-0',
        '!opacity-20' => $light,
        '!opacity-30' => !$light,
    ])>
    <img src="{{ Storage::url($ornament->bottomright) }}" alt="" @class([
        'fixed bottom-0 right-0',
        '!opacity-20' => $light,
        '!opacity-30' => !$light,
    ])>
</div>
