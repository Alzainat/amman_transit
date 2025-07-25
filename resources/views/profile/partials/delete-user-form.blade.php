<section class="space-y-6" dir="rtl">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('حذف الحساب') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('بمجرد حذف حسابك، سيتم حذف جميع البيانات والموارد المرتبطة به بشكل نهائي. يُرجى التأكد من تحميل أي بيانات أو معلومات تريد الاحتفاظ بها قبل المتابعة.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('حذف الحساب') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 text-right">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('هل أنت متأكد من رغبتك في حذف الحساب؟') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('بمجرد حذف الحساب، سيتم حذف جميع البيانات والمعلومات بشكل دائم. الرجاء إدخال كلمة المرور لتأكيد الحذف.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('كلمة المرور') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('إلغاء') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('حذف الحساب') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
