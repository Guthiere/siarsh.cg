<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

               <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">



                            <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                <input wire:model="search" class="form-input rounded-md shadow-sm mt-1 block w-full" type="text" placeholder="Buscar...">

                                <div class="form-input rounded-md shadow-sm mt-1 ml-6 block">
                                    <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                                        <option value="5"> 5 Por Pagina</option>
                                        <option value="10"> 10 Por Pagina</option>
                                        <option value="15"> 15 Por Pagina</option>
                                        <option value="20"> 20 Por Pagina</option>
                                        <option value="25"> 25 Por Pagina</option>
                                        <option value="50"> 50 Por Pagina</option>
                                        <option value="100"> 100 Por Pagina</option>
                                        <option value="200"> 200 Por Pagina</option>
                                    </select>
                                </div>
                                @if ($search !== '')
                                    <button wire:click="Clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
                                @endif

                            </div>
                            @if ($users->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Teams') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Role') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50">
                                        <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="{{ $user->name }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm text-gray-500">{{ $user->allTeams()->pluck('name')->join(', ') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    <!-- More rows... -->
                                    </tbody>
                                </table>

                                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                    {{ $users->links() }}
                                </div>
                            @else
                                <div class="bg-white px-4 py-3 border-t border-gray-200 text-gray-500 sm:px-6">
                                    No hay relultados para mostrar en la busqueda: "{{ $search }}" en la pagina {{ $page }} al mostrar {{ $perPage }} por Pagina.
                                </div>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
