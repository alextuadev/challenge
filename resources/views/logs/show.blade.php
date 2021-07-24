@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{ route('task.index') }}">Task list</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2>Task</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Due date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->due_date }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row  mt-5">
                <div class="col-12">
                    <a class="btn btn-primary" href="{{ route('log.create') }}">Add logs</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2>Logs</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Commnet</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
