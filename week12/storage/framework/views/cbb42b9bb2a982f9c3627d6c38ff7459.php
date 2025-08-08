<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">User Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">ID:</div>
                            <div class="col-md-9"><?php echo e($user->id); ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Name:</div>
                            <div class="col-md-9"><?php echo e($user->name); ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Email:</div>
                            <div class="col-md-9"><?php echo e($user->email); ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Password:</div>
                            <div class="col-md-9">••••••••••••</div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <form style="display: inline;" method="POST" action="<?php echo e(route('users.destroy', $user->id)); ?>" 
                                  onsubmit="return confirm('Are you sure you want to delete this user?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> <?php /**PATH C:\xampp\htdocs\HTTP5225\week12\resources\views/users/show.blade.php ENDPATH**/ ?>