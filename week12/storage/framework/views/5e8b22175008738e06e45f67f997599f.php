<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professors Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Professors Database</h1>
                    <div>
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-outline-secondary me-2">Users</a>
                        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-outline-secondary me-2">Courses</a>
                    </div>
                </div>
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> 
                    <strong>Database Setup Complete!</strong> This shows the 10 fake professors that were seeded into the database.
                </div>

                <?php if($professors->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Professor Name</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $professors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($professor->id); ?></td>
                                    <td><?php echo e($professor->name); ?></td>
                                    <td><?php echo e($professor->created_at->format('M d, Y g:i A')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <div class="alert alert-success">
                            <i class="bi bi-check-circle"></i> 
                            <strong>Success!</strong> Found <?php echo e($professors->count()); ?> professors in the database.
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle"></i> No professors found in database. 
                        Run: <code>php artisan db:seed --class=ProfessorSeeder</code>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HTTP5225\week12\resources\views/professors/index.blade.php ENDPATH**/ ?>