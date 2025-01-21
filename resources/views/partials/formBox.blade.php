@extends('layoute.index')
@section('content')
<form action="/updateComment/{{$findId->comment_id}}/{{$project->id}}" method="post">
    @csrf
        <div class="container ">
            <div class="card text-center text-secondary fs-1">
                <div id="newPName">{{$project->name}}</div>
                @foreach($comments as $comment)
                    @foreach($Groups as $Group)
                        @if($project->id === $Group->project_id)
                            @if($comment->id === $Group->comment_id)
                                <div data-field="commentTime" class="counter"  data-id="{{$project->id}}"
                                    data-g_id="{{$Group->id}}">{{$comment->presentTime}}</div>
                                <input type="text" id="newTime" name="newTime" style="display: none" value="{{$comment->presentTime}}">
                                <textarea id="newComment" name="comment" rows="4" cols="50">{{$comment->comment}}</textarea>
                            @endif
                        @endif
                    @endforeach
                @endforeach
                <div class="d-flex justify-content-center">
                    <div class="p-3">
                        <div class="btn btn-outline-secondary" id="startBtn">Start</div>
                    </div>
                    <div class="p-3">
                        <button class="btn btn-outline-secondary" id="save">Stop</button>
                    </div>
                </div>
            </div>
        </div>
</form>
<div class="text-center p-5">
    <a class="btn btn-success index">Back</a>
</div>
@endsection
