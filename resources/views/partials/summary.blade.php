@extends('layoute.index')
@section('content')
    <div class="container m-auto p-5">
        <div class="card">
            <div class="text-center">Summary</div>
            @foreach($projects as $project)
            <table class="table table-hover">
                <thead>
                <tr>
                    <td class="col text-left">{{$project->name}} - {{$project->id}}</td>
                </tr>
                </thead>
                @foreach($Groups as $Group)
                    @foreach($comments as $comment)
                        @if($Group->project_id === $project->id)
                            @if($Group->comment_id === $comment->id)
                                <tbody>
                                <tr>
                                    <td class="m-1 row justify-content-center">
                                        Comment: {{$comment->comment}} |
                                        Elapsedtime: {{$comment->elapsedTime}} |
                                        Presenttime: {{$comment->presentTime}}
                                    </td>
                                </tr>
                                </tbody>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </table>
            @endforeach
        </div>
    </div>
    <div class="text-center p-5">
        <a class="btn btn-success index">Back</a>
    </div>
@endsection
