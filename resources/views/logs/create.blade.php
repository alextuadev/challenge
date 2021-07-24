@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{ route('logs.index') }}">Logs list</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2>New comment</h2>
                <form action="{{ route('logs.store') }} " method="post" class="row g-3">
                    @csrf
                    <input type='hidden' value="{{ $task_id }}" name="task_id">

                    <div class="col-md-12 mb-2">
                        <label for="description" class="form-label">Comment</label>
                        <textarea required name="comment" class="form-control" id="comment"
                            rows="3">{{ old('comment') }}</textarea>
                        @error('comment')
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
