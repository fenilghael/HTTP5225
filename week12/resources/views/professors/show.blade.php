<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="profile-card">
            <div class="profile-header">
                <h2 class="mb-0">
                    <i class="fas fa-user-tie"></i> Professor Profile
                </h2>
            </div>
            <div class="profile-body">
                <div class="profile-info">
                    <div class="info-row">
                        <label><i class="fas fa-hashtag"></i> ID:</label>
                        <span>{{ $professor->id }}</span>
                    </div>
                    <div class="info-row">
                        <label><i class="fas fa-user"></i> Name:</label>
                        <span>{{ $professor->name }}</span>
                    </div>
                    <div class="info-row">
                        <label><i class="fas fa-calendar"></i> Date Added:</label>
                        <span>{{ $professor->created_at->format('M d, Y g:i A') }}</span>
                    </div>
                    <div class="info-row">
                        <label><i class="fas fa-graduation-cap"></i> Assigned Course:</label>
                        @if($professor->course)
                            <span class="badge bg-success">{{ $professor->course->name }}</span>
                        @else
                            <span class="text-muted">No course assigned</span>
                        @endif
                    </div>
                </div>

                @if($professor->course)
                <div class="course-details mt-4">
                    <h4><i class="fas fa-book"></i> Course Details</h4>
                    <div class="info-row">
                        <label>Course Name:</label>
                        <span>{{ $professor->course->name }}</span>
                    </div>
                    <div class="info-row">
                        <label>Description:</label>
                        <span>{{ $professor->course->description }}</span>
                    </div>
                    <div class="info-row">
                        <label>Students Enrolled:</label>
                        <span>{{ $professor->course->students->count() }} students</span>
                    </div>
                </div>
                @endif

                <div class="action-buttons mt-4">
                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Modify Profile
                    </a>
                    <a href="{{ route('professors.index') }}" class="nav-btn">
                        <i class="fas fa-arrow-left"></i> Back to Faculty
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
