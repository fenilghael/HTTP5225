<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="detail-card">
            <div class="detail-header">
                <h3 class="mb-0">
                    <i class="fas fa-book"></i> Course Details
                </h3>
            </div>
            <div class="detail-body">
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-hashtag"></i> Course ID:
                    </div>
                    <div class="detail-value">{{ $course->id }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-book"></i> Course Title:
                    </div>
                    <div class="detail-value">{{ $course->name }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-align-left"></i> Course Description:
                    </div>
                    <div class="detail-value">{{ $course->description }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-chalkboard-teacher"></i> Professor:
                    </div>
                    <div class="detail-value">
                        @if($course->professor)
                            <span class="badge bg-success">{{ $course->professor->name }}</span>
                        @else
                            <span class="text-muted">No professor assigned</span>
                        @endif
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-users"></i> Enrolled Students:
                    </div>
                    <div class="detail-value">
                        @if($course->students->count() > 0)
                            <div class="student-list">
                                @foreach($course->students as $student)
                                    <div class="student-item">
                                        <span class="badge bg-primary me-2">{{ $student->name }}</span>
                                        <small class="text-muted">{{ $student->email }}</small>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <span class="text-muted">No students enrolled</span>
                        @endif
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-calendar"></i> Date Created:
                    </div>
                    <div class="detail-value">{{ $course->created_at->format('F j, Y g:i A') }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-clock"></i> Last Modified:
                    </div>
                    <div class="detail-value">{{ $course->updated_at->format('F j, Y g:i A') }}</div>
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Modify
                    </a>
                    <a href="{{ route('courses.index') }}" class="nav-btn">
                        <i class="fas fa-arrow-left"></i> Back to Courses
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
