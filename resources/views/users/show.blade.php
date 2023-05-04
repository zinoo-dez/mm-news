<x-app-layout>
    {{-- {{ $user->id }} --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="delete">
            </form>
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="card p-2">
                @forelse ($user->posts as $post)
                    <div class="p-6 m-6 shadow-inner hover:shadow-lg shadow-slate-400 transition ease-in-out delay-150">
                        <div class="card-body ">
                            <h5 class="text-3xl mb-3">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="bg-info flex justify-between">
                            {{-- <p>Post By <b><a
                                        href="{{ route('users.users', $post->user->id) }}">{{ $post->user->name }}</a></b>
                            </p> --}}
                            <p>Date By <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b> </p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
