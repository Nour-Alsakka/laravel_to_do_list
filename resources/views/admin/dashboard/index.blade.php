@extends('admin.layout')

@section('main')
    <div class="container my-4">

        <a class="btn btn-primary text-center " href="{{ route('dashboard.tasks.create') }}">add task</a>
        <div class="card my-4">
            <div class="card-header">Tasks List</div>
            <div class="card-body">
                @if ($tasks->count())
                    <table id="myTable" class="display">
                        <thead>

                            <tr>
                                <th scope="col">image</th>
                                <th scope="col">title</th>
                                <th scope="col">content</th>
                                <th scope="col">date</th>
                                <th scope="col">status</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="col-2">
                                        <img src="{{ url('storage/media/' . $task->image) }}" alt=""
                                            style="width: 60px;height: 60px;object-fit:cover">
                                    </td>
                                    <td class="col-4">{{ $task->title }}</td>
                                    <td class="col-4">{{ $task->desc }}</td>
                                    <td class="col-4">{{ $task->date }}
                                        <hr>
                                        @if ($task->status == 'مكتملة')
                                            <span style="font-weight:bold; color:purple">You did it 🥇</span>
                                        @else
                                            @if ($today > $task->date)
                                                <span style="color:red"> 💥You are late</span>
                                            @endif
                                            @if ($today == $task->date)
                                                <span style="color:orange"> 🙂today is the day</span>
                                            @endif
                                            @if ($today < $task->date)
                                                <span style="color:green"> 🥰you have time</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="col-4">{{ $task->status }}</td>
                                    <td class="col-2">
                                        <form action="{{ route('dashboard.tasks.destroy', [$task->id]) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ url('dashboard/tasks/' . $task->id . '/edit') }}"
                                                class="btn btn-success ">
                                                <i class="fa-solid fa-edit mx-2 text-white"></i>
                                            </a>

                                            <button type="submit" class="btn btn-danger ">
                                                <i class="fa-solid fa-trash mx-2 text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="text-align: center; font-weight:bold">There is No tasks to show</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
@endsection
