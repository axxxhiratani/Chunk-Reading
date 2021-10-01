<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin page') }}
        </h2>
    </x-slot>

    <ul>
      <li><a href="{{route('admin.problemList')}}">問題一覧</a></li>
      <li><a href="">ユーザー管理　</a></li>


    </ul>
</x-app-layout>
