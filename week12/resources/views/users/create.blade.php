<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="form-card">
            <div class="form-header">
                <h3 class="mb-0">
                    <i class="fas fa-user-plus"></i> Register New Student
                </h3>
            </div>
            <div class="form-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Secure Password
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="courses" class="form-label">
                            <i class="fas fa-graduation-cap"></i> Select Courses
                        </label>
                        <select class="form-select @error('courses') is-invalid @enderror" 
                                id="courses" name="courses[]" multiple>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" 
                                    {{ in_array($course->id, old('courses', [])) ? 'selected' : '' }}>
                                    {{ $course->name }} - {{ $course->description }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Hold Ctrl (or Cmd on Mac) to select multiple courses</small>
                        @error('courses')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-check-circle"></i> Register Student
                        </button>
                        <a href="{{ route('users.index') }}" class="nav-btn">
                            <i class="fas fa-arrow-left"></i> Back to Directory
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 