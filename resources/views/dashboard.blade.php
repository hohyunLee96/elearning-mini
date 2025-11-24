<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Courses
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @php
                    $enrollments = auth()->user()
                        ->enrollments()
                        ->with('course')
                        ->get();
                @endphp

                @if($enrollments->isEmpty())
                    <p>You are not enrolled in any courses yet.</p>
                @else
                    <ul class="list-group">
                        @foreach($enrollments as $enrollment)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $enrollment->course->title }}
                                <a href="{{ route('courses.show', $enrollment->course) }}" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
