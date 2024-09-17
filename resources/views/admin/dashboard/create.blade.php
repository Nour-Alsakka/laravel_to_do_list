@extends('admin.layout')
@section('main')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <ol>
                @foreach ($errors->all() as $error)
                    <li style="color: red;font-size: 28px">{{ $error }}</li>
                @endforeach
            </ol>
        @endif

        <div class="card my-4">
            <div class="card-header text-center">Add New Task</div>
            <div class="card-body">
                <form action="{{ route('dashboard.tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="desc">desc:</label>
                        <textarea type="text" id="desc" name="desc" class="form-control">{{ old('desc', '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" class="form-control"
                            value="{{ old('image', '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" class="form-control"
                            value="{{ old('date', '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="status">status:</label>
                        <select name="status" id="status" value="{{ old('status', '') }}">
                            <option @if (old('status', '') == 'مسودة') selected @endif value="مسودة">مسودة</option>
                            <option @if (old('status', '') == 'قيد التنفيذ') selected @endif value="قيد التنفيذ">قيد التنفيذ
                            </option>
                            <option @if (old('status', '') == 'مكتملة') selected @endif value="مكتملة">مكتملة</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/dashboard/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection
