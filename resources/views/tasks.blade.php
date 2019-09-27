@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">New Task</div>

                <div class="card-body">
                    <form action="{{route('tasks.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control{{$errors->has('title') ? 'is-invalid':''}}" autocomplete="off">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('title')}}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"> Tasks</div>
                <div class="card-body">
                    <table class="table table-striped">
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    @if ($task->is_complete)
                                    <s>{{$task->title}}</s>
                                    @else
                                    {{$task->title}}
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if (!$task->is_complete)
                                <form action="{{route('tasks.update',$task->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-primary" type="submit">Complete</button>
                                </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach 
                    </table>
                    {{$tasks->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
