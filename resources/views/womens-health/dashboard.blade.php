@extends('layouts.app')

@section('title', 'Shifa - Advanced Women\'s and Children Health Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50" x-data="advancedHealthDashboard()">
    <div class="flex">
        <!-- Advanced Sidebar Navigation -->
        <div class="w-80 bg-white/80 backdrop-blur-xl shadow-2xl border-r border-gray-200/30 min-h-screen relative overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-teal-500/5"></div>
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-teal-500"></div>

            <!-- Logo and Header -->
            <div class="p-6 border-b border-gray-100/50 relative z-10">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 via-purple-600 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Shifa</h1>
                        <p class="text-xs text-gray-500 font-medium">Healthcare Excellence</p>
                    </div>
                </div>

                <!-- User Profile Card -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-4 border border-blue-200/50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                            DR
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Dr. Sarah Ahmed</p>
                            <p class="text-xs text-gray-600">Senior Physician</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Navigation Menu -->
            <nav class="px-4 py-6 space-y-2 relative z-10">
                <!-- Dashboard Overview -->
                <div class="flex items-center gap-3 px-4 py-3 text-blue-600 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-200/50 shadow-sm">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard Overview</span>
                    <div class="ml-auto w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                </div>

                <!-- Patient Management -->
                <div class="flex items-center gap-3 px-4 py-3 text-purple-600 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200/50 hover:shadow-md transition-all duration-300">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Patient Management</span>
                    <div class="ml-auto text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded-full">2,847</div>
                </div>

                <!-- Clinical Analytics -->
                <div class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-teal-600 hover:bg-gradient-to-r hover:from-teal-50 hover:to-blue-50 rounded-xl transition-all duration-300 group">
                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-teal-100 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Clinical Analytics</span>
                </div>

                <!-- AI Diagnostics -->
                <div class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-blue-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 rounded-xl transition-all duration-300 group">
                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-blue-100 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">AI Diagnostics</span>
                    <div class="ml-auto text-xs bg-gradient-to-r from-blue-500 to-purple-500 text-white px-2 py-1 rounded-full">AI</div>
                </div>

                <!-- Telemedicine -->
                <div class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-green-600 hover:bg-gradient-to-r hover:from-green-50 hover:to-teal-50 rounded-xl transition-all duration-300 group">
                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-green-100 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 group-hover:text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Telemedicine</span>
                    <div class="ml-auto w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                </div>

                <!-- Research & Reports -->
                <div class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-600 hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 rounded-xl transition-all duration-300 group">
                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-indigo-100 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Research & Reports</span>
                </div>

                <!-- Settings -->
                <div class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-gray-800 hover:bg-gradient-to-r hover:from-gray-50 hover:to-slate-50 rounded-xl transition-all duration-300 group">
                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 group-hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Settings</span>
                </div>
            </nav>

            <!-- Enhanced Schedule Appointment Button -->
            <div class="px-6 py-4 mt-auto absolute bottom-6 left-0 right-0">
                <button class="w-full bg-gradient-to-r from-blue-600 via-purple-600 to-teal-600 text-white font-bold py-4 px-6 rounded-2xl hover:shadow-2xl transition-all duration-500 flex items-center justify-center gap-3 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-purple-700 to-teal-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <svg class="w-6 h-6 relative z-10 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="relative z-10">Schedule Appointment</span>
                </button>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex">
            <!-- Central Dashboard Content -->
            <div class="flex-1 p-8 space-y-8">
                <!-- Enhanced Header -->
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-teal-600 bg-clip-text text-transparent mb-2">
                            Women's & Children Health
                        </h1>
                        <div class="flex items-center gap-4 text-gray-600">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm font-medium">Dhaka Medical Center</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm">Live Monitoring Active</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Real-time Status -->
                        <div class="flex items-center gap-2 bg-white/60 backdrop-blur-sm px-4 py-2 rounded-xl border border-gray-200/50 shadow-sm">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">System Online</span>
                        </div>
                        <!-- User Profile -->
                        <div class="flex items-center gap-3 bg-white/60 backdrop-blur-sm px-4 py-2 rounded-xl border border-gray-200/50 shadow-sm">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-semibold text-sm">
                                SA
                            </div>
                            <div>
                                <span class="text-sm font-semibold text-gray-700">Dr. Sarah Ahmed</span>
                                <p class="text-xs text-gray-500">Senior Physician</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Health Metrics Cards -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Sleep Quality with Advanced Analytics -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-6 border border-gray-200/30 hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full font-medium">+12%</div>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Sleep Quality Index</h3>
                            <p class="text-3xl font-bold text-blue-600 mb-2">8.7/10</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: 87%"></div>
                            </div>
                            <p class="text-xs text-gray-600">Avg. 7.2 hours/night</p>
                        </div>
                    </div>

                    <!-- Activity Levels with Heart Rate -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-6 border border-gray-200/30 hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-orange-600 bg-orange-100 px-2 py-1 rounded-full font-medium">Live</div>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Heart Rate Monitor</h3>
                            <p class="text-3xl font-bold text-orange-600 mb-2">72 BPM</p>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                                <span class="text-xs text-gray-600">Normal Range</span>
                            </div>
                            <p class="text-xs text-gray-600">Steps: 8,247 today</p>
                        </div>
                    </div>

                    <!-- Blood Pressure Monitoring -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-6 border border-gray-200/30 hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full font-medium">Optimal</div>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">Blood Pressure</h3>
                            <p class="text-3xl font-bold text-green-600 mb-2">120/80</p>
                            <div class="grid grid-cols-2 gap-2 mb-2">
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Systolic</p>
                                    <p class="text-sm font-semibold text-green-600">120</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Diastolic</p>
                                    <p class="text-sm font-semibold text-green-600">80</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AI Health Score -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-6 border border-gray-200/30 hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <div class="text-xs text-purple-600 bg-purple-100 px-2 py-1 rounded-full font-medium">AI</div>
                                </div>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-1">AI Health Score</h3>
                            <p class="text-3xl font-bold text-purple-600 mb-2">94%</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" style="width: 94%"></div>
                            </div>
                            <p class="text-xs text-gray-600">Excellent condition</p>
                        </div>
                    </div>
                </div>

                <!-- Advanced Progress Analytics -->
                <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/30 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Clinical Performance Metrics</h2>
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium text-sm">Real-time</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm">Weekly</button>
                            <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm">Monthly</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-5 gap-8">
                        <!-- Patient Satisfaction -->
                        <div class="text-center group">
                            <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mx-auto mb-3 shadow-lg group-hover:scale-110 transition-transform"></div>
                            <p class="text-sm font-semibold text-gray-700 mb-3">Patient Satisfaction</p>
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full transition-all duration-1000" style="width: 96%"></div>
                            </div>
                            <p class="text-lg font-bold text-blue-600">96%</p>
                            <p class="text-xs text-gray-500">+4% this month</p>
                        </div>

                        <!-- Treatment Success -->
                        <div class="text-center group">
                            <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-green-600 rounded-full mx-auto mb-3 shadow-lg group-hover:scale-110 transition-transform"></div>
                            <p class="text-sm font-semibold text-gray-700 mb-3">Treatment Success</p>
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full transition-all duration-1000" style="width: 89%"></div>
                            </div>
                            <p class="text-lg font-bold text-green-600">89%</p>
                            <p class="text-xs text-gray-500">+2% this month</p>
                        </div>

                        <!-- Response Time -->
                        <div class="text-center group">
                            <div class="w-6 h-6 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full mx-auto mb-3 shadow-lg group-hover:scale-110 transition-transform"></div>
                            <p class="text-sm font-semibold text-gray-700 mb-3">Response Time</p>
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-3 rounded-full transition-all duration-1000" style="width: 78%"></div>
                            </div>
                            <p class="text-lg font-bold text-orange-600">2.3min</p>
                            <p class="text-xs text-gray-500">-15% faster</p>
                        </div>

                        <!-- Quality Assurance -->
                        <div class="text-center group">
                            <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full mx-auto mb-3 shadow-lg group-hover:scale-110 transition-transform"></div>
                            <p class="text-sm font-semibold text-gray-700 mb-3">Quality Assurance</p>
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-3 rounded-full transition-all duration-1000" style="width: 92%"></div>
                            </div>
                            <p class="text-lg font-bold text-purple-600">92%</p>
                            <p class="text-xs text-gray-500">+7% this month</p>
                        </div>

                        <!-- Innovation Index -->
                        <div class="text-center group">
                            <div class="w-6 h-6 bg-gradient-to-r from-teal-500 to-teal-600 rounded-full mx-auto mb-3 shadow-lg group-hover:scale-110 transition-transform"></div>
                            <p class="text-sm font-semibold text-gray-700 mb-3">Innovation Index</p>
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-teal-500 to-teal-600 h-3 rounded-full transition-all duration-1000" style="width: 85%"></div>
                            </div>
                            <p class="text-lg font-bold text-teal-600">85%</p>
                            <p class="text-xs text-gray-500">+12% this month</p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Assessment Cards Grid -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Maternal Health Assessment -->
                    <div class="bg-gradient-to-br from-pink-100/80 to-rose-100/80 backdrop-blur-xl rounded-3xl p-6 border border-pink-200/50 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Maternal Care</h3>
                                <p class="text-xs text-gray-600">Prenatal Monitoring</p>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-pink-600 mb-1">847</p>
                        <p class="text-sm text-gray-600">Active pregnancies</p>
                        <div class="mt-3 flex items-center gap-2">
                            <div class="w-2 h-2 bg-pink-500 rounded-full"></div>
                            <span class="text-xs text-gray-600">98% on track</span>
                        </div>
                    </div>

                    <!-- Pediatric Care Assessment -->
                    <div class="bg-gradient-to-br from-blue-100/80 to-cyan-100/80 backdrop-blur-xl rounded-3xl p-6 border border-blue-200/50 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Pediatric Care</h3>
                                <p class="text-xs text-gray-600">Child Development</p>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-blue-600 mb-1">1,247</p>
                        <p class="text-sm text-gray-600">Children under care</p>
                        <div class="mt-3 flex items-center gap-2">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span class="text-xs text-gray-600">95% vaccinated</span>
                        </div>
                    </div>

                    <!-- Emergency Response -->
                    <div class="bg-gradient-to-br from-red-100/80 to-orange-100/80 backdrop-blur-xl rounded-3xl p-6 border border-red-200/50 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Emergency Care</h3>
                                <p class="text-xs text-gray-600">Critical Response</p>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-red-600 mb-1">24/7</p>
                        <p class="text-sm text-gray-600">Response time: 4.2min</p>
                        <div class="mt-3 flex items-center gap-2">
                            <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                            <span class="text-xs text-gray-600">12 active cases</span>
                        </div>
                    </div>

                    <!-- AI Diagnostics & Research -->
                    <div class="bg-gradient-to-br from-purple-100/80 to-indigo-100/80 backdrop-blur-xl rounded-3xl p-6 border border-purple-200/50 hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">AI Diagnostics</h3>
                                <p class="text-xs text-gray-600">Machine Learning</p>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-purple-600 mb-1">97.8%</p>
                        <p class="text-sm text-gray-600">Accuracy rate</p>
                        <div class="mt-3 flex items-center gap-2">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            <span class="text-xs text-gray-600">2,847 scans today</span>
                        </div>
                    </div>
                </div>

                <!-- Advanced Two Column Layout for Charts -->
                <div class="grid grid-cols-2 gap-8">
                    <!-- Left Chart - Advanced Analytics -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/30 shadow-xl">
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-bold text-gray-800">Advanced Health Analytics</h3>
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium">Live</button>
                                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-lg text-xs">Historical</button>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900 mb-2">Predictive Health Modeling</h4>
                            <p class="text-gray-600 text-sm mb-6">AI-powered insights for preventive care optimization</p>
                        </div>

                        <!-- Advanced Chart Area -->
                        <div class="h-64 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl flex items-center justify-center mb-6 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-teal-500/10"></div>
                            <div class="text-center relative z-10">
                                <!-- Simulated Advanced Chart -->
                                <div class="flex items-end gap-3 mb-6">
                                    <div class="w-6 h-20 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-32 bg-gradient-to-t from-purple-400 to-purple-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-16 bg-gradient-to-t from-teal-400 to-teal-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-28 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-36 bg-gradient-to-t from-purple-400 to-purple-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-24 bg-gradient-to-t from-teal-400 to-teal-500 rounded-t-lg shadow-lg"></div>
                                    <div class="w-6 h-30 bg-gradient-to-t from-blue-400 to-blue-500 rounded-t-lg shadow-lg"></div>
                                </div>
                                <div class="flex items-center justify-center gap-3">
                                    <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full shadow-lg"></div>
                                    <span class="text-sm text-gray-700 font-medium">Real-time Health Trends</span>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Chart Legend -->
                        <div class="grid grid-cols-3 gap-4 text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 bg-gradient-to-r from-blue-400 to-blue-500 rounded-full shadow-sm"></div>
                                <span class="text-gray-700">Maternal Health</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 bg-gradient-to-r from-purple-400 to-purple-500 rounded-full shadow-sm"></div>
                                <span class="text-gray-700">Child Development</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 bg-gradient-to-r from-teal-400 to-teal-500 rounded-full shadow-sm"></div>
                                <span class="text-gray-700">Preventive Care</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Chart - Patient Care Illustration -->
                    <div class="bg-white/40 backdrop-blur-xl rounded-3xl p-8 border border-gray-200/20 shadow-xl relative overflow-hidden">
                        <!-- Transparent Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full blur-3xl"></div>
                            <div class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-br from-teal-500 to-blue-500 rounded-full blur-3xl"></div>
                        </div>

                        <div class="relative z-10">
                            <div class="mb-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Comprehensive Care Network</h3>
                                <h4 class="text-2xl font-bold text-gray-900 mb-2">Integrated Health Ecosystem</h4>
                                <p class="text-gray-600 text-sm">Connecting patients, providers, and communities</p>
                            </div>

                            <!-- Enhanced Illustration Area -->
                            <div class="h-64 bg-gradient-to-br from-blue-50/50 to-purple-50/50 rounded-2xl flex items-center justify-center mb-6 relative">
                                <div class="text-center">
                                    <!-- Mother and Child Illustration with Enhanced Design -->
                                    <div class="relative">
                                        <div class="w-40 h-40 bg-gradient-to-br from-blue-200/60 to-purple-200/60 rounded-full flex items-center justify-center mb-6 shadow-2xl backdrop-blur-sm border border-white/30">
                                            <svg class="w-20 h-20 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <!-- Floating Elements -->
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-gradient-to-br from-teal-400 to-teal-500 rounded-full flex items-center justify-center shadow-lg">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="absolute -bottom-2 -left-2 w-6 h-6 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center shadow-lg">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center gap-3">
                                        <div class="w-3 h-3 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full shadow-lg"></div>
                                        <span class="text-sm text-gray-700 font-medium">24/7 Connected Care</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Care Network Stats -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-3 bg-white/50 rounded-xl backdrop-blur-sm border border-white/30">
                                    <p class="text-lg font-bold text-blue-600">2,847</p>
                                    <p class="text-xs text-gray-600">Active Patients</p>
                                </div>
                                <div class="text-center p-3 bg-white/50 rounded-xl backdrop-blur-sm border border-white/30">
                                    <p class="text-lg font-bold text-purple-600">98.7%</p>
                                    <p class="text-xs text-gray-600">Satisfaction Rate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Right Sidebar - Calendar & Advanced Features -->
            <div class="w-96 bg-white/80 backdrop-blur-xl shadow-2xl border-l border-gray-200/30 relative overflow-hidden">
                <!-- Animated Background -->
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-blue-500/5 to-teal-500/5"></div>

                <div class="p-6 relative z-10">
                    <!-- Enhanced Navigation Tabs -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex gap-1 bg-gray-100/80 backdrop-blur-sm rounded-xl p-1 border border-gray-200/50">
                            <button class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg shadow-lg">Dashboard</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">Health Records</button>
                            <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">Appointments</button>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                            <span class="text-xs text-gray-600 font-medium">3 alerts</span>
                        </div>
                    </div>

                    <!-- Enhanced Appointment Header -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">Smart Scheduling</h2>
                        <div class="flex gap-3 text-sm">
                            <button class="px-3 py-1 bg-purple-100 text-purple-700 rounded-lg font-medium">Today</button>
                            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-lg">Week</button>
                            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded-lg">Month</button>
                        </div>
                    </div>

                    <!-- Advanced Calendar -->
                    <div class="mb-8" x-data="advancedCalendar()">
                        <!-- Calendar Header -->
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-800">December 2024</h3>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </button>
                                <button class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Calendar Days Header -->
                        <div class="grid grid-cols-7 gap-1 mb-2">
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Sun</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Mon</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Tue</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Wed</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Thu</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Fri</div>
                            <div class="text-center text-xs font-semibold text-gray-500 p-2">Sat</div>
                        </div>

                        <!-- Calendar Grid -->
                        <div class="grid grid-cols-7 gap-1 mb-6">
                            <!-- Previous Month Days -->
                            <div class="text-center p-3 text-sm text-gray-400">26</div>
                            <div class="text-center p-3 text-sm text-gray-400">27</div>
                            <div class="text-center p-3 text-sm text-gray-400">28</div>
                            <div class="text-center p-3 text-sm text-gray-400">29</div>
                            <div class="text-center p-3 text-sm text-gray-400">30</div>

                            <!-- Current Month Days -->
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">1</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">2</div>

                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">3</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">4</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">5</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">6</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">7</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">8</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">9</div>

                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">10</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">11</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">12</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">13</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">14</div>
                            <!-- Today - Highlighted -->
                            <div class="text-center p-3 text-sm bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg cursor-pointer font-bold shadow-lg">15</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">16</div>

                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">17</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">18</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">19</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">20</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">21</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">22</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">23</div>

                            <!-- Appointment Day - Special Highlight -->
                            <div class="text-center p-3 text-sm bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg cursor-pointer font-bold shadow-lg relative">
                                24
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-600 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">25</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">26</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">27</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">28</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">29</div>
                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">30</div>

                            <div class="text-center p-3 text-sm text-gray-800 hover:bg-blue-50 rounded-lg cursor-pointer transition-colors">31</div>
                            <!-- Next Month Days -->
                            <div class="text-center p-3 text-sm text-gray-400">1</div>
                            <div class="text-center p-3 text-sm text-gray-400">2</div>
                            <div class="text-center p-3 text-sm text-gray-400">3</div>
                            <div class="text-center p-3 text-sm text-gray-400">4</div>
                            <div class="text-center p-3 text-sm text-gray-400">5</div>
                            <div class="text-center p-3 text-sm text-gray-400">6</div>
                        </div>

                        <!-- Enhanced Navigate to Waiting Button -->
                        <div class="mb-6">
                            <button class="w-full bg-gradient-to-r from-teal-500 via-blue-500 to-purple-500 text-white font-bold py-4 px-4 rounded-2xl hover:shadow-2xl transition-all duration-500 flex items-center justify-center gap-3 group relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-teal-600 via-blue-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <span class="relative z-10">View Waiting List</span>
                                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Enhanced Providers Section -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-800">Medical Team</h3>
                            <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</button>
                        </div>

                        <!-- Senior Medical Staff -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-4 flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                Senior Physicians
                            </h4>

                            <!-- Provider 1 -->
                            <div class="flex items-center gap-4 p-4 hover:bg-blue-50 rounded-xl transition-all duration-300 mb-3 border border-blue-100/50">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                    DR
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800">Dr. Fatima Rahman</p>
                                    <p class="text-xs text-gray-600">Maternal Health Specialist</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <span class="text-xs text-green-600">Available</span>
                                    </div>
                                </div>
                                <button class="w-8 h-8 bg-blue-100 hover:bg-blue-200 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Provider 2 -->
                            <div class="flex items-center gap-4 p-4 hover:bg-purple-50 rounded-xl transition-all duration-300 mb-3 border border-purple-100/50">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                    DR
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800">Dr. Ahmed Hassan</p>
                                    <p class="text-xs text-gray-600">Pediatric Care Expert</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <span class="text-xs text-yellow-600">In Surgery</span>
                                    </div>
                                </div>
                                <button class="w-8 h-8 bg-purple-100 hover:bg-purple-200 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Nursing Staff -->
                        <div>
                            <h4 class="font-bold text-gray-700 mb-4 flex items-center gap-2">
                                <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                                Nursing Team
                            </h4>

                            <!-- Team Lead -->
                            <div class="flex items-center gap-4 p-4 hover:bg-teal-50 rounded-xl transition-all duration-300 mb-3 border border-teal-100/50">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                                    NS
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800">Nurse Ayesha Khan</p>
                                    <p class="text-xs text-gray-600">Head Nurse - Maternity Ward</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <span class="text-xs text-green-600">On Duty</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Team Members -->
                            <div class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-xl transition-all duration-300">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-500 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md">
                                        R
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-500 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md">
                                        S
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md">
                                        M
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-500 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-md">
                                        +8
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-700">Support Team</p>
                                    <p class="text-xs text-gray-500">11 nurses on duty</p>
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="bg-gradient-to-r from-red-50 to-orange-50 rounded-2xl p-4 border border-red-200/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-red-700">Emergency Response</p>
                                    <p class="text-xs text-gray-600">24/7 Critical Care</p>
                                </div>
                            </div>
                            <button class="w-full bg-gradient-to-r from-red-500 to-orange-500 text-white font-bold py-3 px-4 rounded-xl hover:shadow-lg transition-all duration-300">
                                Call Emergency: 999
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Alpine.js Components -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('advancedHealthDashboard', () => ({
        selectedDate: null,
        currentView: 'dashboard',
        realTimeData: {
            heartRate: 72,
            bloodPressure: { systolic: 120, diastolic: 80 },
            temperature: 98.6,
            oxygenSaturation: 98
        },
        notifications: [
            { id: 1, type: 'urgent', message: 'High-risk pregnancy requires immediate attention', time: '5 min ago' },
            { id: 2, type: 'info', message: 'Vaccination schedule updated for 15 children', time: '10 min ago' },
            { id: 3, type: 'success', message: 'Monthly health metrics improved by 12%', time: '1 hour ago' }
        ],
        activePatients: 2847,
        appointmentsToday: 48,
        emergencyCases: 12,

        init() {
            console.log('Advanced Health Dashboard Initialized');
            this.startRealTimeUpdates();
            this.loadDashboardMetrics();
        },

        startRealTimeUpdates() {
            // Simulate real-time data updates
            setInterval(() => {
                this.updateVitalSigns();
            }, 5000);
        },

        updateVitalSigns() {
            // Simulate realistic vital sign fluctuations
            this.realTimeData.heartRate = Math.floor(Math.random() * (80 - 65) + 65);
            this.realTimeData.bloodPressure.systolic = Math.floor(Math.random() * (130 - 110) + 110);
            this.realTimeData.bloodPressure.diastolic = Math.floor(Math.random() * (85 - 70) + 70);
        },

        loadDashboardMetrics() {
            // Simulate loading advanced metrics
            console.log('Loading advanced health metrics...');
        },

        selectDate(date) {
            this.selectedDate = date;
            console.log('Selected date:', date);
        },

        switchView(view) {
            this.currentView = view;
        },

        dismissNotification(id) {
            this.notifications = this.notifications.filter(n => n.id !== id);
        },

        scheduleAppointment() {
            console.log('Opening appointment scheduler...');
            // Advanced appointment scheduling logic
        },

        generateReport() {
            console.log('Generating comprehensive health report...');
            // Advanced reporting functionality
        }
    }));

    Alpine.data('advancedCalendar', () => ({
        currentMonth: new Date().getMonth(),
        currentYear: new Date().getFullYear(),
        selectedDate: 15, // Today
        appointments: {
            24: { type: 'emergency', count: 3, priority: 'high' },
            15: { type: 'regular', count: 8, priority: 'normal' },
            18: { type: 'followup', count: 5, priority: 'low' }
        },

        init() {
            console.log('Advanced Calendar Component Initialized');
        },

        selectDate(date) {
            this.selectedDate = date;
            console.log('Calendar date selected:', date);
        },

        hasAppointment(date) {
            return this.appointments[date] !== undefined;
        },

        getAppointmentType(date) {
            return this.appointments[date]?.type || 'none';
        },

        navigateMonth(direction) {
            if (direction === 'next') {
                this.currentMonth = (this.currentMonth + 1) % 12;
                if (this.currentMonth === 0) this.currentYear++;
            } else {
                this.currentMonth = this.currentMonth === 0 ? 11 : this.currentMonth - 1;
                if (this.currentMonth === 11) this.currentYear--;
            }
        }
    }));
});
</script>
@endsection
