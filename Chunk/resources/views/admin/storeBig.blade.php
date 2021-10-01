<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="">

        <h1>add Big problem</h1>

            <form method="post" action="{{ route('admin.storeBig') }}">
                @csrf
                <div class="">
                    <label>
                        Title
                        <input type="text" name="name" value="{{old('name')}}">
                    </label>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="">
                    <button>Add</button>
                </div>
            </form>

        <a href="{{route('admin.home')}}">戻る</a>

    </div>



</x-app-layout>
