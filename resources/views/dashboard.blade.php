<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">{{ __("Welcome back!") }}</h3>
                    <p>{{ __("Here's a quick overview of your activities.") }}</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-500 dark:bg-blue-700 shadow-md rounded-lg p-6 text-white">
                    <h4 class="text-xl font-bold">Courses</h4>
                    <p class="mt-2 text-lg">8 Active Courses</p>
                </div>
                <div class="bg-green-500 dark:bg-green-700 shadow-md rounded-lg p-6 text-white">
                    <h4 class="text-xl font-bold">Assignments</h4>
                    <p class="mt-2 text-lg">3 Due This Week</p>
                </div>
                <div class="bg-purple-500 dark:bg-purple-700 shadow-md rounded-lg p-6 text-white">
                    <h4 class="text-xl font-bold">Messages</h4>
                    <p class="mt-2 text-lg">5 Unread</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="/" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                        {{ __('Back to Home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
