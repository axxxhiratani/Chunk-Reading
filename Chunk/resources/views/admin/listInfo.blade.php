<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Problem List') }}
        </h2>
    </x-slot>


    <div class="">

        <h1>problem list</h1>
        <ul>
            @forelse ($infos ?? '' as $info)

                <li>
                    <a href="">{{$info->id}}</a>
                </li>
                <li>
                    <a href="">{{$info->body}}</a>
                </li>
            @empty
                <li>empty</li>
            @endforelse

        </ul>


        <a href="{{route('admin.home')}}">戻る</a>

    </div>



</x-app-layout>
