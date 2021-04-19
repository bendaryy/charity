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
            @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session()->get('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('users.update',$user->id) }}">
                @csrf
                @method("PUT")
                <div>
                    <x-jet-label for="name" value="{{ __('الإسم') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('البريد الإلكترونى') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                        value="{{ $user->email }}" required />
                </div>



                <div style="margin: 20px 0;display: inline">
                    <h4>اختر الفرع</h4>
                    <select class="custom-select" name="charity_id" required>
                        @foreach ($Branches as $branch)
                        <option {{ $user->charity_id == $branch->id?'selected':'' }} value="{{ $branch->id }}">
                            {{ $branch->name }}</option>
                        @endforeach
                    </select>

                </div>
                <h3 style="text-align: center;margin:20px;padding:20px">الصلاحيات</h3>
                @foreach ($permission as $permission )
                <label>
                    <input type="checkbox" name="permissions[]"
                        {{ $user->hasPermission("$permission->name") ? 'checked' : '' }} value="{{ $permission->id }}"
                        style="margin:3px" />
                    @if($permission->name == "users_delete")
                    مسح الأعضاء
                    @elseif($permission->name == "users_read")
                    عرض أعضاء الجمعيات
                    @elseif($permission->name == "users_create")
                    إنشاء عضو جديد
                    @elseif($permission->name == "users_update")
                    تعديل على الإعضاء
                    @elseif($permission->name == "charity_create")
                    إنشاء مستفيد جديد
                    @elseif($permission->name == "charity_delete")
                    مسح المستفيدين
                    @elseif($permission->name == "charity_read")
                    عرض جميع المستفيدين
                    @elseif($permission->name == "charity_update")
                    تعديل على الجمعية
                    @endif
                </label>
                @endforeach


                {{-- <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                name="permissions[]" value="charity_create">إضافة مستفيد
                جديد</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="charity_read">عرض جميع
                    المستفيدين</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="charity_update">تعديل على
                    المستفيدين</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="charity_delete">مسح
                    المستفيدين</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="users_read">عرض أعضاء
                    الجمعيات</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="users_create">إنشاء عضو
                    جديد</label>
                <label for=""><input type="checkbox" {{ $user->hasPermission("$permission->name") ? 'checked' : '' }}
                        name="permissions[]" value="users_delete">مسح
                    الأعضاء</label> --}}

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

                {{-- <div class="tab-content">
                    <div class="tab-bane active" id="users">
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_create">إضافة مستفيد
                            جديد</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_read">عرض جميع
                            المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_update">تعديل على
                            المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="charity_delete">مسح
                            المستفيدين</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_read">عرض أعضاء
                            الجمعيات</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_create">إنشاء عضو
                            جديد</label>
                        <label for=""><input type="checkbox" name="permissions[]" value="users_delete">مسح
                            الأعضاء</label>

                    </div>
                </div> --}}


                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('لدى حساب بالفعل؟') }}
                    </a> --}}
                    <div style="text-align: center;margin:auto">
                        <button class="btn btn-success" style="padding: 10px 30px">
                            {{ __('تعديل') }}
                            <button>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-app-layout>
</body>

</html>
