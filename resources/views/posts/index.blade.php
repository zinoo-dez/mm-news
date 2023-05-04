<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Post
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
            <div class="card p-2">
                @forelse ($posts as $post)
                    <div class="p-6 m-6 shadow-inner hover:shadow-lg shadow-slate-400 transition ease-in-out delay-150">
                        <div class="card-body ">
                            <h5 class="text-2xl mb-3">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="bg-info flex justify-between">
                            {{-- <p>{{ $post->user->id }}</p> --}}
                            <p>Post By <b><a
                                        href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></b>
                            </p>
                            <p>Created at <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b> </p>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
