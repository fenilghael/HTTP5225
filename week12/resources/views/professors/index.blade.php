<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-chalkboard-teacher"></i> Faculty Directory
            </h1>
            <div class="nav-buttons">
                <a href="{{ route('learners.index') }}" class="nav-btn">
                    <i class="fas fa-users"></i> Learners
                </a>
                <a href="{{ route('programs.index') }}" class="nav-btn">
                    <i class="fas fa-graduation-cap"></i> Educational Programs
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

        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> 
            <strong>Database Initialization Complete!</strong> This displays the 10 sample faculty members that were seeded into the database.
        </div>

        @if($faculty->count() > 0)
            <div class="table-responsive">
                <table class="table data-table">
                    <thead class="table-header">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-user-tie"></i> Faculty Member Name</th>
                            <th><i class="fas fa-calendar-alt"></i> Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculty as $member)
                        <tr class="table-row">
                            <td><strong>{{ $member->id }}</strong></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->created_at->format('M d, Y g:i A') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> 
                <strong>Success!</strong> Found {{ $faculty->count() }} faculty members in the database.
            </div>
        @else
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> No faculty members found in database. 
                Run: <code>php artisan db:seed --class=ProfessorSeeder</code>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
