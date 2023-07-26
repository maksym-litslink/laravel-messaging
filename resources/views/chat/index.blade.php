<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chat with :username', ['username' => $user->name]) }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="messages" class="bg-gray-100 p-4 rounded-lg mb-4 overflow-auto h-96">
                    @foreach ($messages as $message)
                        @include('chat._message')
                    @endforeach
                </div>
                <form id="send-message-form" class="flex mt-4" method="POST" action="{{ route('chat.store', $user) }}">
                    @csrf
                    <input type="text" id="message-input" name="message"
                           class="w-full rounded-l-md border-gray-300 border-2 p-2" required
                           placeholder="Type a message...">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-md">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
