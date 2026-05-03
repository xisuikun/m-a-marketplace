<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">Admin Control Center</h1>
        <p class="text-slate-500 mt-2">Oversee all marketplace activity, verify users, and approve deals.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Total Users</p>
            <p class="text-3xl font-black mt-2"><?php echo e(number_format($totalUsers)); ?></p>
            <p class="text-xs text-emerald-500 font-bold mt-1">Platform wide</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Active Deals</p>
            <p class="text-3xl font-black mt-2"><?php echo e(number_format($activeDeals)); ?></p>
            <p class="text-xs text-slate-400 font-bold mt-1">Currently listed</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Pending KYC</p>
            <p class="text-3xl font-black mt-2 text-orange-600"><?php echo e(number_format($pendingKyc)); ?></p>
            <p class="text-xs text-slate-400 font-bold mt-1">Require Action</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">NDAs Signed</p>
            <p class="text-3xl font-black mt-2"><?php echo e(number_format($ndasSigned)); ?></p>
            <p class="text-xs text-slate-400 font-bold mt-1">System wide</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl border border-slate-200">
            <h2 class="text-xl font-bold mb-6 font-mono text-slate-900">PENDING APPROVALS</h2>
            <div class="space-y-4">
                <?php $__empty_1 = true; $__currentLoopData = $pendingDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingDeal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="font-bold text-sm"><?php echo e($pendingDeal->title); ?></p>
                        <p class="text-xs text-slate-400">Seller: <?php echo e($pendingDeal->company->seller->name ?? 'Unknown'); ?> • $<?php echo e(number_format($pendingDeal->asking_price)); ?></p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-emerald-600 text-white px-3 py-1 rounded text-[10px] font-bold">APPROVE</button>
                        <button class="bg-white border border-slate-200 text-slate-400 px-3 py-1 rounded text-[10px] font-bold">REJECT</button>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-slate-400 text-sm italic">No deals pending approval.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="bg-slate-900 p-8 rounded-2xl text-white">
            <h2 class="text-xl font-bold mb-6 font-mono">SYSTEM ANALYTICS</h2>
            <div class="space-y-6">
                <!-- Mini Chart Scaffolding (using Tailind) -->
                <div>
                    <p class="text-xs text-slate-400 mb-2 font-bold uppercase">Marketplace Liquidity</p>
                    <div class="flex items-end gap-1 h-32">
                        <div class="bg-blue-600 w-full h-[60%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[40%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[80%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[95%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[70%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[50%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[85%] rounded-t-md"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH H:\laragon\www\m&a-marketplace-laravel-backend\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>