<div class="flex items-center whitespace-nowrap">
    <h3 class="font-bold text-lg">{{ $title }}</h3>
    <div class="divider divider-horizontal hidden md:flex"></div>
    <div class="text-xs breadcrumbs capitalize hidden md:flex">
        <ul>
            <li>{{ $role }}</li>
            @foreach ($routes as $route)
                <li>{{ $route == 'index' ? 'list' : $route }}</li>
            @endforeach
        </ul>
    </div>
</div>
