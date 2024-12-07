<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <!-- 如果你使用了 Tailwind CSS, 请确保已经加载了它 -->
</head>
<body class="bg-burlywood">

    <!-- 用来包裹页面内容的 guest-layout -->
    <x-guest-layout>
        <!-- 表单容器 -->
        <div class="max-w-md mx-auto mt-10 bg-white shadow-md rounded-lg p-6 sm:mt-[-33.33333%] sm:ml-[-33.33333%] sm:mr-[-33.33333%] sm:mb-[-33.33333%]">
            <!-- 注册标题 -->
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">{{ __('Register') }}</h2>
            
            <!-- 注册表单 -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- 用户名 -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- 邮箱地址 -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- 密码 -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                  type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- 确认密码 -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                                  type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- 已经注册链接和提交按钮 -->
                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-guest-layout>

</body>
</html>
