<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="form-card">
            <div class="form-header">
                <h3 class="mb-0">
                    <i class="fas fa-plus-circle"></i> Create New Course
                </h3>
            </div>
            <div class="form-body">
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-book"></i> Course Title
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
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i> Course Description
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="professor_id" class="form-label">
                            <i class="fas fa-chalkboard-teacher"></i> Assign Professor
                        </label>
                        <select class="form-select @error('professor_id') is-invalid @enderror" 
                                id="professor_id" name="professor_id">
                            <option value="">Select a Professor (Optional)</option>
                            @foreach($professors as $professor)
                                <option value="{{ $professor->id }}" 
                                    {{ old('professor_id') == $professor->id ? 'selected' : '' }}>
                                    {{ $professor->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('professor_id')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-check-circle"></i> Create Course
                        </button>
                        <a href="{{ route('courses.index') }}" class="nav-btn">
                            <i class="fas fa-arrow-left"></i> Back to Courses
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
