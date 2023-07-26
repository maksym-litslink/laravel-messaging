<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg px-4 pt-6 pb-8 mb-4 flex flex-col my-2">
                <ul class="text-gray-700 text-lg">
                    @foreach ($users as $user)
                        <li class="mb-2 px-3 py-2 border-b border-gray-200">
                            <a href="{{ route('chat.index', $user) }}" class="text-blue-500 hover:text-blue-700">
                                {{ $user->name }} <span class="text-sm text-gray-500">{{ $user->messages_with_current_user_count }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
