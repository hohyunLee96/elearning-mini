@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Courses</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            @forelse($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('courses.show', $course) }}" class="btn btn-primary btn-sm">
                                View Course
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No courses available yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
