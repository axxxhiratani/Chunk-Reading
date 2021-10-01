<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students page') }}
        </h2>
    </x-slot>



    <h1>問題一覧</h1>
    <ul>

        <ul>
            @forelse ($bigs ?? '' as $big)

                <li>
                    <a href="">{{$big->name}}</a>

                    <a href="{{route('student.maintain',$big)}}">play</a>
                </li>

            @empty
                <li>empty</li>
            @endforelse

        </ul>

    </div>
    </ul>
</x-app-layout>
