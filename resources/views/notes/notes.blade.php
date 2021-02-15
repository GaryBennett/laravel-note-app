@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                <form action="{{ route('notes') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write a note!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blueGray-500 text-white px-4 py-2 rounded font-medium">Create Note</button>
                    </div>
                </form>
            @endauth
            @if ($notes->count())
                @foreach ($notes as $note)
                    <div class="mb-4">
                        <span class="font-bold">{{ $note->user->username }}</span> - <span class="text-sm text-gray-600">{{ $note->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $note->body }}</p>
                        @can('delete', $note)
                            <form action="{{ route('notes.destroy', $note) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        @endcan
                    </div>
                @endforeach
                {{ $notes->links() }}
            @else
                <p>There doesn't seem to be any notes.</p>
            @endif
        </div>
    </div>
@endsection
