@extends('admin.layout')

@section('main')
    <div class="container my-4">

        <a class="btn btn-primary text-center " href="{{ route('dashboard.tasks.create') }}">add task</a>
        <div class="my-4 p-2">
            <h2 class="text-center mb-3">Tasks List</h2>
                @if ($tasks->count())

                        @foreach ($tasks as $task)
                            <div class="row border mb-3">
                                <div class="col-1 p-0">
                                    <img src="{{ url('storage/media/' . $task->image) }}" alt=""
                                        style="width: 100%;height: 100%;object-fit:cover">
                                </div>
                                <div class="col-3  p-2 ">{{ $task->title }}</div>
                                <div class="col-4  p-2 ">{{ $task->desc }}</div>
                                <div class="col-2  p-2 ">deadline: {{ $task->date }}
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
                                </div>
                                <div class="col-1  p-2 ">Status:<br> {{ $task->status }}</div>
                                <div class="col-1  p-2 ">
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
                                </div>
                            </div>
                        @endforeach

                @else
                    <p style="text-align: center; font-weight:bold">There is No tasks to show</p>
                @endif

        </div>
    </div>

    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
@endsection
