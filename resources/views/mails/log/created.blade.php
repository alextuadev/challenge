<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<body>
    <p>
        Hello, {{ $task->creator->name }}
    </p>
    <p>
        A new comment has been registered in the task: <strong> # {{ $task->id }} - {{ $task->description }}
        </strong>
    </p>
    <p>
        <strong>Detail log:</strong>
    </p>
    <p>
        Comment: {{ $log->comment }}

    </p>
    <p>Created at: {{ $log->created_at }}</p>
</body>

</html>
