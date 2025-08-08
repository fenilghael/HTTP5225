<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learner Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="detail-card">
            <div class="detail-header">
                <h3 class="mb-0">
                    <i class="fas fa-user"></i> Learner Profile
                </h3>
            </div>
            <div class="detail-body">
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-hashtag"></i> Learner ID:
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
                
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('learners.edit', $user->id) }}" class="btn-edit">
                        <i class="fas fa-edit"></i> Modify
                    </a>
                    <a href="{{ route('learners.index') }}" class="nav-btn">
                        <i class="fas fa-arrow-left"></i> Back to Directory
                    </a>
                    <form style="display: inline;" method="POST" action="{{ route('learners.destroy', $user->id) }}" 
                          onsubmit="return confirm('Are you certain you want to remove this learner?')">
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