<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Project;
use App\Models\ProjectGroupment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function public()
    {
        $projects = Project::all();
        $comments = Comments::all();
        $Groups = ProjectGroupment::all();

        return view('partials.projects', [
            'projects' => $projects,
            'comments' => $comments,
            'Groups' => $Groups,
        ]);
    }

    public function saveComment(Request $request, $comment_id, $project_id)
    {
        $data = $request->all();
        $comment = Comments::find($comment_id);
        $findIds = ProjectGroupment::where('project_id', $project_id)->get();
        foreach ($findIds as $findId)
        {
        }

        $elapsedTime = Carbon::parse($comment->elapsedTime);
        $presentTime = Carbon::parse($comment->presentTime);
        $diffrence = $presentTime->diffInSeconds($elapsedTime);

        if ($comment->comment === $data['comment'])
        {
            $comment->elapsedTime = $comment->presentTime;
            $comment->presentTime = $data['newTime'];
            $comment->difference = $diffrence;
            $comment->update();

            return back();
        }

        $newComment = new Comments();
        $newComment->comment = $data['comment'];
        $newComment->elapsedTime = '00:00:00';
        $newComment->presentTime = $data['newTime'];
        $newComment->difference = $diffrence;
        $newComment->save();

        $addtoGroup = ProjectGroupment::create([
            'project_id' => $project_id,
            'comment_id' => $comment_id
        ]);

        return back();

    }
    public function saveProject(Request $request)
    {
        $project = new Project;
        $project->name = $request->input('new_project_name');
        $project->save();

        $comment = new Comments;
        $comment->comment = '';
        $comment->elapsedTime = '00:00:00';
        $comment->presentTime = '00:00:00';
        $comment->difference = '0';
        $comment->save();

        $addtoGroup = ProjectGroupment::create([
            'project_id' => $project->id,
            'comment_id' => $comment->id
        ]);

        return back();
    }
    public function summery()
    {
        $projects = Project::all();
        $comments = Comments::all();
        $Groups = ProjectGroupment::all();

        return view('partials.summary', [
            'projects' => $projects,
            'comments' => $comments,
            'Groups' => $Groups
        ]);
    }
    public function comment($id)
    {
        $project = Project::find($id);
        $comments = Comments::all();
        $Groups = ProjectGroupment::all();
        $findIds = ProjectGroupment::where('project_id', $id)->get();
        foreach ($findIds as $findId)
        {
        }

        return view('partials.formBox', [
            'project' => $project,
            'comments' => $comments,
            'Groups' => $Groups,
            'findId' => $findId
        ]);
    }
}
