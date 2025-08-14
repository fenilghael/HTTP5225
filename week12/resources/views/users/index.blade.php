<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-users"></i> Student Directory
            </h1>
            <div class="nav-buttons">
                <a href="{{ route('courses.index') }}" class="nav-btn">
                    <i class="fas fa-graduation-cap"></i> Courses
                </a>
                <a href="{{ route('professors.index') }}" class="nav-btn">
                    <i class="fas fa-chalkboard-teacher"></i> Faculty Members
                </a>
                <a href="{{ route('users.create') }}" class="primary-btn">
                    <i class="fas fa-user-plus"></i> Register New Student
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

        @if($users->count() > 0)
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="table-header">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Full Name</th>
                            <th><i class="fas fa-envelope"></i> Email Address</th>
                            <th><i class="fas fa-graduation-cap"></i> Enrolled Courses</th>
                            <th><i class="fas fa-cogs"></i> Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="table-row">
                            <td><strong>{{ $user->id }}</strong></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->courses->count() > 0)
                                    <div class="course-tags">
                                        @foreach($user->courses as $course)
                                            <span class="badge bg-primary me-1">{{ $course->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">No courses enrolled</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn-view">
                                        <i class="fas fa-eye"></i> View Profile
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Modify
                                    </a>
                                    <form style="display: inline;" method="POST" action="{{ route('users.destroy', $user->id) }}" 
                                          onsubmit="return confirm('Are you certain you want to remove this student?')">
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
                <i class="fas fa-users-slash"></i>
                <h4>No students found in the system</h4>
                <p>Get started by registering the first student in the directory.</p>
                <a href="{{ route('users.create') }}" class="primary-btn">
                    <i class="fas fa-user-plus"></i> Register First Student
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html> 