<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Problem List') }}
        </h2>
    </x-slot>


    <div class="">

        <a href="{{route('admin.transStoreBig')}}">大門登録</a>

        <h1>add problem list</h1>
        <ul>
            @forelse ($bigs ?? '' as $big)

                <li>

                    <a href="{{route('admin.problemBigList',$big)}}">{{$big->name}}</a>

                    <a href="{{route('admin.problemStore',$big)}}">追加</a>
                    <a href="{{route('admin.bigDestroy',$big)}}">消去</a>
                </li>
            @empty
                <li>empty</li>
            @endforelse

        </ul>


        <a href="{{route('admin.home')}}">戻る</a>

    </div>



</x-app-layout>
