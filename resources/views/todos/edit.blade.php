@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To-Do</div>

                <div class="card-body">
                    <h4>Edit Form</h4>
                    <form action="{{route('todos.update')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$editInfo->id}}" name="todo_id">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $editInfo->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" cols="5" rows="5">{{ $editInfo->description }}</textarea>  
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_completed" class="form-control">
                                <option disabled selected>Select Option</option>
                                <option value="1">Completed</option>
                                <option value="0">Incompleted</option>
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection