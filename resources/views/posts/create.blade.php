<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Post
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 w-full m-auto p-3">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" class="w-[500px] m-auto  p-5 border bottom-1 mt-5 rounded-md border-blue-400"
        action="{{ route('posts.store') }}">
        @csrf

        <h3 class="text-xl text-blue-100 text-center">Create New Post</h3>

        {{-- category --}}
        <div class="mb-3">
            <x-input-label for="category" :value="__('Category')" />


            <select id="category" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose a Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>

        </div>

        <!-- Title  -->
        <div class="mb-3">
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        {{-- description --}}
        <div class="mb-3">
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">


            <x-primary-button class="ml-3">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
