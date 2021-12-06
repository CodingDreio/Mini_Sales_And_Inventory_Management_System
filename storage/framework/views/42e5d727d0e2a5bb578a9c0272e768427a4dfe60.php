
<?php $__env->startSection('content'); ?>
    <script src="js/product.js"></script>
    <div class="container">
        <div class="d-md-flex justify-content-md-between mb-4">
            <h1>Sales and Inventory</h1>
            <button type="button" class="primary-button px-5" onclick="location.href = 'inventory/create';">Add</button>
        </div>
        <form action="<?php echo e(route('inventory_search')); ?>" method="GET">
            <div class="input-group mb-2">
                <input type="search" class="form-control search-bar" placeholder="Search" aria-label="Search" id="product_search" name="product_search"
                    aria-describedby="search-addon" />
                <button type="button" class="search-button px-4" onclick="location.href = 'inventory/search';">search</button>
            </div>
        </form>
        <div class="product-list">
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-row p-2 mb-1" onclick="location.href = 'inventory/show/<?php echo e($prod -> product_id); ?>';">
                    <div class="d-flex justify-content-around align-items-center">
                        <img src="<?php echo e($prod -> photo); ?>" class="product-pic rounded-circle me-3" onclick="showProduct($prod->product_id)">
                        <div class="product-name-price">
                            <p class="product-name"><?php echo e($prod -> product_name); ?></p>
                            <p class="product-price">P<?php echo e($prod -> price); ?></p>
                            <p class="product-quantity">Stock: <?php echo e($prod -> quantity); ?></p>
                        </div>
                        <div class="product-description me-3 w-100">
                        <?php echo e($prod -> product_description); ?>

                        </div>
                        <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon" onclick="showCRUD(<?php echo e($prod -> product_id); ?>)">
                        <div class="product-checkbox"> 
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </div>
                    <div class="crud-div mt-2" id="display-crud-<?php echo e($prod -> product_id); ?>">
                        <button type="button" class="secondary-button px-3 ms-1 delete-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            location.href = 'inventory/delete/<?php echo e($prod -> product_id); ?>';">
                        Delete</button>
                        <button type="button" class="primary-button px-3 ms-1 submit-button" onclick="
                            if (!e) var e = window.event;
                            e.cancelBubble = true;
                            if (e.stopPropagation) e.stopPropagation();
                            location.href = 'inventory/edit/<?php echo e($prod -> product_id); ?>';">
                        Update</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- <div class="product-row p-2 mb-1">
                <div class="d-flex justify-content-around align-items-center">
                    <img src="images/asus-rog.jpg" class="product-pic rounded-circle me-3">
                    <div class="product-name-price">
                        <p class="product-name">Asus ROG 5</p>
                        <p class="product-price">P30,000</p>
                        <p class="product-quantity">Stock: 2,000</p>
                    </div>
                    <div class="product-description me-3">
                    Play to the max with ROG Phone 5, the gaming phone that takes no prisoners. Powered to win by the latest Qualcomm® Snapdragon™ 888 5G Mobile Platform, this futuristic wonder packs an unbelievably responsive 144 Hz / 1 ms display, a monster 6000 mAh1 battery system, massively upgraded AirTrigger 5 game controls, and our iconic GameFX audio system. ROG Phone 5 will take your gaming to a new dimension — if you dare.
                    </div>
                    <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon" onclick="showCRUD()">
                    <div class="product-checkbox"> 
                        <input class="form-check-input" type="checkbox">
                    </div>
                </div>
                <div class="crud-div mt-2" id="display-crud">
                    <button type="button" class="secondary-button px-3 ms-1">Delete</button>
                    <button type="button" class="primary-button px-3 ms-1">Update</button>
                </div>
            </div> -->
            <div class="product-row p-2 mb-1 d-flex justify-content-around align-items-center">
                <img src="images/asus-rog.jpg" class="product-pic rounded-circle me-3">
                <div class="product-name-price">
                    <p class="product-name">Asus ROG 5</p>
                    <p class="product-price">P30,000</p>
                    <p class="product-quantity">Stock: 2,000</p>
                </div>
                <div class="product-description me-3">
                Play to the max with ROG Phone 5, the gaming phone that takes no prisoners. Powered to win by the latest Qualcomm® Snapdragon™ 888 5G Mobile Platform, this futuristic wonder packs an unbelievably responsive 144 Hz / 1 ms display, a monster 6000 mAh1 battery system, massively upgraded AirTrigger 5 game controls, and our iconic GameFX audio system. ROG Phone 5 will take your gaming to a new dimension — if you dare.
                </div>
                <img src="images/ellipsis-circle-svgrepo-com.svg" class="ellipsis-icon">
                <div class="product-checkbox"> 
                    <input class="form-check-input" type="checkbox">
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mt-2">
            <div class="select-multiple-blue p-2 me-2">
                <input class="form-check-input" type="checkbox" onclick="terms_changed(this)" class="select-multiple-check">
                <label class="form-check-label" for="select-multiple">
                    Select Multiple
                </label>
            </div>
            <button type="button" id="select-multiple" class="secondary-button px-2 mb-2 mt-2" disabled style="filter: opacity(50%)">Delete</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inventory_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ciann Renel Cazar\Documents\GitHub\Mini_Sales_And_Inventory_Management_System\resources\views/inventory.blade.php ENDPATH**/ ?>