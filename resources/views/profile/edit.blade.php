@include('layouts.index_admin')
<div class="main-content">
    <div class="py-2 d-flex gap-5 justify-content-center">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            {{-- I ERASE THE DELETE FORM FROM HERE SO THE ADMIN CAN NOT DELETE HIS ACCOUNT --}}
    </div>
</div>
