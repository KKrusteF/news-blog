<x-layout>
    @can('admin')
        <x-crud.create action="admin"/>
    @else
        <x-crud.create action="user"/>
    @endcan
</x-layout>
