<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodigy Sales: Administrator</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Login: Prodigy Sales</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap_5_1_3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.scss')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    
    
    
    
    <nav class="prodigy-navbar">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="<?php echo e(asset('images/prodigy_sales_white.svg')); ?>" class="prodigy-sales-icon">Prodigy Sales</label>
        <ul>
            <li>
                <a href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
    </nav>
    
    
    
    
    
    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    
    
    <script src="<?php echo e(asset('js/v5.1.0_bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/font-awesome-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Ciann Renel Cazar\Documents\GitHub\Mini_Sales_And_Inventory_Management_System\resources\views/layouts/inventory_layout.blade.php ENDPATH**/ ?>