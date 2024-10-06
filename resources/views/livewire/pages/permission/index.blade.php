<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Role & Permissions'])

    <div class="table-filter-wrapper">
        <input type="search" wire:model.live="cari" class="input input-bordered" placeholder="Pencarian">
        @canany(['role.create', 'permission.create'])
            <button class="btn btn-primary" wire:click="$dispatch('createPermission')">
                <x-tabler-plus class="size-5" />
                <span>Tambah permission</span>
            </button>
        @endcanany
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Permission</th>
                @foreach ($roles as $role)
                    <th class="capitalize text-center w-28">{{ $role }}</th>
                @endforeach
                @canany(['permission.edit', 'permission.delete'])
                    <th class="text-center">Actions</th>
                @endcanany
            </thead>
            <tbody class="border-b-4 border-base-300">
                @foreach ($permissions as $permit)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $permit->name }}</td>
                        @foreach ($roles as $role)
                            <td>
                                <div class="flex justify-center">
                                    <input type="checkbox" @class(['toggle toggle-sm toggle-primary']) @checked($permit->hasRole($role))
                                        wire:change="$dispatch('setRole', {permission:{{ $permit->id }}, role:'{{ $role }}'})"
                                        @disabled(!auth()->user()->can('role.setpermission')) />
                                </div>
                            </td>
                        @endforeach
                        @canany(['permission.edit', 'permission.delete'])
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('permission.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editPermission', {permission: {{ $permit->id }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('permission.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deletePermission', {permission: {{ $permit->id }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
            @canany(['role.edit', 'role.delete'])
                <tfoot class="bg-base-200/50">
                    <tr>
                        <td></td>
                        <td></td>
                        @foreach ($roles as $roleid => $role)
                            <td>
                                <div class="flex gap-1 justify-center">
                                    @can('role.edit')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('editRole', {role: {{ $roleid }}})">
                                            <x-tabler-edit class="size-4" />
                                        </button>
                                    @endcan
                                    @can('role.delete')
                                        <button class="btn btn-xs btn-square btn-bordered"
                                            wire:click="$dispatch('deleteRole', {role: {{ $roleid }}})">
                                            <x-tabler-trash class="size-4" />
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        @endforeach
                        <td></td>
                    </tr>
                </tfoot>
            @endcanany
        </table>
    </div>

    @livewire('pages.permission.actions')
</div>
