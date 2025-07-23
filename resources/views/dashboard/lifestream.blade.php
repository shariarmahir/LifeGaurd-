@extends('layouts.app')

@section('title', 'LifeStream Dashboard - Advanced Health Monitoring')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100" x-data="lifestreamDashboard" x-init="init()">
    <!-- Dashboard Header -->
<div class="bg-white/80 backdrop-blur-xl border-b border-gray-200/50 sticky top-0 z-50">
    <div class="container mx-auto px-8 py-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center">
                    <img src="{{ asset('images/icons/lifestream.png') }}" alt="LifeGuard+ Logo" class="w-12 h-12">
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-blue-600">LifeStream Dashboard</h1>
                    <p class="text-sm text-gray-600">Advanced Health Monitoring & Analytics</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-gray-700">LIVE</span>
                </div>
            </div>

                <!-- Control Panel -->
                <div class="flex flex-wrap gap-3">
                    <select x-model="selectedAge" @change="updateRiskAssessment()" class="px-4 py-2 bg-white/70 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Age</option>
                        <option value="18-25">18-25 years</option>
                        <option value="26-35">26-35 years</option>
                        <option value="36-45">36-45 years</option>
                        <option value="46-55">46-55 years</option>
                        <option value="56-65">56-65 years</option>
                        <option value="65+">65+ years</option>
                    </select>

                    <select x-model="selectedGender" @change="updateRiskAssessment()" class="px-4 py-2 bg-white/70 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>

                    <select x-model="selectedHabits" @change="updateLifestyleRecommendations()" class="px-4 py-2 bg-white/70 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Habits Profile</option>
                        <option value="active">Very Active</option>
                        <option value="moderate">Moderately Active</option>
                        <option value="sedentary">Sedentary</option>
                        <option value="smoker">Smoker</option>
                        <option value="non-smoker">Non-Smoker</option>
                        <option value="social-drinker">Social Drinker</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Overall Health Score -->
        <div class="mb-8">
        <div class="mb-8" x-data="{
            animatedScore: 0,
            targetScore: 87,
            animatedMetrics: {
                cardiovascular: 0,
                metabolic: 0,
                mental: 0,
                physical: 0
            },
            targetMetrics: {
                cardiovascular: 92,
                metabolic: 78,
                mental: 89,
                physical: 91
            }
        }" x-init="
            // Animate main score
            let start = 0;
            const duration = 2000;
            const startTime = Date.now();

            const animateScore = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);

                animatedScore = Math.floor(targetScore * easeOutCubic);

                if (progress < 1) {
                    requestAnimationFrame(animateScore);
                }
            };

            setTimeout(() => animateScore(), 500);

            // Animate sub-metrics with stagger
            Object.keys(targetMetrics).forEach((key, index) => {
                setTimeout(() => {
                    let metricStart = 0;
                    const metricDuration = 1500;
                    const metricStartTime = Date.now();

                    const animateMetric = () => {
                        const elapsed = Date.now() - metricStartTime;
                        const progress = Math.min(elapsed / metricDuration, 1);
                        const easeOutCubic = 1 - Math.pow(1 - progress, 3);

                        animatedMetrics[key] = Math.floor(targetMetrics[key] * easeOutCubic);

                        if (progress < 1) {
                            requestAnimationFrame(animateMetric);
                        }
                    };

                    animateMetric();
                }, 800 + (index * 200));
            });
        ">
            <div class="bg-gradient-to-br from-white/95 via-blue-50/90 to-purple-50/85 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
                <!-- Animated Background Elements -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full animate-pulse"></div>
                    <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-gradient-to-br from-purple-400/15 to-blue-400/15 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-blue-400/5 to-purple-400/5 rounded-full animate-spin" style="animation-duration: 20s;"></div>
                </div>

                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="flex items-center justify-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/health-score.png') }}" alt="Health Score" class="w-7 h-7">
                            </div>
                            <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 bg-clip-text text-transparent">
                                Overall Health Assessment
                            </h2>
                        </div>
                        <p class="text-gray-600 text-lg">Comprehensive analysis of your current health status</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                        <!-- Main Health Score Circle -->
                        <div class="lg:col-span-1 flex justify-center">
                            <div class="relative">
                                <!-- Outer Glow Ring -->
                                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 opacity-20 animate-pulse scale-110"></div>

                                <!-- Main Score Circle -->
                                <div class="relative w-48 h-48 flex items-center justify-center">
                                    <svg class="w-48 h-48 transform -rotate-90" viewBox="0 0 200 200">
                                        <!-- Background Circle -->
                                        <circle cx="100" cy="100" r="85" stroke="#e5e7eb" stroke-width="12" fill="transparent" opacity="0.3"/>

                                        <!-- Animated Progress Circle -->
                                        <circle cx="100" cy="100" r="85"
                                                stroke="url(#healthGradient)"
                                                stroke-width="12"
                                                fill="transparent"
                                                stroke-linecap="round"
                                                :stroke-dasharray="534"
                                                :stroke-dashoffset="534 - (animatedScore / 100) * 534"
                                                class="transition-all duration-1000 ease-out"
                                                style="filter: drop-shadow(0 0 8px rgba(59, 130, 246, 0.4))"/>

                                        <!-- Gradient Definition -->
                                        <defs>
                                            <linearGradient id="healthGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#3b82f6"/>
                                                <stop offset="50%" style="stop-color:#8b5cf6"/>
                                                <stop offset="100%" style="stop-color:#3b82f6"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>

                                    <!-- Score Display -->
                                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                                        <span class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent" x-text="animatedScore"></span>
                                        <span class="text-lg text-gray-600 font-semibold">Health Score</span>
                                        <div class="flex items-center gap-1 mt-2">
                                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                            <span class="text-sm text-green-600 font-semibold">Excellent</span>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>

                        <!-- Health Metrics Breakdown -->
                        <div class="lg:col-span-2">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Cardiovascular Health -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-red-400 to-pink-500 rounded-xl flex items-center justify-center">
                                            <img src="{{ asset('images/icons/heart-health.png') }}" alt="Heart" class="w-6 h-6">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800">Cardiovascular</h4>
                                            <p class="text-sm text-gray-600">Heart & Circulation</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold text-red-500" x-text="animatedMetrics.cardiovascular + '%'"></span>
                                        <span class="text-sm text-green-600 font-semibold">↑ +2.3%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-gradient-to-r from-red-400 to-pink-500 h-3 rounded-full transition-all duration-1000 ease-out"
                                             :style="`width: ${animatedMetrics.cardiovascular}%`"></div>
                                    </div>
                                </div>

                                <!-- Metabolic Health -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-yellow-500 rounded-xl flex items-center justify-center">
                                            <img src="{{ asset('images/icons/metabolic-health.png') }}" alt="Metabolic" class="w-6 h-6">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800">Metabolic</h4>
                                            <p class="text-sm text-gray-600">Blood Sugar & Energy</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold text-orange-500" x-text="animatedMetrics.metabolic + '%'"></span>
                                        <span class="text-sm text-yellow-600 font-semibold">→ Stable</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-gradient-to-r from-orange-400 to-yellow-500 h-3 rounded-full transition-all duration-1000 ease-out"
                                             :style="`width: ${animatedMetrics.metabolic}%`"></div>
                                    </div>
                                </div>

                                <!-- Mental Health -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-xl flex items-center justify-center">
                                            <img src="{{ asset('images/icons/mental-health.png') }}" alt="Mental" class="w-6 h-6">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800">Mental Wellness</h4>
                                            <p class="text-sm text-gray-600">Stress & Mood</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold text-purple-500" x-text="animatedMetrics.mental + '%'"></span>
                                        <span class="text-sm text-green-600 font-semibold">↑ +5.1%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-gradient-to-r from-purple-400 to-indigo-500 h-3 rounded-full transition-all duration-1000 ease-out"
                                             :style="`width: ${animatedMetrics.mental}%`"></div>
                                    </div>
                                </div>

                                <!-- Physical Fitness -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 border border-white/30 hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                                            <img src="{{ asset('images/icons/physical-fitness.png') }}" alt="Fitness" class="w-6 h-6">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-800">Physical Fitness</h4>
                                            <p class="text-sm text-gray-600">Strength & Endurance</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-2xl font-bold text-green-500" x-text="animatedMetrics.physical + '%'"></span>
                                        <span class="text-sm text-green-600 font-semibold">↑ +3.7%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-3">
                                        <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-3 rounded-full transition-all duration-1000 ease-out"
                                             :style="`width: ${animatedMetrics.physical}%`"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Health Insights -->
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="text-center p-4 bg-green-50 rounded-xl border border-green-200">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <img src="{{ asset('images/icons/trending-up.png') }}" alt="Trending Up" class="w-4 h-4">
                                    </div>
                                    <p class="text-sm font-semibold text-green-700">Improving Trends</p>
                                    <p class="text-xs text-green-600">3 metrics trending up</p>
                                </div>

                                <div class="text-center p-4 bg-blue-50 rounded-xl border border-blue-200">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <img src="{{ asset('images/icons/target.png') }}" alt="Target" class="w-4 h-4">
                                    </div>
                                    <p class="text-sm font-semibold text-blue-700">Goals on Track</p>
                                    <p class="text-xs text-blue-600">87% completion rate</p>
                                </div>

                                <div class="text-center p-4 bg-purple-50 rounded-xl border border-purple-200">
                                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <img src="{{ asset('images/icons/award.png') }}" alt="Award" class="w-4 h-4">
                                    </div>
                                    <p class="text-sm font-semibold text-purple-700">Top 15%</p>
                                    <p class="text-xs text-purple-600">In your age group</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column - Main Metrics -->
            <div class="xl:col-span-2 space-y-8">
                <!-- Live Health Vitals with Graphs -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Live Health Vitals</h3>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-xs font-semibold text-gray-600">Real-time</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Heart Rate with Live Graph -->
                        <div class="bg-gradient-to-br from-red-50 to-pink-50 rounded-2xl p-6 border border-red-100">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Heart Rate</span>
                                </div>
                                <span class="w-3 h-3 rounded-full" :class="healthMetrics.heartRate > 100 || healthMetrics.heartRate < 60 ? 'bg-yellow-500' : 'bg-green-500'"></span>
                            </div>
                            <div class="flex items-end justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-gray-800" x-text="healthMetrics.heartRate"></span>
                                    <span class="text-sm text-gray-600 ml-1">BPM</span>
                                </div>
                                <!-- Mini Heart Rate Graph -->
                                <div class="w-24 h-12 relative">
                                    <svg class="w-full h-full" viewBox="0 0 100 50">
                                        <path d="M0,25 Q10,15 20,25 T40,25 Q50,15 60,25 T80,25 Q90,15 100,25"
                                              stroke="#ef4444" stroke-width="2" fill="none" class="animate-pulse"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">Normal: 60-100 BPM</div>
                        </div>

                        <!-- Blood Pressure -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Blood Pressure</span>
                                </div>
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-gray-800" x-text="healthMetrics.bloodPressure.systolic + '/' + healthMetrics.bloodPressure.diastolic"></span>
                                <span class="text-sm text-gray-600 ml-1">mmHg</span>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">Normal: <120/80 mmHg</div>
                        </div>

                        <!-- Blood Sugar with Trend -->
                        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-100">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Blood Sugar</span>
                                </div>
                                <span class="w-3 h-3 rounded-full" :class="healthMetrics.bloodSugar > 140 ? 'bg-yellow-500' : 'bg-green-500'"></span>
                            </div>
                            <div class="flex items-end justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-gray-800" x-text="healthMetrics.bloodSugar"></span>
                                    <span class="text-sm text-gray-600 ml-1">mg/dL</span>
                                </div>
                                <!-- Blood Sugar Trend -->
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-xs text-yellow-600">Elevated</span>
                                </div>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">Normal: 70-140 mg/dL</div>
                        </div>

                        <!-- Body Temperature -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Body Temperature</span>
                                </div>
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-gray-800" x-text="healthMetrics.bodyTemp"></span>
                                <span class="text-sm text-gray-600 ml-1">°F</span>
                            </div>
                            <div class="mt-2 text-xs text-gray-500">Normal: 97-99°F</div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Analytics Dashboard -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-lg border border-white/20">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Health Analytics Dashboard</h3>

                    <!-- App Performance Style Metrics -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Health Sessions -->
                        <div class="text-center">
                            <div class="relative w-20 h-20 mx-auto mb-3">
                                <svg class="w-20 h-20 transform -rotate-90">
                                    <circle cx="40" cy="40" r="32" stroke="#e5e7eb" stroke-width="6" fill="transparent"/>
                                    <circle cx="40" cy="40" r="32" stroke="#10b981" stroke-width="6" fill="transparent"
                                            stroke-dasharray="201" stroke-dashoffset="16" class="transition-all duration-1000"/>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-lg font-bold text-green-600">0.92</span>
                                </div>
                            </div>
                            <p class="text-sm font-semibold text-gray-700">Health Index</p>
                            <p class="text-xs text-green-600">Good</p>
                        </div>

                        <!-- Vital Stability -->
                        <div class="text-center">
                            <div class="text-2xl font-bold text-orange-500 mb-1">99.3%</div>
                            <p class="text-sm font-semibold text-gray-700">Vital Stability</p>
                            <p class="text-xs text-gray-500">-0.01%</p>
                        </div>

                        <!-- Health Score -->
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-500 mb-1">96.71%</div>
                            <p class="text-sm font-semibold text-gray-700">Wellness Score</p>
                            <p class="text-xs text-gray-500">-0.16%</p>
                        </div>

                        <!-- Risk Assessment -->
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600 mb-1">99.83%</div>
                            <p class="text-sm font-semibold text-gray-700">Risk Management</p>
                            <p class="text-xs text-gray-500">+0.03%</p>
                        </div>
                    </div>

                    <!-- Health Trend Graph -->
                    <div class="bg-white rounded-xl p-6 border border-blue-100">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-semibold text-gray-800">Health Trend</h4>
                            <div class="flex items-center gap-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    <span>Excellent</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                    <span>Good</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                    <span>Fair</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                    <span>Poor</span>
                                </div>
                            </div>
                        </div>

                        <!-- Live Health Graph -->
                        <div class="h-64 relative">
                            <svg class="w-full h-full" viewBox="0 0 800 200">
                                <!-- Grid Lines -->
                                <defs>
                                    <pattern id="grid" width="40" height="20" patternUnits="userSpaceOnUse">
                                        <path d="M 40 0 L 0 0 0 20" fill="none" stroke="#f3f4f6" stroke-width="1"/>
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" fill="url(#grid)"/>

                                <!-- Health Trend Line -->
                                <path d="M50,150 Q100,120 150,140 T250,130 Q300,110 350,125 T450,120 Q500,100 550,115 T650,110 Q700,90 750,105"
                                      stroke="#3b82f6" stroke-width="3" fill="none" class="animate-pulse"/>

                                <!-- Data Points -->
                                <circle cx="150" cy="140" r="4" fill="#3b82f6" class="animate-pulse"/>
                                <circle cx="350" cy="125" r="4" fill="#10b981" class="animate-pulse"/>
                                <circle cx="550" cy="115" r="4" fill="#f59e0b" class="animate-pulse"/>
                                <circle cx="750" cy="105" r="4" fill="#ef4444" class="animate-pulse"/>

                                <!-- Y-axis labels -->
                                <text x="20" y="50" class="text-xs fill-gray-500">0.99</text>
                                <text x="20" y="80" class="text-xs fill-gray-500">0.96</text>
                                <text x="20" y="110" class="text-xs fill-gray-500">0.93</text>
                                <text x="20" y="140" class="text-xs fill-gray-500">0.90</text>
                                <text x="20" y="170" class="text-xs fill-gray-500">0.87</text>

                                <!-- X-axis labels -->
                                <text x="100" y="190" class="text-xs fill-gray-500">May 12</text>
                                <text x="200" y="190" class="text-xs fill-gray-500">May 15</text>
                                <text x="300" y="190" class="text-xs fill-gray-500">May 18</text>
                                <text x="400" y="190" class="text-xs fill-gray-500">May 21</text>
                                <text x="500" y="190" class="text-xs fill-gray-500">May 24</text>
                                <text x="600" y="190" class="text-xs fill-gray-500">May 27</text>
                                <text x="700" y="190" class="text-xs fill-gray-500">May 30</text>
                            </svg>
                        </div>
                    </div>

                    <!-- Additional Health Metrics -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <!-- Sleep Quality -->
                        <div class="text-center">
                            <div class="text-lg font-bold text-green-600 mb-1">0.89</div>
                            <p class="text-sm font-semibold text-gray-700">Sleep Quality</p>
                            <p class="text-xs text-green-600">Good</p>
                            <p class="text-xs text-gray-500">+0.46%</p>
                        </div>

                        <!-- Activity Level -->
                        <div class="text-center">
                            <div class="text-lg font-bold text-yellow-600 mb-1">0.79</div>
                            <p class="text-sm font-semibold text-gray-700">Activity Level</p>
                            <p class="text-xs text-yellow-600">Fair</p>
                            <p class="text-xs text-gray-500">-2.61%</p>
                        </div>

                        <!-- Nutrition Score -->
                        <div class="text-center">
                            <div class="text-lg font-bold text-red-600 mb-1">0.69</div>
                            <p class="text-sm font-semibold text-gray-700">Nutrition</p>
                            <p class="text-xs text-red-600">Poor</p>
                            <p class="text-xs text-gray-500">-0.99%</p>
                        </div>
                    </div>
                </div>

                <!-- Lifestyle Tracking -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-lg border border-white/20">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Lifestyle Tracking</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Steps -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12L8 10l2-2 2 2-2 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Steps</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.steps / lifestyleData.stepsGoal) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.steps.toLocaleString()"></span>
                                <span class="text-sm text-gray-600" x-text="'/' + lifestyleData.stepsGoal.toLocaleString()"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.steps / lifestyleData.stepsGoal) * 100, 100)}%`"></div>
                            </div>
                        </div>

                        <!-- Water Intake -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Water</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.water / lifestyleData.waterGoal) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.water.toFixed(1)"></span>
                                <span class="text-sm text-gray-600" x-text="'/' + lifestyleData.waterGoal + 'L'"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.water / lifestyleData.waterGoal) * 100, 100)}%`"></div>
                            </div>
                        </div>

                        <!-- Sleep -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-purple-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Sleep</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.sleep / 8) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.sleep.toFixed(1)"></span>
                                <span class="text-sm text-gray-600">h</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.sleep / 8) * 100, 100)}%`"></div>
                            </div>
                        </div>

                        <!-- Calories -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-orange-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Calories</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.calories / lifestyleData.caloriesGoal) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.calories"></span>
                                <span class="text-sm text-gray-600" x-text="'/' + lifestyleData.caloriesGoal"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-400 to-orange-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.calories / lifestyleData.caloriesGoal) * 100, 100)}%`"></div>
                            </div>
                        </div>

                        <!-- Protein -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Protein</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.protein / lifestyleData.proteinGoal) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.protein"></span>
                                <span class="text-sm text-gray-600" x-text="'/' + lifestyleData.proteinGoal + 'g'"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-red-400 to-red-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.protein / lifestyleData.proteinGoal) * 100, 100)}%`"></div>
                            </div>
                        </div>

                        <!-- Carbs -->
                        <div class="bg-white/70 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 bg-yellow-500 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Carbs</span>
                                </div>
                                <span class="text-xs text-gray-500" x-text="Math.round((lifestyleData.carbs / lifestyleData.carbsGoal) * 100) + '%'"></span>
                            </div>
                            <div class="mb-2">
                                <span class="text-xl font-bold text-gray-800" x-text="lifestyleData.carbs"></span>
                                <span class="text-sm text-gray-600" x-text="'/' + lifestyleData.carbsGoal + 'g'"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 h-2 rounded-full transition-all duration-500"
                                     :style="`width: ${Math.min((lifestyleData.carbs / lifestyleData.carbsGoal) * 100, 100)}%`"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chronic Disease Monitoring -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-lg border border-white/20">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Chronic Disease Risk Assessment</h3>
                        <div class="flex items-center gap-3">
                            <select x-model="selectedDisease" class="px-4 py-2 bg-white/70 border border-gray-200 rounded-lg text-sm font-medium text-gray-700 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Disease</option>
                                <optgroup label="High Risk (Common in Bangladesh)">
                                    <option value="diabetes-type-2">Diabetes Type 2</option>
                                    <option value="hypertension">Hypertension</option>
                                    <option value="heart-disease">Heart Disease</option>
                                </optgroup>
                                <optgroup label="Medium Risk">
                                    <option value="stroke">Stroke Risk</option>
                                    <option value="kidney-disease">Kidney Disease</option>
                                    <option value="copd">COPD</option>
                                    <option value="arthritis">Arthritis</option>
                                    <option value="depression">Depression</option>
                                </optgroup>
                                <optgroup label="Monitoring Required">
                                    <option value="obesity">Obesity</option>
                                    <option value="osteoporosis">Osteoporosis</option>
                                    <option value="liver-disease">Liver Disease</option>
                                    <option value="thyroid">Thyroid Disorders</option>
                                </optgroup>
                            </select>
                            <button @click="createDiseaseProfile()" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg text-sm font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                                Create Profile
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <template x-for="disease in diseaseRisks" :key="disease.name">
                            <div class="bg-white/70 rounded-xl p-4 border-l-4"
                                 :class="{
                                     'border-red-500': getRiskLevel(disease.risk).level === 'high',
                                     'border-yellow-500': getRiskLevel(disease.risk).level === 'medium',
                                     'border-green-500': getRiskLevel(disease.risk).level === 'low'
                                 }">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="font-semibold text-gray-800" x-text="disease.name"></h4>
                                    <span class="text-xs px-2 py-1 rounded-full font-semibold"
                                          :class="{
                                              'bg-red-100 text-red-700': getRiskLevel(disease.risk).level === 'high',
                                              'bg-yellow-100 text-yellow-700': getRiskLevel(disease.risk).level === 'medium',
                                              'bg-green-100 text-green-700': getRiskLevel(disease.risk).level === 'low'
                                          }"
                                          x-text="getRiskLevel(disease.risk).text"></span>
                                </div>
                                <div class="mb-2">
                                    <span class="text-2xl font-bold"
                                          :class="{
                                              'text-red-600': getRiskLevel(disease.risk).level === 'high',
                                              'text-yellow-600': getRiskLevel(disease.risk).level === 'medium',
                                              'text-green-600': getRiskLevel(disease.risk).level === 'low'
                                          }"
                                          x-text="disease.risk + '%'"></span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="h-2 rounded-full transition-all duration-500"
                                         :class="{
                                             'bg-gradient-to-r from-red-400 to-red-600': getRiskLevel(disease.risk).level === 'high',
                                             'bg-gradient-to-r from-yellow-400 to-yellow-600': getRiskLevel(disease.risk).level === 'medium',
                                             'bg-gradient-to-r from-green-400 to-green-600': getRiskLevel(disease.risk).level === 'low'
                                         }"
                                         :style="`width: ${disease.risk}%`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- AI Health Insights -->
                <div class="bg-gradient-to-br from-white/95 via-purple-50/80 to-blue-50/90 backdrop-blur-xl rounded-3xl p-8 border border-white/30 shadow-2xl">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('images/icons/ai-brain.png') }}" alt="AI Brain" class="w-10 h-10">
                                </div>
                                <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">AI Health Insights</h3>
                                <p class="text-sm text-gray-600">Powered by Advanced Machine Learning</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-100 to-blue-100 rounded-full">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-xs font-semibold text-green-700">AI Active</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personalized Recommendations -->
                        <div class="group relative bg-gradient-to-br from-purple-500/10 to-purple-600/20 backdrop-blur-sm rounded-2xl p-6 border border-purple-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                            <div class="absolute top-4 right-4">
                                <img src="{{ asset('images/icons/target-precision.png') }}" alt="Target" class="w-8 h-8 opacity-70 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('images/icons/recommendation.png') }}" alt="Recommendations" class="w-7 h-7">
                                </div>
                                <div>
                                    <h4 class="font-bold text-purple-800">Smart Recommendations</h4>
                                    <p class="text-xs text-purple-600">Personalized for you</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">Based on your current health metrics, consider increasing your daily water intake by 0.5L and aim for 30 minutes of moderate exercise to improve your cardiovascular health score.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-purple-600 font-semibold">Confidence: 94%</span>
                                <button class="px-3 py-1 bg-purple-500 text-white rounded-lg text-xs hover:bg-purple-600 transition-colors">Apply</button>
                            </div>
                        </div>

                        <!-- Trend Analysis -->
                        <div class="group relative bg-gradient-to-br from-blue-500/10 to-blue-600/20 backdrop-blur-sm rounded-2xl p-6 border border-blue-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                            <div class="absolute top-4 right-4">
                                <img src="{{ asset('images/icons/analytics-chart.png') }}" alt="Analytics" class="w-8 h-8 opacity-70 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('images/icons/trend-analysis.png') }}" alt="Trend" class="w-7 h-7">
                                </div>
                                <div>
                                    <h4 class="font-bold text-blue-800">Trend Analysis</h4>
                                    <p class="text-xs text-blue-600">7-day pattern</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">Your blood sugar levels have shown a 12% improvement over the past week. Continue your current dietary approach and monitor post-meal glucose levels.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-green-600 font-semibold">↗ 12% Improvement</span>
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600 transition-colors">Details</button>
                            </div>
                        </div>

                        <!-- Achievement -->
                        <div class="group relative bg-gradient-to-br from-green-500/10 to-emerald-600/20 backdrop-blur-sm rounded-2xl p-6 border border-green-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                            <div class="absolute top-4 right-4">
                                <img src="{{ asset('images/icons/trophy-achievement.png') }}" alt="Trophy" class="w-8 h-8 opacity-70 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('images/icons/achievement-badge.png') }}" alt="Achievement" class="w-7 h-7">
                                </div>
                                <div>
                                    <h4 class="font-bold text-green-800">Achievement Unlocked</h4>
                                    <p class="text-xs text-green-600">Sleep Master</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">Congratulations! You've maintained consistent sleep patterns for 7 days. This contributes to better hormone regulation and immune function.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-green-600 font-semibold">7 Day Streak</span>
                                <button class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs hover:bg-green-600 transition-colors">Share</button>
                            </div>
                        </div>

                        <!-- Health Alert -->
                        <div class="group relative bg-gradient-to-br from-orange-500/10 to-red-600/20 backdrop-blur-sm rounded-2xl p-6 border border-orange-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                            <div class="absolute top-4 right-4">
                                <img src="{{ asset('images/icons/alert-warning.png') }}" alt="Alert" class="w-8 h-8 opacity-70 group-hover:opacity-100 transition-opacity animate-pulse">
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <img src="{{ asset('images/icons/health-alert.png') }}" alt="Health Alert" class="w-7 h-7">
                                </div>
                                <div>
                                    <h4 class="font-bold text-orange-800">Health Alert</h4>
                                    <p class="text-xs text-orange-600">Requires attention</p>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed mb-4">Your stress levels appear elevated based on heart rate variability. Consider practicing meditation or deep breathing exercises.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-orange-600 font-semibold">Priority: Medium</span>
                                <button class="px-3 py-1 bg-orange-500 text-white rounded-lg text-xs hover:bg-orange-600 transition-colors">Action</button>
                            </div>
                        </div>
                    </div>

                    <!-- AI Processing Status -->
                    <div class="mt-8 p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl border border-indigo-200/50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/icons/ai-processing.png') }}" alt="AI Processing" class="w-6 h-6">
                                <span class="text-sm font-semibold text-indigo-700">AI Analysis Complete</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-indigo-600">Next analysis in: 2h 15m</span>
                                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Secondary Info -->
            <div class="space-y-6">
                <!-- Weather & Environment -->
                <div class="bg-gradient-to-br from-white/95 via-green-50/80 to-blue-50/90 backdrop-blur-xl rounded-3xl p-6 border border-white/30 shadow-2xl" x-data="weatherWidget">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/environment-health.png') }}" alt="Environment" class="w-7 h-7">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Environmental Health</h3>
                                <p class="text-xs text-gray-600">Real-time Impact Analysis</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 px-3 py-1 bg-green-100 rounded-full">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-xs font-semibold text-green-700">Live</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Weather Card -->
                        <div class="group relative bg-gradient-to-r from-blue-500/10 to-cyan-500/20 backdrop-blur-sm rounded-2xl p-4 border border-blue-200/50 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/weather-sun.png') }}" alt="Weather" class="w-6 h-6">
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-800">Weather Impact</span>
                                        <p class="text-xs text-gray-600">Current conditions</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-blue-600" x-text="weather.temperature + '°C'"></span>
                                    <p class="text-xs text-gray-600" x-text="weather.condition"></p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/uv-warning.png') }}" alt="UV" class="w-4 h-4">
                                    <span class="text-xs text-orange-600 font-semibold">High UV - Use protection</span>
                                </div>
                                <div class="px-2 py-1 bg-orange-100 rounded-full">
                                    <span class="text-xs font-bold text-orange-700">UV 8</span>
                                </div>
                            </div>
                        </div>

                        <!-- Air Quality Card -->
                        <div class="group relative bg-gradient-to-r from-red-500/10 to-orange-500/20 backdrop-blur-sm rounded-2xl p-4 border border-red-200/50 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-red-400 to-orange-500 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/air-quality-monitor.png') }}" alt="Air Quality" class="w-6 h-6">
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-800">Air Quality</span>
                                        <p class="text-xs text-gray-600">AQI Monitoring</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-red-600" x-text="weather.airQuality"></span>
                                    <p class="text-xs text-red-600 font-semibold" x-text="getAirQualityLevel().level.toUpperCase()"></p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/mask-protection.png') }}" alt="Protection" class="w-4 h-4">
                                    <span class="text-xs text-red-600 font-semibold">Avoid outdoor activities</span>
                                </div>
                                <div class="px-2 py-1 bg-red-100 rounded-full">
                                    <span class="text-xs font-bold text-red-700">Unhealthy</span>
                                </div>
                            </div>
                        </div>

                        <!-- Humidity Card -->
                        <div class="group relative bg-gradient-to-r from-teal-500/10 to-blue-500/20 backdrop-blur-sm rounded-2xl p-4 border border-teal-200/50 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-teal-400 to-blue-500 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/humidity-level.png') }}" alt="Humidity" class="w-6 h-6">
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-800">Humidity Level</span>
                                        <p class="text-xs text-gray-600">Comfort index</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-2xl font-bold text-teal-600" x-text="weather.humidity + '%'"></span>
                                    <p class="text-xs text-teal-600 font-semibold">High</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/water-intake.png') }}" alt="Hydration" class="w-4 h-4">
                                    <span class="text-xs text-blue-600 font-semibold">Stay well hydrated</span>
                                </div>
                                <div class="px-2 py-1 bg-blue-100 rounded-full">
                                    <span class="text-xs font-bold text-blue-700">Monitor</span>
                                </div>
                            </div>
                        </div>

                        <!-- Environmental Summary -->
                        <div class="mt-4 p-3 bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl border border-gray-200/50">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/health-recommendation.png') }}" alt="Recommendation" class="w-5 h-5">
                                    <span class="text-sm font-semibold text-gray-700">Health Recommendation</span>
                                </div>
                                <span class="text-xs text-gray-500">Updated 5 min ago</span>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Indoor activities recommended. High pollution and UV levels detected.</p>
                        </div>
                    </div>
                </div>

                <!-- Doctor Appointment -->
                <div class="bg-gradient-to-br from-white/95 via-blue-50/80 to-indigo-50/90 backdrop-blur-xl rounded-3xl p-6 border border-white/30 shadow-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/medical-consultation.png') }}" alt="Consultation" class="w-7 h-7">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Quick Consultation</h3>
                                <p class="text-xs text-gray-600">24/7 Medical Support</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 px-3 py-1 bg-green-100 rounded-full">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-xs font-semibold text-green-700">Available</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Emergency Consultation -->
                        <button class="group w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-2xl p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-consultation="emergency">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Emergency" class="w-6 h-6">
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold">Emergency Doctor</p>
                                        <p class="text-xs opacity-90">Immediate response</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">24/7</span>
                                    <img src="{{ asset('images/icons/arrow-right.png') }}" alt="Arrow" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                </div>
                            </div>
                        </button>

                        <!-- Doctor Booking -->
                        <button class="group w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-2xl p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-consultation="doctor">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/doctor-male.png') }}" alt="Doctor" class="w-6 h-6">
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold">Book Doctor</p>
                                        <p class="text-xs opacity-90">Schedule appointment</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">15 min</span>
                                    <img src="{{ asset('images/icons/arrow-right.png') }}" alt="Arrow" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                </div>
                            </div>
                        </button>

                        <!-- Nurse Consultation -->
                        <button class="group w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-2xl p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-consultation="nurse">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/nurse-female.png') }}" alt="Nurse" class="w-6 h-6">
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold">Nurse Consultation</p>
                                        <p class="text-xs opacity-90">Health guidance</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">5 min</span>
                                    <img src="{{ asset('images/icons/arrow-right.png') }}" alt="Arrow" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                </div>
                            </div>
                        </button>

                        <!-- Specialist Consultation -->
                        <button class="group w-full bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-2xl p-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-consultation="specialist">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                        <img src="{{ asset('images/icons/specialist-doctor.png') }}" alt="Specialist" class="w-6 h-6">
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold">Specialist</p>
                                        <p class="text-xs opacity-90">Expert consultation</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">30 min</span>
                                    <img src="{{ asset('images/icons/arrow-right.png') }}" alt="Arrow" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                                </div>
                            </div>
                        </button>
                    </div>

                    <!-- Next Appointment -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-indigo-50 to-blue-50 rounded-2xl border border-indigo-200/50">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/icons/calendar-appointment.png') }}" alt="Calendar" class="w-5 h-5">
                                <span class="text-sm font-bold text-gray-800">Next Appointment</span>
                            </div>
                            <span class="text-xs text-indigo-600 font-semibold">Tomorrow</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Dr. Rahman</p>
                                <p class="text-xs text-gray-600">Diabetes Follow-up</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-bold text-indigo-600">3:00 PM</p>
                                <p class="text-xs text-gray-500">Video call</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LifeStream Predictions -->
                <div class="bg-gradient-to-br from-white/95 via-indigo-50/80 to-purple-50/90 backdrop-blur-xl rounded-3xl p-6 border border-white/30 shadow-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/prediction-analytics.png') }}" alt="Predictions" class="w-7 h-7">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">LifeStream Predictions</h3>
                                <p class="text-xs text-gray-600">AI-Powered Forecasting</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 px-3 py-1 bg-purple-100 rounded-full">
                            <img src="{{ asset('images/icons/crystal-ball.png') }}" alt="Prediction" class="w-3 h-3">
                            <span class="text-xs font-semibold text-purple-700">Forecast</span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <!-- Health Trend Prediction -->
                        <div class="bg-gradient-to-r from-blue-500/10 to-purple-500/20 backdrop-blur-sm rounded-2xl p-5 border border-blue-200/50">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ asset('images/icons/trend-forecast.png') }}" alt="Trend" class="w-8 h-8">
                                <div>
                                    <h4 class="font-bold text-gray-800">7-Day Health Trend</h4>
                                    <p class="text-xs text-gray-600">Predictive analysis</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-center">
                                    <div class="w-16 h-16 mx-auto mb-2 relative">
                                        <svg class="progress-ring w-16 h-16 transform -rotate-90">
                                            <circle cx="32" cy="32" r="28" stroke="#e5e7eb" stroke-width="4" fill="transparent"/>
                                            <circle class="progress-ring-circle" cx="32" cy="32" r="28" stroke="#3b82f6" stroke-width="4" fill="transparent"
                                                    style="stroke-dasharray: 176; stroke-dashoffset: 44"/>
                                        </svg>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <span class="text-sm font-bold text-blue-600" x-text="predictions.healthImprovement + '%'">75%</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-blue-600 font-semibold">Improvement</p>
                                </div>
                                <div class="flex-1 ml-4">
                                    <p class="text-sm text-gray-700 leading-relaxed">Your health metrics are predicted to improve by 15% in the next week with current lifestyle choices.</p>
                                    <div class="mt-2 flex items-center gap-2">
                                        <img src="{{ asset('images/icons/confidence-meter.png') }}" alt="Confidence" class="w-4 h-4">
                                        <span class="text-xs text-blue-600 font-semibold">Confidence: 87%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Risk Predictions Grid -->
                        <div class="space-y-3">
                            <h5 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                                <img src="{{ asset('images/icons/risk-assessment.png') }}" alt="Risk" class="w-4 h-4">
                                Risk Predictions
                            </h5>

                            <div class="grid gap-3">
                                <!-- Diabetes Risk -->
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200/50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/icons/diabetes-monitor.png') }}" alt="Diabetes" class="w-6 h-6">
                                        <div>
                                            <span class="text-sm font-semibold text-gray-800">Diabetes Risk</span>
                                            <p class="text-xs text-gray-600">30-day forecast</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-sm font-bold text-green-600 flex items-center gap-1">
                                            <img src="{{ asset('images/icons/arrow-down.png') }}" alt="Down" class="w-3 h-3">
                                            <span x-text="Math.abs(predictions.diabetesRisk) + '%'">8%</span>
                                        </span>
                                        <p class="text-xs text-green-600">Decreasing</p>
                                    </div>
                                </div>

                                <!-- Heart Disease Risk -->
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200/50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/icons/heart-health.png') }}" alt="Heart" class="w-6 h-6">
                                        <div>
                                            <span class="text-sm font-semibold text-gray-800">Heart Disease Risk</span>
                                            <p class="text-xs text-gray-600">Current status</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-sm font-bold text-yellow-600 flex items-center gap-1">
                                            <img src="{{ asset('images/icons/arrow-stable.png') }}" alt="Stable" class="w-3 h-3">
                                            Stable
                                        </span>
                                        <p class="text-xs text-yellow-600">Monitoring</p>
                                    </div>
                                </div>

                                <!-- Overall Wellness -->
                                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200/50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/icons/wellness-score.png') }}" alt="Wellness" class="w-6 h-6">
                                        <div>
                                            <span class="text-sm font-semibold text-gray-800">Overall Wellness</span>
                                            <p class="text-xs text-gray-600">Projected improvement</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-sm font-bold text-blue-600 flex items-center gap-1">
                                            <img src="{{ asset('images/icons/arrow-up.png') }}" alt="Up" class="w-3 h-3">
                                            <span x-text="predictions.wellness + '%'">12%</span>
                                        </span>
                                        <p class="text-xs text-blue-600">Improving</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Prediction Accuracy -->
                        <div class="mt-4 p-3 bg-gradient-to-r from-gray-50 to-indigo-50 rounded-xl border border-gray-200/50">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/accuracy-badge.png') }}" alt="Accuracy" class="w-5 h-5">
                                    <span class="text-sm font-semibold text-gray-700">Prediction Accuracy</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-bold text-indigo-600">91.3%</span>
                                    <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1">Based on 30-day historical data analysis</p>
                        </div>
                    </div>
                </div>

                <!-- Health Stage Condition -->
                <div class="bg-gradient-to-br from-white/95 via-emerald-50/80 to-green-50/90 backdrop-blur-xl rounded-3xl p-6 border border-white/30 shadow-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-600 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/health-stage.png') }}" alt="Health Stage" class="w-7 h-7">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Current Health Stage</h3>
                                <p class="text-xs text-gray-600">Comprehensive Assessment</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 px-3 py-1 bg-green-100 rounded-full">
                            <img src="{{ asset('images/icons/health-badge.png') }}" alt="Badge" class="w-3 h-3">
                            <span class="text-xs font-semibold text-green-700">Excellent</span>
                        </div>
                    </div>

                    <!-- Health Grade Display -->
                    <div class="text-center mb-6">
                        <div class="relative w-20 h-20 mx-auto mb-4">
                            <div class="w-20 h-20 bg-gradient-to-r from-green-400 via-emerald-500 to-green-600 rounded-full flex items-center justify-center shadow-xl">
                                <span class="text-3xl text-white font-bold" x-text="getHealthGrade().grade">A+</span>
                            </div>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/star-achievement.png') }}" alt="Star" class="w-5 h-5">
                            </div>
                        </div>
                        <h4 class="text-xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent" x-text="getHealthGrade().status + ' Health'">Excellent Health</h4>
                        <p class="text-sm text-gray-600">Above Average Condition</p>
                        <div class="mt-3 flex items-center justify-center gap-2">
                            <img src="{{ asset('images/icons/percentile-rank.png') }}" alt="Percentile" class="w-4 h-4">
                            <span class="text-xs text-green-600 font-semibold">Top 15% in your age group</span>
                        </div>
                    </div>

                    <!-- Health Insights Cards -->
                    <div class="space-y-4">
                        <!-- Strengths -->
                        <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/20 backdrop-blur-sm rounded-2xl p-4 border border-green-200/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                    <img src="{{ asset('images/icons/strength-check.png') }}" alt="Strengths" class="w-5 h-5">
                                </div>
                                <h5 class="font-bold text-green-800">What you're doing right</h5>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/exercise-check.png') }}" alt="Exercise" class="w-4 h-4">
                                    <span class="text-xs text-green-700">Regular exercise routine</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/sleep-check.png') }}" alt="Sleep" class="w-4 h-4">
                                    <span class="text-xs text-green-700">Consistent sleep pattern</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/weight-check.png') }}" alt="Weight" class="w-4 h-4">
                                    <span class="text-xs text-green-700">Maintaining healthy weight</span>
                                </div>
                            </div>
                        </div>

                        <!-- Areas for Improvement -->
                        <div class="bg-gradient-to-r from-yellow-500/10 to-orange-500/20 backdrop-blur-sm rounded-2xl p-4 border border-yellow-200/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                                    <img src="{{ asset('images/icons/focus-target.png') }}" alt="Focus" class="w-5 h-5">
                                </div>
                                <h5 class="font-bold text-yellow-800">Areas to focus on</h5>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/blood-sugar-warning.png') }}" alt="Blood Sugar" class="w-4 h-4">
                                    <span class="text-xs text-yellow-700">Blood sugar management</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/stress-warning.png') }}" alt="Stress" class="w-4 h-4">
                                    <span class="text-xs text-yellow-700">Stress reduction techniques</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/diet-warning.png') }}" alt="Diet" class="w-4 h-4">
                                    <span class="text-xs text-yellow-700">Dietary adjustments</span>
                                </div>
                            </div>
                        </div>

                        <!-- Next Goal -->
                        <div class="bg-gradient-to-r from-blue-500/10 to-indigo-500/20 backdrop-blur-sm rounded-2xl p-4 border border-blue-200/50">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <img src="{{ asset('images/icons/goal-target.png') }}" alt="Goal" class="w-5 h-5">
                                </div>
                                <h5 class="font-bold text-blue-800">Next health goal</h5>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('images/icons/glucose-target.png') }}" alt="Glucose" class="w-4 h-4">
                                    <span class="text-xs text-blue-700">Achieve optimal glucose levels</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-blue-600 font-semibold">60 days</span>
                                    <p class="text-xs text-gray-500">Target</p>
                                </div>
                            </div>
                            <div class="mt-3 w-full bg-blue-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full" style="width: 35%"></div>
                            </div>
                            <p class="text-xs text-blue-600 mt-1">35% progress towards goal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Real-time Data Footer -->
        <div class="mt-8 bg-gradient-to-r from-slate-900/95 via-blue-900/90 to-purple-900/95 backdrop-blur-xl rounded-2xl p-6 border border-white/10 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                <!-- System Status -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center">
                            <img src="{{ asset('images/icons/monitoring-active.png') }}" alt="Monitoring" class="w-6 h-6">
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">Real-time Monitoring</h3>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-sm text-green-300 font-semibold">ACTIVE</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <img src="{{ asset('images/icons/realtime-monitoring.png') }}" alt="Real-time" class="w-10 h-10">
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Real-time Monitoring Active</h3>
                            <p class="text-sm text-gray-600">Advanced healthcare surveillance system</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Data Update Status -->
                        <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/20 backdrop-blur-sm rounded-xl p-3 border border-green-200/50">
                            <div class="flex items-center gap-2 mb-2">
                                <img src="{{ asset('images/icons/data-sync.png') }}" alt="Sync" class="w-5 h-5">
                                <span class="text-sm font-semibold text-green-700">Data Sync</span>
                            </div>
                            <p class="text-xs text-gray-600">Updated every 30 seconds</p>
                            <p class="text-xs text-green-600 font-semibold">Last sync: <span x-text="formatTime(lastUpdate)">2 min ago</span></p>
                        </div>

                        <!-- Connection Status -->
                        <div class="bg-gradient-to-r from-blue-500/10 to-indigo-500/20 backdrop-blur-sm rounded-xl p-3 border border-blue-200/50">
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-semibold text-blue-700">Connection</span>
                            </div>
                            <p class="text-xs text-gray-600">All systems operational</p>
                            <p class="text-xs text-green-600 font-semibold">Status: Connected</p>
                        </div>

                        <!-- Device Status -->
                        <div class="bg-gradient-to-r from-purple-500/10 to-violet-500/20 backdrop-blur-sm rounded-xl p-3 border border-purple-200/50">
                            <div class="flex items-center gap-2 mb-2">
                                <img src="{{ asset('images/icons/device-status.png') }}" alt="Devices" class="w-5 h-5">
                                <span class="text-sm font-semibold text-purple-700">Devices</span>
                            </div>
                            <p class="text-xs text-gray-600">5 sensors active</p>
                            <p class="text-xs text-purple-600 font-semibold">Battery: 87%</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <!-- Blood Database Access -->
                    <button class="group bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-4 rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1" data-consultation="blood-database">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/icons/blood-database.png') }}" alt="Blood Database" class="w-6 h-6">
                            <div class="text-left">
                                <p class="text-sm font-bold">Rare Blood Database</p>
                                <p class="text-xs opacity-90">Emergency access</p>
                            </div>
                        </div>
                    </button>

                    <!-- Export Data -->
                    <button class="group bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-4 rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/icons/export-data.png') }}" alt="Export" class="w-6 h-6">
                            <div class="text-left">
                                <p class="text-sm font-bold">Export Health Data</p>
                                <p class="text-xs opacity-90">Download report</p>
                            </div>
                        </div>
                        <span class="text-gray-300">Data updated every 30 seconds</span><br>
                        <span class="text-gray-400">Last sync: </span>
                        <span class="text-blue-300 font-semibold" x-text="formatTime(lastUpdate)"></span>
                    <!-- Settings -->
                    <button class="group bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white px-6 py-4 rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

                <!-- System Metrics -->
                <div class="lg:col-span-1">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-400 mb-1">99.9%</div>
                            <div class="text-xs text-gray-300">Uptime</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-400 mb-1">12ms</div>
                            <div class="text-xs text-gray-300">Response</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-purple-400 mb-1">98.7%</div>
                            <div class="text-xs text-gray-300">Accuracy</div>
                        </div>
                                <p class="text-xs opacity-90">Customize view</p>
                </div>

                <!-- Action Buttons -->
                <div class="lg:col-span-1">
                    <div class="flex flex-col sm:flex-row gap-3 justify-end">
                        <button class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                            <img src="{{ asset('images/icons/blood-database.png') }}" alt="Blood Database" class="w-4 h-4">
                            <span class="text-sm">Blood Database</span>
                        </button>

                        <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white px-4 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                            <img src="{{ asset('images/icons/export-data.png') }}" alt="Export" class="w-4 h-4">
                            <span class="text-sm">Export Data</span>
                        </button>

                        <button class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-4 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                            <img src="{{ asset('images/icons/settings.png') }}" alt="Settings" class="w-4 h-4">
                            <span class="text-sm">Settings</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- System Performance Indicators -->
            <div class="mt-6 pt-6 border-t border-gray-200/50">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <img src="{{ asset('images/icons/uptime-indicator.png') }}" alt="Uptime" class="w-4 h-4">
                            <span class="text-xs font-semibold text-gray-700">System Uptime</span>
                        </div>
                        <p class="text-sm font-bold text-green-600">99.9%</p>
                    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <img src="{{ asset('images/icons/response-time.png') }}" alt="Response" class="w-4 h-4">
                            <span class="text-xs font-semibold text-gray-700">Response Time</span>
                        </div>
                        <p class="text-sm font-bold text-blue-600">0.3s</p>
                    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <img src="{{ asset('images/icons/data-accuracy.png') }}" alt="Accuracy" class="w-4 h-4">
                            <span class="text-xs font-semibold text-gray-700">Data Accuracy</span>
                        </div>
                        <p class="text-sm font-bold text-purple-600">98.7%</p>
                    </div>
                    <div class="text-center">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <img src="{{ asset('images/icons/security-shield.png') }}" alt="Security" class="w-4 h-4">
                            <span class="text-xs font-semibold text-gray-700">Security Status</span>
                        </div>
                        <p class="text-sm font-bold text-green-600">Secure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('lifestreamDashboard', () => ({
        selectedAge: '',
        selectedGender: '',
        selectedHabits: '',
        selectedDisease: '',
        lastUpdate: new Date(),
        healthMetrics: {
            heartRate: 72,
            bloodPressure: { systolic: 120, diastolic: 80 },
            bloodSugar: 95,
            bodyTemp: 98.6,
            oxygenSaturation: 98
        },
        lifestyleData: {
            steps: 8432,
            stepsGoal: 10000,
            water: 2.3,
            waterGoal: 3.0,
            sleep: 7.5,
            calories: 1850,
            caloriesGoal: 2200,
            protein: 65,
            proteinGoal: 80,
            carbs: 180,
            carbsGoal: 250
        },
        diseaseRisks: [
            { name: 'Diabetes Type 2', risk: 25 },
            { name: 'Hypertension', risk: 18 },
            { name: 'Heart Disease', risk: 12 },
            { name: 'Stroke Risk', risk: 8 },
            { name: 'Obesity', risk: 35 },
            { name: 'Sleep Apnea', risk: 22 }
        ],
        predictions: {
            healthImprovement: 15,
            diabetesRisk: -5,
            wellness: 12
        },

        init() {
            this.startRealTimeUpdates();
            this.updateHealthMetrics();
        },

        startRealTimeUpdates() {
            setInterval(() => {
                this.updateHealthMetrics();
                this.lastUpdate = new Date();
            }, 30000); // Update every 30 seconds
        },

        updateHealthMetrics() {
            // Simulate real-time data updates
            this.healthMetrics.heartRate = this.getRandomInRange(65, 85);
            this.healthMetrics.bloodSugar = this.getRandomInRange(85, 110);
            this.healthMetrics.bodyTemp = this.getRandomInRange(98.0, 99.2);
        },

        getRandomInRange(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        },

        getHealthScore() {
            const heartRateScore = this.healthMetrics.heartRate >= 60 && this.healthMetrics.heartRate <= 100 ? 25 : 15;
            const bloodSugarScore = this.healthMetrics.bloodSugar >= 70 && this.healthMetrics.bloodSugar <= 140 ? 25 : 15;
            const bpScore = this.healthMetrics.bloodPressure.systolic < 120 && this.healthMetrics.bloodPressure.diastolic < 80 ? 25 : 15;
            const tempScore = this.healthMetrics.bodyTemp >= 97 && this.healthMetrics.bodyTemp <= 99 ? 25 : 15;

            return heartRateScore + bloodSugarScore + bpScore + tempScore;
        },

        getHealthGrade() {
            const score = this.getHealthScore();
            if (score >= 90) return { grade: 'A+', status: 'Excellent' };
            if (score >= 80) return { grade: 'A', status: 'Very Good' };
            if (score >= 70) return { grade: 'B', status: 'Good' };
            if (score >= 60) return { grade: 'C', status: 'Fair' };
            return { grade: 'D', status: 'Poor' };
        },

        getRiskLevel(risk) {
            if (risk >= 30) return { level: 'high', text: 'High Risk' };
            if (risk >= 15) return { level: 'medium', text: 'Medium Risk' };
            return { level: 'low', text: 'Low Risk' };
        },

        updateRiskAssessment() {
            // Simulate risk assessment update based on age and gender
            if (this.selectedAge && this.selectedGender) {
                this.diseaseRisks.forEach(disease => {
                    if (this.selectedAge === '65+') {
                        disease.risk = Math.min(disease.risk + 10, 100);
                    }
                    if (this.selectedGender === 'male' && disease.name === 'Heart Disease') {
                        disease.risk = Math.min(disease.risk + 5, 100);
                    }
                });
            }
        },

        updateLifestyleRecommendations() {
            // Update recommendations based on habits
            console.log('Updated lifestyle recommendations for:', this.selectedHabits);
        },

        createDiseaseProfile() {
            if (this.selectedDisease) {
                alert(`Creating profile for ${this.selectedDisease.replace('-', ' ').toUpperCase()}`);
            }
        },

        formatTime(date) {
            return date.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
        }
    }));

    Alpine.data('weatherWidget', () => ({
        weather: {
            condition: 'partly cloudy',
            temperature: 32,
            humidity: 78,
            airQuality: 156
        },

        getWeatherIcon() {
            switch (this.weather.condition) {
                case 'sunny': return '☀️';
                case 'partly cloudy': return '⛅';
                case 'cloudy': return '☁️';
                case 'rainy': return '🌧️';
                default: return '🌤️';
            }
        },

        getAirQualityLevel() {
            if (this.weather.airQuality > 150) return { level: 'Unhealthy', color: 'red' };
            if (this.weather.airQuality > 100) return { level: 'Moderate', color: 'yellow' };
            return { level: 'Good', color: 'green' };
        }
    }));
});
</script>
@endsection
