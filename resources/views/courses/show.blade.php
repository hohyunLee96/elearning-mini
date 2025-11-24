<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ $course->title }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="mb-3">
            <p>{{ $course->description }}</p>
        </div>

        @auth
            @if(!$enrolled)
                <button id="enroll-btn" class="btn btn-primary mb-3">
                    Enroll in this course
                </button>
            @else
                <button id="unenroll-btn" class="btn btn-danger mb-3">
                    Deregister from this course
                </button>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mb-3">
                Login to enroll
            </a>
        @endauth


        <h4>Lessons</h4>
        <ul class="list-group">
            @forelse($course->lessons as $lesson)
                <li class="list-group-item">
                    {{ $lesson->order }}. {{ $lesson->title }}
                </li>
            @empty
                <li class="list-group-item">No lessons yet.</li>
            @endforelse
        </ul>
    </div>

    @auth
        @if($enrolled)
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('unenroll-btn');
                    if (!btn) return;

                    btn.addEventListener('click', function () {
                        if (!confirm('Are you sure you want to deregister?')) return;

                        $.ajax({
                            url: "{{ route('courses.unenroll', $course) }}",
                            type: 'DELETE',
                            success: function (data) {
                                alert(data.message);
                                location.reload();
                            },
                            error: function (xhr) {
                                alert('Error: ' + xhr.responseJSON.message);
                            }
                        });
                    });
                });
            </script>
        @endif
    @endauth
</x-app-layout>
