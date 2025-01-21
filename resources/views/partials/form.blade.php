<form action="/addcomment/{{$project->id}}" method="post">
    @csrf
    <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center text-secondary fs-1">
                <div id="newPName"></div>
                <div>{{$project->id}}</div>

                <div id="counter">0</div>
                @foreach($comments as $comment)
                    @foreach($Groups as $Group)
                        @if($Group->project_id == $project->id)
                            @if($Group->comment_id = $comment->id)
                            <div>{{$Group}}</div>
                                <textarea id="newComment" rows="4" cols="50">{{$comment->comment}}</textarea>
                        @endif
                        @endif
                    @endforeach

                @endforeach

                <div class="d-flex justify-content-center">
                    <div class="p-3">
                        <div class="btn btn-outline-secondary" id="startBtn">Start</div>
                    </div>
                    <div class="p-3">
                        <div class="btn btn-outline-secondary" id="save">Stop</div>
                    </div>
                </div>

            </div>
        </div>
        </div>
</form>
