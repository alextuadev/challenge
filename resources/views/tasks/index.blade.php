@extends('layouts.app')


@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{ route('task.create') }}">Create task</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2>Task list</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User assigned</th>
                            <th scope="col">Description</th>
                            <th scope="col">Due date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $item)
                            <tr>
                                <td><a href="{{ route('task.show', ['task' => $item->id]) }}">{{ $item->id }}</a>
                                </td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->due_date }}</td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
