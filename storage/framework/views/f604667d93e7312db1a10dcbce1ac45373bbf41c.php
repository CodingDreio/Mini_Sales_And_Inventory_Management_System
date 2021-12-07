
<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="container">
            <div class="vh-75 d-flex align-items-center">
                <div class="container my-5 justify-content-center align-items-center h-auto">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="<?php echo e(asset('images/prodigy_sales_wg.svg')); ?>" class="home-logo p-5">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo e(route('cashierNew',['si'=>0])); ?>"  style="text-decoration: none;">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <img class="cashier-opt-img" src="<?php echo e(asset('images/cart.png')); ?>" alt="Cart">
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <h3 class="text-success">Make New Purchase</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo e(route('cashier_sales',['id'=>Auth::id()])); ?>" style="text-decoration: none;">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <img class="cashier-opt-img" src="<?php echo e(asset('images/sale.png')); ?>" alt="Cart">
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <h3 class="text-success">View Sales</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
     



























<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cashier_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\3. Projects\Web Development\Laravel 8\PSale\resources\views/cashier.blade.php ENDPATH**/ ?>