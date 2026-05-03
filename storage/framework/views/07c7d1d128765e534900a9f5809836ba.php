<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Seller Dashboard</h1>
            <p class="text-slate-500 mt-2">Manage your business listings and track investor interest.</p>
        </div>
        <button class="bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
            <i class="fa fa-plus mr-2"></i> List New Business
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- My Businesses -->
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-xl font-bold uppercase tracking-widest text-slate-400 text-xs">Your Listings</h2>
            
            <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php $__currentLoopData = $company->deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded text-[10px] font-bold uppercase"><?php echo e($company->industry); ?></span>
                                <span class="bg-slate-100 text-slate-500 px-2 py-0.5 rounded text-[10px] font-bold uppercase border border-slate-200"><?php echo e($deal->status); ?></span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900"><?php echo e($deal->title); ?></h3>
                            <p class="text-sm text-slate-500 mt-1">Listing ID: #<?php echo e($deal->id); ?> • Updated <?php echo e($deal->updated_at->diffForHumans()); ?></p>
                        </div>
                        
                        <div class="flex items-center gap-8">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Interests</p>
                                <p class="text-xl font-black text-slate-900"><?php echo e($deal->ndas->count()); ?></p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Offers</p>
                                <p class="text-xl font-black text-slate-900"><?php echo e($deal->offers->count()); ?></p>
                            </div>
                            <div class="flex gap-2">
                                <a href="/deals/<?php echo e($deal->id); ?>" class="p-2 text-slate-400 hover:text-blue-600"><i class="fa fa-eye"></i></a>
                                <button class="p-2 text-slate-400 hover:text-slate-600"><i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Interest List -->
                    <?php if($deal->ndas->count() > 0): ?>
                    <div class="bg-slate-50 px-6 py-4 border-t border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase mb-3">Recently Signed NDAs</p>
                        <div class="flex -space-x-2">
                            <?php $__currentLoopData = $deal->ndas->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="h-8 w-8 rounded-full bg-blue-600 border-2 border-white flex items-center justify-center text-[10px] text-white font-bold" title="<?php echo e($nda->user->name); ?>">
                                    <?php echo e(strtoupper(substr($nda->user->name, 0, 2))); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($deal->ndas->count() > 5): ?>
                                <div class="h-8 w-8 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] text-slate-500 font-bold">
                                    +<?php echo e($deal->ndas->count() - 5); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="bg-white p-12 rounded-2xl border border-dashed border-slate-300 text-center">
                    <p class="text-slate-400 italic">No listings found. Start by adding your company.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Stats Sidebar -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-widest text-xs">Selling Progress</h3>
                <div class="space-y-6">
                    <div class="relative">
                        <div class="flex justify-between text-xs font-bold mb-1">
                            <span class="text-slate-400">Profile Completion</span>
                            <span class="text-blue-600">85%</span>
                        </div>
                        <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="bg-blue-600 h-full w-[85%]"></div>
                        </div>
                    </div>
                    <div>
                        <ul class="text-xs space-y-3">
                            <li class="flex items-center text-emerald-600"><i class="fa fa-check-circle mr-2"></i> KYC Verified</li>
                            <li class="flex items-center text-emerald-600"><i class="fa fa-check-circle mr-2"></i> Tax Records Uploaded</li>
                            <li class="flex items-center text-slate-400"><i class="fa fa-circle mr-2 text-[8px]"></i> Upload Teaser PDF</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-600 p-8 rounded-2xl text-white">
                <h3 class="font-bold text-lg mb-2">Need Valuation?</h3>
                <p class="text-indigo-100 text-sm mb-6">Our experts can help you determine the fair market value of your business.</p>
                <button class="w-full bg-indigo-500 text-white py-3 rounded-xl font-bold text-sm border border-indigo-400 hover:bg-indigo-400 transition">Get Valuation Report</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH H:\laragon\www\m&a-marketplace-laravel-backend\resources\views/dashboard/seller.blade.php ENDPATH**/ ?>