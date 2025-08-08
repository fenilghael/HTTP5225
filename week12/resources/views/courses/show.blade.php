<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="detail-card">
            <div class="detail-header">
                <h3 class="mb-0">
                    <i class="fas fa-book"></i> Program Details
                </h3>
            </div>
            <div class="detail-body">
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-hashtag"></i> Program ID:
                    </div>
                    <div class="detail-value">{{ $course->id }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-book"></i> Program Title:
                    </div>
                    <div class="detail-value">{{ $course->name }}</div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-align-left"></i> Program Description:
                    </div>
                    <div class="detail-value">{{ $course->description }}</div>
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
                    <a href="{{ route('programs.edit', $course->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Modify
                    </a>
                    <a href="{{ route('programs.index') }}" class="nav-btn">
                        <i class="fas fa-arrow-left"></i> Back to Programs
                    </a>
                    <form style="display: inline;" method="POST" action="{{ route('programs.destroy', $course->id) }}" 
                          onsubmit="return confirm('Are you certain you want to remove this program?')">
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
