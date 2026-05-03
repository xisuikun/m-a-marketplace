<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">M&A Marketplace</h1>
            <p class="text-slate-500 mt-2">Discover verified companies ready for acquisition.</p>
        </div>
        <form action="/" method="GET" class="flex flex-wrap items-center gap-3">
            <div class="relative flex-1 min-w-[200px]">
                <i class="fa fa-search absolute left-3 top-3 text-slate-400"></i>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Keyword..." class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            
            <select name="industry" class="px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white text-sm">
                <option value="">All Industries</option>
                <option value="SaaS & Software" <?php echo e(request('industry') == 'SaaS & Software' ? 'selected' : ''); ?>>SaaS & Software</option>
                <option value="E-commerce" <?php echo e(request('industry') == 'E-commerce' ? 'selected' : ''); ?>>E-commerce</option>
                <option value="Manufacturing" <?php echo e(request('industry') == 'Manufacturing' ? 'selected' : ''); ?>>Manufacturing</option>
                <option value="Healthcare" <?php echo e(request('industry') == 'Healthcare' ? 'selected' : ''); ?>>Healthcare</option>
            </select>

            <input type="text" name="location" value="<?php echo e(request('location')); ?>" placeholder="Location..." class="px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none text-sm w-40">

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-700 transition shadow-sm">
                Apply Filters
            </button>
            
            <?php if(request()->anyFilled(['search', 'industry', 'location'])): ?>
                <a href="/" class="text-slate-400 hover:text-slate-600 text-xs font-bold underline">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                        <?php echo e($deal->company->industry); ?>

                    </span>
                    <?php if($deal->is_confidential): ?>
                        <span class="text-slate-400 text-xs"><i class="fa fa-lock"></i> Confidential</span>
                    <?php else: ?>
                        <span class="text-slate-400 text-xs"><i class="fa fa-shield-halved"></i> Verified</span>
                    <?php endif; ?>
                </div>
                <h3 class="mt-4 text-xl font-bold text-slate-900"><?php echo e($deal->is_confidential ? 'Project ' . bin2hex(random_bytes(3)) : $deal->title); ?></h3>
                <p class="mt-2 text-slate-600 line-clamp-2"><?php echo e($deal->teaser); ?></p>
                
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">Revenue</p>
                        <p class="text-lg font-bold text-slate-900">$<?php echo e(number_format($deal->revenue_annual)); ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">EBITDA</p>
                        <p class="text-lg font-bold text-slate-900">$<?php echo e(number_format($deal->ebitda)); ?></p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">Asking Price</p>
                        <p class="text-xl font-extrabold text-blue-600">$<?php echo e(number_format($deal->asking_price)); ?></p>
                    </div>
                    <a href="/deals/<?php echo e($deal->id); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition">View Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-8">
        <?php echo e($deals->links()); ?>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH H:\laragon\www\m&a-marketplace-laravel-backend\resources\views/marketplace.blade.php ENDPATH**/ ?>