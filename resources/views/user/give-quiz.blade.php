@extends('layouts.dashboard')
@section('title')
    <title>Quiz</title>
@endsection
@section('main')
    <h1>It's a Quiz Page</h1>
    <h2>Quiz Title: {{$quiz->title}}</h2>
    <h3>Exam Time: {{$quiz->duration}} Minutes or {{$quiz->duration*60}} Seconds</h3>
    <h4>Timer: <div id="timer_style"><label id="minutes">00</label>:<label id="seconds">00</label></div></h4>
    <div class="text-center">
        <form method="post" action="{{route('store.answer')}}">
            @csrf
            <input type="hidden" name="quiz_id" value="{{$quiz->id}}" readonly required>
            <input id="start_time" type="hidden" name="start_time" value="{{$start_time}}" readonly required>
            @php
            $i=1;
            @endphp
            @foreach($questions as $question)
                <select name="answer[{{$i++}}]" class="form-control" required>
                <option selected disabled value>Question: {{$question->question}}</option>
                    <option value="option_a">{{$question->option_a}}</option>
                    <option value="option_b">{{$question->option_b}}</option>
                    <option value="option_c">{{$question->option_c}}</option>
                    <option value="option_d">{{$question->option_d}}</option>
                </select>

                <hr>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>

        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime() {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds % 60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
        }

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }
        function myFunction() {
            window.setTime=null;
            window.pad=null;
            document.getElementById('timer_style').innerHTML="Time is Up!";
            document.getElementById('timer_style').style.color='red'
        }
        window.setTimeout(myFunction, {{$quiz->duration*60*1000}});
    </script>
@endsection
