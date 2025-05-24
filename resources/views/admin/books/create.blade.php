@extends('layouts.admin')

@section('content')
    <h1>Add Book</h1>
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>File</label>
            <input type="file" name="book_file" class="form-control">
        </div>

        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Pages</label>
            <input type="number" name="pages" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Author</label>
            <select name="author_id" class="form-control" required>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="book_img" class="form-control">
        </div>

        <div class="mb-3">
            <label>Audio File</label>
            <input type="file" name="book_audio" class="form-control" id="bookAudioInput">
        </div>

        <div class="mb-3">
            <label>Audio Duration (HH:MM:SS)</label>
            <input type="text" name="audio_time" class="form-control" id="audioDurationInput" readonly>
        </div>

        <!-- Yashirin audio elementi -->
        <audio id="hiddenAudio" style="display: none;"></audio>

        <script>
            document.getElementById('bookAudioInput').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const audio = document.getElementById('hiddenAudio');
                    const objectUrl = URL.createObjectURL(file);

                    audio.src = objectUrl;
                    audio.load();

                    audio.onloadedmetadata = function() {
                        const duration = audio.duration;
                        const hours = Math.floor(duration / 3600).toString().padStart(2, '0');
                        const minutes = Math.floor((duration % 3600) / 60).toString().padStart(2, '0');
                        const seconds = Math.floor(duration % 60).toString().padStart(2, '0');

                        const formatted = `${hours}:${minutes}:${seconds}`;
                        document.getElementById('audioDurationInput').value = formatted;

                        URL.revokeObjectURL(objectUrl); // Yoddan o'chirish
                    };
                }
            });
        </script>


        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
