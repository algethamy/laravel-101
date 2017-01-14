@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->name }}</div>
                    <div class="panel-body">
                        <form action="/users/{{ $user->id }}/questions" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="question">Your question:</label>
                                <textarea name="question" id="question" class="form-control" rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>



                <div class="panel panel-default">
                    <div class="panel-heading">Questions to {{ $user->name }}</div>
                    <div class="panel-body">

                        <ul class="list-group">

                            @foreach($user->questions as $question)
                            <li class="list-group-item">
                                {{ $question->question }}
                                <form action="/questions/{{ $question->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </form>

                                <hr>

                                @if(!$question->answer)
                                <form action="/users/{{ $user->id }}/questions/{{ $question->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group">
                                        <label for="answer">Answer:</label>
                                        <textarea name="answer" id="answer" class="form-control" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                @else
                                    Answer: {{ $question->answer }}
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection