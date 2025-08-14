<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="detail-card">
            <div class="detail-header">
                <h3 class="mb-0">
                    <i class="fas fa-user"></i> Student Profile
                </h3>
            </div>
            <div class="detail-body">
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-hashtag"></i> Student ID:
                    </div>
                    <div class="detail-value">{{ $user->id }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-user"></i> Full Name:
                    </div>
                    <div class="detail-value">{{ $user->name }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-envelope"></i> Email Address:
                    </div>
                    <div class="detail-value">{{ $user->email }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-lock"></i> Secure Password:
                    </div>
                    <div class="detail-value">••••••••••••</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-graduation-cap"></i> Enrolled Courses:
                    </div>
                    <div class="detail-value">
                        @if($user->courses->count() > 0)
                            <div class="course-list">
                                @foreach($user->courses as $course)
                                    <div class="course-item">
                                        <span class="badge bg-primary me-2">{{ $course->name }}</span>
                                        <small class="text-muted">{{ $course->description }}</small>
                                        @if($course->professor)
                                            <br><small class="text-info">Professor: {{ $course->professor->name }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span class="text-muted">No courses enrolled</span>
                        @endif
                    </div>
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Modify
                    </a>
                    <a href="{{ route('users.index') }}" class="nav-btn">
                        <i class="fas fa-arrow-left"></i> Back to Directory
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 