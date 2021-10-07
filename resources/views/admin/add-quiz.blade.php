@extends('layouts.dashboard')
@section('title')
    <title>Dashboard</title>
@endsection
@section('main')
    <h1>Add New Quiz</h1>
    <div>
        <div>
            <div>
                <form method="post" action="{{route('store.quiz')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Quiz Title" name="title" required class="form-control">
                        <label>Valid From</label>
                        <input name="from_time" type="datetime-local">
                        <label>Valid Till</label>
                        <input name="to_time" type="datetime-local">

                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Duration in Minute" name="duration" type="number" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
