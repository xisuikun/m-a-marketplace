<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900">Edit Your Business Listing</h1>
        <p class="text-slate-500 mt-2">Update your business details to keep investors informed.</p>
    </div>

    <form action="/listings/<?php echo e($deal->id); ?>" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Company Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Company Name</label>
                    <input type="text" name="company_name" value="<?php echo e($deal->company->name); ?>" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Industry</label>
                    <select name="industry" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="SaaS & Software" <?php echo e($deal->company->industry == 'SaaS & Software' ? 'selected' : ''); ?>>SaaS & Software</option>
                        <option value="E-commerce" <?php echo e($deal->company->industry == 'E-commerce' ? 'selected' : ''); ?>>E-commerce</option>
                        <option value="Manufacturing" <?php echo e($deal->company->industry == 'Manufacturing' ? 'selected' : ''); ?>>Manufacturing</option>
                        <option value="Healthcare" <?php echo e($deal->company->industry == 'Healthcare' ? 'selected' : ''); ?>>Healthcare</option>
                        <option value="Retail" <?php echo e($deal->company->industry == 'Retail' ? 'selected' : ''); ?>>Retail</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Location</label>
                <input type="text" name="location" value="<?php echo e($deal->location); ?>" required placeholder="City, Country" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Company Description & Teaser</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"><?php echo e($deal->company->description); ?></textarea>
            </div>
        </div>

        <div class="space-y-4 pt-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Deal Specifications</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Project Title</label>
                    <input type="text" name="deal_title" value="<?php echo e($deal->title); ?>" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Deal Type</label>
                    <select name="deal_type" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="sale_100" <?php echo e($deal->deal_type == 'sale_100' ? 'selected' : ''); ?>>100% Acquisition</option>
                        <option value="partial_sale" <?php echo e($deal->deal_type == 'partial_sale' ? 'selected' : ''); ?>>Partial Sale</option>
                        <option value="fundraising" <?php echo e($deal->deal_type == 'fundraising' ? 'selected' : ''); ?>>Fundraising</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Asking Price ($)</label>
                    <input type="number" name="asking_price" value="<?php echo e($deal->asking_price); ?>" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Annual Revenue ($)</label>
                    <input type="number" name="revenue_annual" value="<?php echo e($deal->revenue_annual); ?>" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">EBITDA ($)</label>
                    <input type="number" name="ebitda" value="<?php echo e($deal->ebitda); ?>" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Net Profit ($)</label>
                <input type="number" name="net_profit" value="<?php echo e($deal->net_profit); ?>" min="0" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_confidential" value="1" id="confidential" <?php echo e($deal->is_confidential ? 'checked' : ''); ?> class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="confidential" class="text-sm text-slate-700">Keep this listing confidential (Hide company name until NDA is signed)</label>
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                Update Listing
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH H:\laragon\www\m&a-marketplace-laravel-backend\resources\views/listings/edit.blade.php ENDPATH**/ ?>