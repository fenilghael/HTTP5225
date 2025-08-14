<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-chalkboard-teacher"></i> Faculty Directory
            </h1>
            <div class="nav-buttons">
                <a href="{{ route('users.index') }}" class="nav-btn">
                    <i class="fas fa-users"></i> Students
                </a>
                <a href="{{ route('courses.index') }}" class="nav-btn">
                    <i class="fas fa-graduation-cap"></i> Courses
                </a>
                <a href="{{ route('professors.create') }}" class="primary-btn">
                    <i class="fas fa-plus-circle"></i> Add New Professor
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

        @if($professors->count() > 0)
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="table-header">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user"></i> Professor Name</th>
                            <th><i class="fas fa-graduation-cap"></i> Assigned Course</th>
                            <th><i class="fas fa-calendar"></i> Date Added</th>
                            <th><i class="fas fa-cogs"></i> Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($professors as $professor)
                        <tr class="table-row">
                            <td><strong>{{ $professor->id }}</strong></td>
                            <td>{{ $professor->name }}</td>
                            <td>
                                @if($professor->course)
                                    <span class="badge bg-success">{{ $professor->course->name }}</span>
                                @else
                                    <span class="text-muted">No course assigned</span>
                                @endif
                            </td>
                            <td>{{ $professor->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('professors.show', $professor->id) }}" class="btn-view">
                                        <i class="fas fa-eye"></i> View Profile
                                    </a>
                                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Modify
                                    </a>
                                    <form style="display: inline;" method="POST" action="{{ route('professors.destroy', $professor->id) }}" 
                                          onsubmit="return confirm('Are you certain you want to remove this professor?')">
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
                <i class="fas fa-chalkboard-teacher"></i>
                <h4>No professors found in the system</h4>
                <p>Get started by adding the first professor to the faculty.</p>
                <a href="{{ route('professors.create') }}" class="primary-btn">
                    <i class="fas fa-plus-circle"></i> Add First Professor
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
