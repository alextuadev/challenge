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
                <h2>New task</h2>
                <form action="{{ route('task.store') }} " method="post" class="row g-3">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <label for="userAssined" class="form-label">User assigned</label>
                        <select required class="form-select" name="user_id">
                            <option value="">Choose one</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }} ">{{ $user->name }} </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="due_date" class="form-label">Due date</label>
                        <input required name="due_date" type="date" class="form-control" id="due_date"
                            value="{{ old('due_date') }}">
                        @error('due_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea required name="description" class="form-control" id="description"
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" href="{{ route('task.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
