<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($title) }} {{-- pegando titulo do controller --}}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2x1 my-4">{{($post->title)}}</h2>
                    <p>
                        {{($post->content)}}
                    </p>
                </div>
            </div>
        </div>

</x-app-layout>
