<x-layout>
    <x-setting heading="Manage Posts">

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{ $post->slug }}">
                                                    {{ $post->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    @can('admin')
                                        <x-update-button user="admin" post="{{ $post->id }}"/>
                                        <x-delete-button user="admin" post="{{ $post->id }}"/>
                                    @else
                                        <x-update-button user="user" post="{{ $post->id }}"/>
                                        <x-delete-button user="user" post="{{ $post->id }}"/>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $posts->links() }}
    </x-setting>
    {{--    @can('admin')--}}
    {{--        <x-crud.index user="admin"/>--}}
    {{--    @else--}}
    {{--        <x-crud.index user="user"/>--}}
    {{--    @endcan--}}
</x-layout>
