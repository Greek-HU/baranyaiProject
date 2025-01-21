@extends('layoute.index')
@section('content')
    <div class="container m-auto">
        <div class="card text-center">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td class="col">Track Time for Project</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="row">
                        <form action="/projects" method="POST" id="projectForm">
                            @csrf
                            <input type="text" id="newProjectName" name="new_project_name" class="text-center text-success" placeholder="Add new project">
                        </form>
                    </td>
                    @foreach($projects as $project)
                        <td class="m-1 row justify-content-center projects" data-id="{{$project->id}}">{{$project->name}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
        <div class="container card text-center p-2 summary">Összegzés</div>
    </div>
@endsection
