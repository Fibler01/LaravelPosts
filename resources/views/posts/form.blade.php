<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if ($flag === 'new')
                    Criar novo post
                @else
                    Editar post
                @endif
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="padding: 20px">
                    @if ($errors->any())
                        <ul style="color: red">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action={{ $route }} method="POST">
                        @csrf {{-- permite apenas uma sessão logada enviar ao servidor --}}
                        <x-input-label for="title">Título do post</x-input-label>
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                            value="{{($flag==='new')?old('title'):$post->title}}"></x-text-input>
                        <x-input-label class="mt-4">Conteúdo da postagem</x-input-label>
                        <textarea name="post_content" id="post_content" cols="30" rows="10" class="w-full p-3 m-2 border-0 shadow">{{($flag==='new')?old('post_content'):$post->content}}</textarea>
                        <x-primary-button style="background-color:rgb(41, 41, 134)">Enviar post</x-primary-button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
