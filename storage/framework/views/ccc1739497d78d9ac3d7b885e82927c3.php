<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">Buyer Workspace</h1>
        <p class="text-slate-500 mt-2">Manage your active bids and confidential data rooms.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-2xl border border-slate-200">
                <h2 class="text-xl font-bold mb-6 flex items-center font-mono">
                    <span class="h-2 w-2 bg-blue-600 rounded-full mr-2"></span> DATA ROOMS ACCESS
                </h2>
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $ndas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-white rounded-lg flex items-center justify-center border border-slate-200 mr-4">
                                <i class="fa fa-folder-open text-blue-500"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900"><?php echo e($nda->deal->title); ?></p>
                                <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest">Signed at: <?php echo e($nda->signed_at->format('d/m/Y')); ?></p>
                            </div>
                        </div>
                        <a href="/deals/<?php echo e($nda->deal->id); ?>" class="bg-white px-4 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition">Enter VDR</a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-slate-400 text-sm italic">You haven't requested any confidential data rooms yet.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-200">
                <h2 class="text-xl font-bold mb-6 flex items-center font-mono">
                    <span class="h-2 w-2 bg-emerald-600 rounded-full mr-2"></span> ACTIVE OFFERS
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black">
                            <tr>
                                <th class="px-4 py-3">Project</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Expires</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-4 py-4 font-bold text-slate-900"><?php echo e($offer->deal->title); ?></td>
                                <td class="px-4 py-4 font-black">$<?php echo e(number_format($offer->amount)); ?></td>
                                <td class="px-4 py-4">
                                    <span class="bg-orange-50 text-orange-600 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border border-orange-100"><?php echo e($offer->status); ?></span>
                                </td>
                                <td class="px-4 py-4 text-slate-400 font-mono"><?php echo e($offer->expires_at->format('d/m/Y')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-400 italic">No offers sent yet.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-slate-900 text-white p-8 rounded-2xl">
                <h3 class="font-bold text-lg mb-4">Ready to Acquire?</h3>
                <p class="text-slate-400 text-sm mb-6 leading-relaxed">Our AI-powered matching engine suggests deals based on your acquisition criteria.</p>
                <div class="p-4 bg-slate-800 rounded-xl mb-4 border border-slate-700">
                    <p class="text-[10px] text-blue-400 uppercase font-black mb-1">AI Suggestion</p>
                    <p class="font-bold text-sm">FinTech Payment Gateway</p>
                    <p class="text-xs text-slate-500 mt-1">EBITDA: $2M • EU Market</p>
                </div>
                <a href="/" class="block w-full bg-blue-600 text-center py-3 rounded-xl font-bold text-sm hover:bg-blue-700 transition">Search Marketplace</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH H:\laragon\www\m&a-marketplace-laravel-backend\resources\views/dashboard/buyer.blade.php ENDPATH**/ ?>