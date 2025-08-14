<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="form-card">
            <div class="form-header">
                <h3 class="mb-0">
                    <i class="fas fa-edit"></i> Modify Professor
                </h3>
            </div>
            <div class="form-body">
                <form method="POST" action="{{ route('professors.update', $professor->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user-tie"></i> Professor Name
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $professor->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-check-circle"></i> Update Professor
                        </button>
                        <a href="{{ route('professors.index') }}" class="nav-btn">
                            <i class="fas fa-arrow-left"></i> Back to Faculty
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
