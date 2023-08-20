@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (Session::has('alert-success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('alert-success')}}
                      </div>
                    @endif

                  <a class="btn btn-sm btn-info" href="{{route('todos.create')}}">Create ToDo</a>

                  @if ($todos->isEmpty())
                  <p>No todos to display.</p>
              @else
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($todos as $todo)
                          <tr>
                            <td>{{$todo->title}}</td>
                            <td>{{$todo->description}}</td>
                            <td>
                              @if ($todo->is_completed == 1)
                                  <a href="#" class="btn btn-sm btn-success">Completed</a>
                              @else 
                                  <a href="#" class="btn btn-sm btn-danger">Incomplete</a>
                              @endif 
                          </td>
                            <td>
                              <a href="{{ route('todos.show', ['id' => $todo->id]) }}" class="btn btn-sm btn-success">View</a>
                              <a href="{{ route('todos.edit', ['id' => $todo->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('todos.delete', ['id' => $todo->id]) }}" class="btn btn-sm btn-warning">Delete</a>
                            </td>    
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
