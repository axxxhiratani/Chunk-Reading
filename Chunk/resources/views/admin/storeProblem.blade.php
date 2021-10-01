<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('add problem') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <head>
        <meta http-equiv="content-type" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>

    <script type="text/javascript">
        window.onload=addSample;
        //-------------------------------------------------------------------
        var SampleNum = 20;
        function addSample() {
            this.SampleNum++;
            document.getElementById("target").value = this.SampleNum;
            //document.body.row.value = this.SampleNum;
            var text = document.createElement('input');
            text.type = 'text';
            text.name = 'pro1_' + this.SampleNum;
            text.value = -1;
            text.style = "width:4em";
            var div = document.getElementById('TextSample');
            div.appendChild(text);

            var text = document.createElement('input');
            text.type = 'text';
            text.name = 'pro2_' + this.SampleNum ;
            text.style = "width:50em";
            var div = document.getElementById('TextSample');
            div.appendChild(text);
            if(this.SampleNum % 1 == 0) {
                // <br />を追加
                div.appendChild(document.createElement("br"));
            }
            document.frmSampleRegist.btnSampleDel.disabled = false;
            if(this.SampleNum == 100) {
                document.frmSampleRegist.btnSampleAdd.disabled = true;
            }
            // ロード時の処理（削除ボタンの無効化）
            if(this.SampleNum == 1) {
                document.frmSampleRegist.btnSampleDel.disabled = true;
            }
        }
        function delSample() {
            var div = document.getElementById('TextSample');
            if(this.SampleNum % 1 == 0) {
                div.removeChild(div.lastChild); // <br />を削除
            }
            div.removeChild(div.lastChild); // テキストボックスを削除
            this.SampleNum--;
            document.getElementById("target").value = this.SampleNum;
            div.removeChild(div.lastChild);

            document.frmSampleRegist.btnSampleAdd.disabled = false;
             if(this.SampleNum == 1) {
                 document.frmSampleRegist.btnSampleDel.disabled = true;
            }
        }
        //-------------------------------------------------------------------
        window.addEventListener('load', () => {
          const f = document.getElementById('file1');
          f.addEventListener('change', evt => {
            let input = evt.target;
            if (input.files.length == 0) {
              console.log('No file selected');
              return;
            }
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = () => {
              console.log(reader.result);
              setting(reader.result);
            };
            reader.readAsText(file);
          });
        });
        function setting(data){
          //1行ごとに代入
          let lines = data.split(/\r?\n/);
          let result = lines.map( line => line.split(" ") );
          let i = 1;
          result.forEach((item) => {
            let x="";
            item.forEach((get, j) => {
              x += get;
              x += " ";
            });

            let src = 'pro2_' + i;
            var name = document.getElementsByName(src);
            name[0].value = x;
            i++;
          });
        }
    </script>







<section class="bg-light text-center py-5">

    <div class="">
        <h2>{{$big->name}}</h2>
    </div>


    <form method="post" action="route{{'admin.proInfoStore'}}">
        @csrf
        <textarea id="story" name="body"rows="8" cols="80%" value="{{old('body')}}">
        </textarea>

        @error('body')
            <div class="error">{{ $message }}</div>
        @enderror

        <p>answer:</p>
        <select name="answer" cols="40%">
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
        </select>




        <div id="TextSample">
            @for ($i = 1; $i <= 20; $i++)
                <input type="text" name="pro1_{{$i}}" value=-1 style = "width:4em">
                <input type="text" name="pro2_{{$i}}" value= "" style = "width:50em">
                <br>
            @endfor
        </div>

        <input type="hidden" name="big_problems_id" value="{{$big->id}}">

        <input type="text" name="row" value="" id="target">

        <input type="button" id="btnSampleAdd" value="追加" onclick="addSample()">
        <input type="button" id="btnSampleDel" value="削除" onclick="delSample()">
        <button>add</button>
    </form>

    <input type="file" id="file1" />
    <pre id="pre1"></pre>
    <a href="{{route('admin.home')}}">戻る</a>
</section>




</x-app-layout>
