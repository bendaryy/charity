<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <x-app-layout>
        <x-slot name="header">

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('الإسم') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('البريد الإلكترونى') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('كلمة السـر') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('تأكيد كلمة الســر') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                    Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                    Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif
                <div style="margin: 20px 0">

                    <select class="custom-select" name="charity_id">
                        @foreach ($Branches as $branch)
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    <div style="text-align: center; margin:20px 0">
                        <a style="text-align: center" href="{{ route('branch.create') }}" class="btn btn-success">إضافة فرع جديد</a>

                    </div>
                </div>
                    <div class="tab-content">
                    <div class="tab-bane active" id="users">
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_create">إضافة مستفيد جديد</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_read">عرض جميع المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_update">تعديل على المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_delete">مسح المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_read">عرض أعضاء الجمعيات</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_create">إنشاء عضو جديد</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_delete">مسح الأعضاء</label>

                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('لدى حساب بالفعل؟') }}
                    </a> --}}

                    <x-jet-button class="ml-4">
                        {{ __('إضافة') }}
                    </x-jet-button>
                </div>
            </form>
        </x-slot>
    </x-app-layout>
</body>

</html>
