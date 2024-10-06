<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Tentang aplikasi'])
    <article class="prose mx-auto py-6">
        {!! Str::markdown($content) !!}
    </article>
</div>
