<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chunk reading') }}
        </h2>
    </x-slot>

    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>

        <script type="text/javascript" src="{{asset('js/prettify.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="{{url('css/prettify.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/_index.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/desert.css')}}">


        <script>
            var src_data = new Array({{count($conts)}});
            for(let y = 0; y < {{count($conts)}}; y++) {
                src_data[y] = new Array(2).fill(0);
            }
            var N = {{count($conts)}};
        </script>
    </head>


    <h1>問題画面</h1>


    <p>問題内容:{{$info->body}}</p>


    <form method="POST" action="{{route('student.logstore')}}">
        @csrf
        <select name="answer" id="">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
        </select>
        <input type="hidden" name="users_id" value="{{Auth::user()->id}}" >
        <input type="hidden" name="problem_infomations_id" value="{{$info->id}}" >
        <button>次へ</button>
    </form>

    <body onload="start();">

        <button id='button-prev-chunk' class='btn-circle-3d' src="">前</button>
        <button id='button-next-chunk' class='btn-circle-3d' src="">次</button>
        <div style="float:left;width:100%;">
            <pre id="src_text" class="prettyprint linenums">

                @forelse ($conts ?? '' as $cont)

                    <script>
                        src_data[{{$loop->index}}][0] = {{$cont->pro1}};


                        src_data[{{$loop->index}}][1] = '{{$cont->pro2}}';

                    </script>

                @empty

                @endforelse




            </pre>
        </div>
    </body>
</x-app-layout>
