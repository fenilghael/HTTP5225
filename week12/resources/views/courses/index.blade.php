<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-graduation-cap"></i> Courses Directory
            </h1>
            <div class="nav-buttons">
                <a href="{{ route('users.index') }}" class="nav-btn">
                    <i class="fas fa-users"></i> Students
                </a>
                <a href="{{ route('professors.index') }}" class="nav-btn">
                    <i class="fas fa-chalkboard-teacher"></i> Faculty
                </a>
                <a href="{{ route('courses.create') }}" class="primary-btn">
                    <i class="fas fa-plus-circle"></i> Create New Course
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($courses->count() > 0)
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="table-header">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-book"></i> Course Title</th>
                            <th><i class="fas fa-align-left"></i> Description</th>
                            <th><i class="fas fa-chalkboard-teacher"></i> Professor</th>
                            <th><i class="fas fa-users"></i> Enrolled Students</th>
                            <th><i class="fas fa-calendar"></i> Date Created</th>
                            <th><i class="fas fa-cogs"></i> Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr class="table-row">
                            <td><strong>{{ $course->id }}</strong></td>
                            <td>{{ $course->name }}</td>
                            <td>{{ Str::limit($course->description, 100) }}</td>
                            <td>
                                @if($course->professor)
                                    <span class="badge bg-success">{{ $course->professor->name }}</span>
                                @else
                                    <span class="text-muted">No professor assigned</span>
                                @endif
                            </td>
                            <td>
                                @if($course->students->count() > 0)
                                    <span class="badge bg-info">{{ $course->students->count() }} students</span>
                                @else
                                    <span class="text-muted">No students enrolled</span>
                                @endif
                            </td>
                            <td>{{ $course->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn-view">
                                        <i class="fas fa-eye"></i> View Details
                                    </a>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Modify
                                    </a>
                                    <form style="display: inline;" method="POST" action="{{ route('courses.destroy', $course->id) }}" 
                                          onsubmit="return confirm('Are you certain you want to remove this course?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h4>No courses found in the system</h4>
                <p>Get started by creating the first course.</p>
                <a href="{{ route('courses.create') }}" class="primary-btn">
                    <i class="fas fa-plus-circle"></i> Create First Course
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
