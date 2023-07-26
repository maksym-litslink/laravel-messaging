@php($isAuthor = $message->from_user_id === auth()->id())
<div class="flex items-start mb-4 {{ $isAuthor ? 'justify-end' : 'justify-start' }}">
    <div class="flex items-end">
        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 {{ $isAuthor ? 'items-end' : 'items-start' }}">
            <div>
                <span class="px-4 py-2 rounded-lg inline-block rounded-bl-none {{ $isAuthor ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-700' }}">
                    {{ $message->message }}
                </span>
            </div>
            <div class="text-xs text-gray-500">
                {{ $message->created_at->format('g:i A') }}
            </div>
            <div class="font-bold text-sm text-blue-600">
                {{ $message->fromUser->name }}
            </div>
            @if ($isAuthor)
                <form action="{{ route('chat.destroy', $message->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-xs">Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>
