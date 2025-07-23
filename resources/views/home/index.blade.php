@extends('layouts.app')

@section('title', 'Healing Beyond Boundaries')
@section('description', 'Shifa provides AI-powered healthcare services and devices for Bangladesh\'s most underserved populations. Revolutionary medical technology made in Bangladesh.')

@section('content')
<div x-data="app" class="relative overflow-hidden">
    <!-- Hero Section with Enhanced Video Background -->
    <section class="hero-section relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Video Background -->
        <video
            class="hero-video absolute inset-0 w-full h-full object-cover z-0"
            src="{{ asset('videos/hero-video.mp4') }}"
            autoplay
            muted
            loop
            playsinline
            poster="{{ asset('images/hero-poster.jpg') }}">
            <source src="{{ asset('videos/hero-video.webm') }}" type="video/webm">
            <source src="{{ asset('videos/hero-video.mp4') }}" type="video/mp4">
        </video>

        <!-- Enhanced Video Overlay with 90% Transparency -->
        <div class="hero-overlay absolute inset-0 bg-gradient-to-br from-blue-900/10 via-purple-800/10 to-blue-600/10 z-10" data-dynamic-text></div>

        <!-- Hero Content -->
        <div class="hero-content relative z-20 text-center px-6 max-w-7xl mx-auto" data-overlay-text>
            <div class="hero-content-animate space-y-8">
                <h5 class="hero-title text-4xl md:text-6xl lg:text-7xl font-black leading-tight dynamic-text-light">
                    <span class="block bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent drop-shadow-2xl">
                        In isolated places where we serve our people,
                    </span>
                    <span class="block bg-gradient-to-r from-purple-200 via-blue-200 to-white bg-clip-text text-transparent drop-shadow-2xl">
                        we provide Healing Beyond Boundaries.
                    </span>
                </h5>

                <p class="hero-subtitle text-xl md:text-3xl text-white/95 max-w-5xl mx-auto leading-relaxed font-light drop-shadow-lg">
                    Revolutionary AI-powered healthcare services and medical devices designed specifically for Bangladesh's most underserved communities
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mt-12">
                    <button class="btn-hero-primary group relative overflow-hidden">
                        <span class="relative z-10">Explore Our Services</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </button>
                    <button class="btn-hero-secondary group">
                        <span>Watch Our Story</span>
                        <div class="w-6 h-6 ml-2 bg-white rounded-full flex items-center justify-center group-hover:translate-x-1 transition-transform duration-300">
                            <div class="w-0 h-0 border-l-4 border-l-blue-600 border-y-2 border-y-transparent ml-1"></div>
                        </div>
                    </button>
                </div>

                <!-- Floating Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16" x-data="statsCounter">
                    <template x-for="(stat, index) in stats" :key="index">
                        <div class="glass-card p-6 text-center hover:scale-105 transition-all duration-500">
                            <div class="text-3xl md:text-4xl font-bold text-white mb-2 drop-shadow-lg">
                                <span x-text="stat.prefix"></span><span x-text="stat.value.toLocaleString()"></span><span x-text="stat.suffix"></span>
                            </div>
                            <div class="text-blue-100 text-sm font-medium drop-shadow" x-text="stat.label"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Enhanced Video Controls -->
        <div class="video-controls">
            <button @click="toggleVideo()" class="video-control-btn backdrop-blur-lg">
                <div x-show="videoPlaying" class="w-3 h-3 bg-white"></div>
                <div x-show="!videoPlaying" class="w-0 h-0 border-l-4 border-l-white border-y-2 border-y-transparent"></div>
            </button>
            <button @click="toggleMute()" class="video-control-btn backdrop-blur-lg">
                <svg x-show="videoMuted" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.816L4.89 14H2a1 1 0 01-1-1V7a1 1 0 011-1h2.89l3.493-2.816a1 1 0 011-.108zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"></path>
                </svg>
                <svg x-show="!videoMuted" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.816L4.89 14H2a1 1 0 01-1-1V7a1 1 0 011-1h2.89l3.493-2.816a1 1 0 011-.108zM14.657 2.929l.707-.707 1.414 1.414-.707.707a1 1 0 111.414 1.414l-.707.707 1.414 1.414-.707.707a1 1 0 01-1.414-1.414l.707-.707-1.414-1.414.707-.707a1 1 0 01-1.414-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Enhanced Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20">
            <div class="flex flex-col items-center space-y-2">
                <div class="text-white/80 text-sm font-medium">Scroll to explore</div>
                <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center relative">
                    <div class="w-1 h-3 bg-white rounded-full mt-2 animate-bounce"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shifa's Innovative Health Solutions Section - Enhanced with Media Carousels -->
    <section class="py-24 bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6 animate-fade-in-up"> LifeGaurd+ Innovative Health Solutions</h2>
                <p class="section-subtitle text-gray-600 animate-fade-in-up animation-delay-200">Revolutionary AI-powered healthcare devices designed to transform medical care delivery</p>
            </div>

            <div class="space-y-20">
                <!-- Heartbeat Sanctuary - Enhanced with Media Carousel -->
                <div class="premium-card hover-lift-strong" x-data="{ currentMedia: 0, mediaItems: [
                    { type: 'image', src: 'heartbeat-sanctuary-1.jpg', alt: 'Heartbeat Sanctuary Device' },

                    { type: 'image', src: 'heartbeat-sanctuary-2.jpg', alt: 'Device Interface' },
                    { type: 'image', src: 'heartbeat-sanctuary-3.jpg', alt: 'Patient Monitoring' }
                ] }">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6 order-2 lg:order-1">
                            <div class="text-left">
                                <h3 class="text-3xl font-bold text-gray-900 mb-3">Heartbeat Sanctuary</h3>
                                <p class="text-lg text-purple-600 font-semibold mb-4">CardioGuard's Life-Saving Pulse</p>
                                <p class="text-gray-700 mb-6 leading-relaxed text-lg">AI-powered device offering comprehensive monitoring (ECG, SpO2, heart rate, temperature, EMG) with real-time deep learning analysis and five-step AI filter for health condition detection.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-purple-500"></div>
                                    <span class="text-sm font-medium">Real-time deep learning analysis</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-500"></div>
                                    <span class="text-sm font-medium">Emergency alerts to family</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-purple-600"></div>
                                    <span class="text-sm font-medium">Conditional prescriptions to providers</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-600"></div>
                                    <span class="text-sm font-medium">Five-step AI health filter</span>
                                </div>
                            </div>

                            <button class="btn-device-premium-enhanced">
                                Learn More
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-blue-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                        </div>

                        <div class="relative order-1 lg:order-2">
                            <div class="device-image-container-enhanced"
                                 x-init="setInterval(() => { currentMedia = (currentMedia + 1) % mediaItems.length }, 1500)">
                                <template x-for="(item, index) in mediaItems" :key="index">
                                    <div x-show="currentMedia === index"
                                         x-transition:enter="transition ease-out duration-500"
                                         x-transition:enter-start="opacity-0 transform scale-95"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         class="absolute inset-0 w-full h-full">
                                        <template x-if="item.type === 'image'">
                                            <img :src="`{{ asset('images/devices/') }}/${item.src}`"
                                                 :alt="item.alt"
                                                 class="device-image-premium-enhanced w-full h-96 object-cover">
                                        </template>
                                        <template x-if="item.type === 'video'">
                                            <video :src="`{{ asset('videos/devices/') }}/${item.src}`"
                                                   class="device-image-premium-enhanced w-full h-96 object-cover"
                                                   autoplay muted loop>
                                            </video>
                                        </template>
                                    </div>
                                </template>
                            </div>
                            <div class="absolute -bottom-4 -right-4 bg-gradient-to-r from-purple-500 to-blue-500 text-white px-6 py-3 rounded-full font-bold shadow-xl">
                                AI-Powered
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guiding Light - Enhanced with Media Carousel -->
                <div class="premium-card hover-lift-strong" x-data="{ currentMedia: 0, mediaItems: [
                    { type: 'image', src: 'guiding-light-1.jpg', alt: 'Guiding Light Device' },
                    { type: 'image', src: 'guiding-light-2.jpg', alt: 'Navigation Interface' },

                    { type: 'image', src: 'guiding-light-3.jpg', alt: 'GPS Tracking' }
                ] }">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="relative">
                            <div class="device-image-container-enhanced"
                                 x-init="setInterval(() => { currentMedia = (currentMedia + 1) % mediaItems.length }, 1500)">
                                <template x-for="(item, index) in mediaItems" :key="index">
                                    <div x-show="currentMedia === index"
                                         x-transition:enter="transition ease-out duration-500"
                                         x-transition:enter-start="opacity-0 transform scale-95"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         class="absolute inset-0 w-full h-full">
                                        <template x-if="item.type === 'image'">
                                            <img :src="`{{ asset('images/devices/') }}/${item.src}`"
                                                 :alt="item.alt"
                                                 class="device-image-premium-enhanced w-full h-96 object-cover">
                                        </template>
                                        <template x-if="item.type === 'video'">
                                            <video :src="`{{ asset('videos/devices/') }}/${item.src}`"
                                                   class="device-image-premium-enhanced w-full h-96 object-cover"
                                                   autoplay muted loop>
                                            </video>
                                        </template>
                                    </div>
                                </template>
                            </div>
                            <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-bold shadow-xl">
                                GPS Enabled
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="text-left">
                                <h3 class="text-3xl font-bold text-gray-900 mb-3">Guiding Light</h3>
                                <p class="text-lg text-blue-600 font-semibold mb-4">Pathfinder Pulse Navigator</p>
                                <p class="text-gray-700 mb-6 leading-relaxed text-lg">Assists blind individuals with obstacle detection and voice alerts, autistic children with GPS tracking and geo-fencing, and wheelchair users with comprehensive navigation support.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-500"></div>
                                    <span class="text-sm font-medium">Obstacle detection & voice alerts</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-purple-500"></div>
                                    <span class="text-sm font-medium">GPS tracking & geo-fencing</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-600"></div>
                                    <span class="text-sm font-medium">Guardian communication system</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-purple-600"></div>
                                    <span class="text-sm font-medium">AI object & face recognition</span>
                                </div>
                            </div>

                            <button class="btn-device-premium-enhanced">
                                Learn More
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-purple-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Wings of Freedom - Enhanced with Media Carousel -->
                <div class="premium-card hover-lift-strong" x-data="{ currentMedia: 0, mediaItems: [

                    { type: 'image', src: 'wings-freedom-1.jpg', alt: 'Smart Wheelchair' },
                    { type: 'image', src: 'wings-freedom-2.jpg', alt: 'Control Interface' },
                    { type: 'image', src: 'wings-freedom-3.jpg', alt: 'Safety Features' }
                ] }">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6 order-2 lg:order-1">
                            <div class="text-left">
                                <h3 class="text-3xl font-bold text-gray-900 mb-3">Wings of Freedom</h3>
                                <p class="text-lg text-green-600 font-semibold mb-4">Smart Wheelchair Empowerment</p>
                                <p class="text-gray-700 mb-6 leading-relaxed text-lg">AI-powered Smart Wheelchair enhancing mobility and safety with obstacle alerts, location broadcasting, live camera streaming, and guardian app integration for complete independence.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-green-500"></div>
                                    <span class="text-sm font-medium">Obstacle alerts & safety features</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-500"></div>
                                    <span class="text-sm font-medium">Location broadcasting system</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-green-600"></div>
                                    <span class="text-sm font-medium">Live camera streaming</span>
                                </div>
                                <div class="feature-item-premium">
                                    <div class="feature-shape bg-blue-600"></div>
                                    <span class="text-sm font-medium">Guardian app integration</span>
                                </div>
                            </div>

                            <button class="btn-device-premium-enhanced">
                                Learn More
                                <div class="w-4 h-3 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                            </button>
                        </div>

                        <div class="relative order-1 lg:order-2">
                            <div class="device-image-container-enhanced"
                                 x-init="setInterval(() => { currentMedia = (currentMedia + 1) % mediaItems.length }, 1500)">
                                <template x-for="(item, index) in mediaItems" :key="index">
                                    <div x-show="currentMedia === index"
                                         x-transition:enter="transition ease-out duration-500"
                                         x-transition:enter-start="opacity-0 transform scale-95"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         class="absolute inset-0 w-full h-full">
                                        <template x-if="item.type === 'image'">
                                            <img :src="`{{ asset('images/devices/') }}/${item.src}`"
                                                 :alt="item.alt"
                                                 class="device-image-premium-enhanced w-full h-96 object-cover">
                                        </template>
                                        <template x-if="item.type === 'video'">
                                            <video :src="`{{ asset('videos/devices/') }}/${item.src}`"
                                                   class="device-image-premium-enhanced w-full h-96 object-cover"
                                                   autoplay muted loop>
                                            </video>
                                        </template>
                                    </div>
                                </template>
                            </div>
                            <div class="absolute -bottom-4 -right-4 bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-3 rounded-full font-bold shadow-xl">
                                Smart Mobility
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Story of Our Folks Section - Ultra Premium Redesign -->
    <section class="py-10 bg-gradient-to-br from-violet-50/60 via-purple-50/40 to-blue-50/30 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-72 h-72 bg-gradient-to-br from-purple-400 to-blue-400 rounded-full filter blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-gradient-to-br from-blue-400 to-violet-400 rounded-full filter blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-6xl md:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-blue-600 to-violet-600 mb-8 animate-fade-in-up leading-tight">
                    The Story of Our Folks
                </h2>
                <p class="text-2xl text-gray-700 animate-fade-in-up animation-delay-200 max-w-4xl mx-auto leading-relaxed">
                    Real stories of hope, healing, and happiness from the communities we serve across Bangladesh
                </p>
                <div class="w-32 h-1 bg-gradient-to-r from-purple-500 to-blue-500 mx-auto mt-8 rounded-full"></div>
            </div>

            <!-- Premium Stories Grid -->
            <div class="grid lg:grid-cols-2 gap-16 mb-20" x-data="storiesCarousel">
                <!-- Video Stories Section -->
                <div class="space-y-8">
                    <div class="text-center lg:text-left">
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">Video Stories</h3>
                        <p class="text-lg text-gray-600 mb-8">Watch heartwarming stories of transformation and hope</p>
                    </div>

                    <div class="premium-card p-0 overflow-hidden hover-lift-strong">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <video
                                class="w-full h-80 object-cover"
                                :src="`{{ asset('videos/stories/') }}/${videoStories[currentVideoIndex].video}`"
                                controls
                                poster="{{ asset('images/stories/video-poster.jpg') }}">
                            </video>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-8">
                                <h4 class="text-white text-2xl font-bold mb-3" x-text="videoStories[currentVideoIndex].title"></h4>
                                <p class="text-white/90 text-sm leading-relaxed" x-text="videoStories[currentVideoIndex].description"></p>
                            </div>
                        </div>

                        <!-- Video Thumbnails -->
                        <div class="p-6">
                            <div class="grid grid-cols-3 gap-4">
                                <template x-for="(video, index) in videoStories" :key="index">
                                    <div @click="selectVideo(index)"
                                         class="relative cursor-pointer rounded-lg overflow-hidden transform transition-all duration-300 hover:scale-105"
                                         :class="currentVideoIndex === index ? 'ring-4 ring-blue-500 shadow-lg' : 'hover:shadow-md'">
                                        <img :src="`{{ asset('images/stories/') }}/${video.thumbnail}`"
                                             :alt="video.title"
                                             class="w-full h-20 object-cover">
                                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photo Stories Section -->
                <div class="space-y-8">
                    <div class="text-center lg:text-left">
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">Happy Moments</h3>
                        <p class="text-lg text-gray-600 mb-8">Capturing moments of joy and healing in our communities</p>
                    </div>

                    <div class="premium-card p-0 overflow-hidden hover-lift-strong">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <div class="relative h-80">
                                <template x-for="(image, index) in photoStories" :key="index">
                                    <div x-show="currentPhotoIndex === index"
                                         x-transition:enter="transition ease-out duration-700"
                                         x-transition:enter-start="opacity-0 transform scale-110"
                                         x-transition:enter-end="opacity-100 transform scale-100"
                                         class="absolute inset-0">
                                        <img :src="`{{ asset('images/stories/') }}/${image.photo}`"
                                             :alt="image.title"
                                             class="w-full h-full object-cover">
                                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-8">
                                            <h4 class="text-white text-2xl font-bold mb-3" x-text="image.title"></h4>
                                            <p class="text-white/90 text-sm leading-relaxed" x-text="image.story"></p>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Premium Navigation Arrows -->
                            <button @click="previousPhoto()"
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-md text-white p-4 rounded-full hover:bg-white/30 transition-all duration-300 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button @click="nextPhoto()"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-md text-white p-4 rounded-full hover:bg-white/30 transition-all duration-300 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Premium Photo Indicators -->
                        <div class="p-6">
                            <div class="flex justify-center space-x-3">
                                <template x-for="(photo, index) in photoStories" :key="index">
                                    <button @click="currentPhotoIndex = index"
                                            class="transition-all duration-300 rounded-full"
                                            :class="currentPhotoIndex === index ? 'w-8 h-3 bg-gradient-to-r from-blue-500 to-purple-500' : 'w-3 h-3 bg-gray-300 hover:bg-gray-400'">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Premium Community Impact Stats -->
            <div class="grid md:grid-cols-4 gap-8 mb-16">
                <div class="text-center premium-card p-8 hover:scale-105 transition-all duration-500 bg-gradient-to-br from-purple-50 to-blue-50 border border-purple-100">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600 mb-4">95%</div>
                    <div class="text-gray-800 font-bold text-lg mb-2">Patient Satisfaction</div>
                    <div class="text-gray-600 text-sm">Exceptional care quality</div>
                </div>
                <div class="text-center premium-card p-8 hover:scale-105 transition-all duration-500 bg-gradient-to-br from-blue-50 to-violet-50 border border-blue-100">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-violet-600 mb-4">50K+</div>
                    <div class="text-gray-800 font-bold text-lg mb-2">Lives Transformed</div>
                    <div class="text-gray-600 text-sm">Across Bangladesh</div>
                </div>
                <div class="text-center premium-card p-8 hover:scale-105 transition-all duration-500 bg-gradient-to-br from-violet-50 to-purple-50 border border-violet-100">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-purple-600 mb-4">150+</div>
                    <div class="text-gray-800 font-bold text-lg mb-2">Communities Served</div>
                    <div class="text-gray-600 text-sm">Rural and urban areas</div>
                </div>
                <div class="text-center premium-card p-8 hover:scale-105 transition-all duration-500 bg-gradient-to-br from-orange-50 to-pink-50 border border-orange-100">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-pink-600 mb-4">24/7</div>
                    <div class="text-gray-800 font-bold text-lg mb-2">Continuous Care</div>
                    <div class="text-gray-600 text-sm">Always available</div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center">
                <div class="premium-card p-12 max-w-4xl mx-auto bg-gradient-to-br from-white/80 to-purple-50/80 border border-purple-100 backdrop-blur-sm">
                    <h3 class="text-4xl font-bold text-gray-900 mb-6">Be Part of Our Story</h3>
                    <p class="text-xl text-gray-700 mb-8 leading-relaxed">Join thousands of families who have experienced the magic of Shifa's compassionate healthcare</p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <button class="btn-premium-purple text-lg px-8 py-4">
                            Share Your Story
                            <div class="w-5 h-5 ml-3 bg-white rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                        </button>
                        <button class="btn-outline-premium text-lg px-8 py-4">
                            Visit Our Community
                            <div class="w-5 h-5 ml-3 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Advanced Medical Technology Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Advanced Medical Technology</h2>
                <p class="section-subtitle text-gray-600">State-of-the-art medical devices powered by artificial intelligence for superior healthcare delivery</p>
            </div>

            <div class="space-y-16">
                <!-- Device 1: Telemedicine Hub -->
                <div class="premium-card hover-lift-strong">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="device-content">
                            <div class="mb-6">
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Telemedicine Hub</h3>
                                <p class="text-lg text-gray-700 mb-6 leading-relaxed">Advanced communication platform connecting rural patients with specialist doctors through high-definition video consultations and real-time health monitoring.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">4K video consultation quality</span>
                                </div>
                                <div class="flex items-center p-3 bg-purple-50 rounded-lg border border-purple-100">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">Multi-language support</span>
                                </div>
                                <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                                    <div class="w-2 h-2 bg-blue-600 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">Secure data encryption</span>
                                </div>
                                <div class="flex items-center p-3 bg-purple-50 rounded-lg border border-purple-100">
                                    <div class="w-2 h-2 bg-purple-600 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">24/7 emergency connectivity</span>
                                </div>
                            </div>

                            <button class="btn-premium-blue">
                                Learn More
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-blue-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                        </div>

                        <div class="relative">
                            <img src="{{ asset('images/devices/telemedicine-hub.jpg') }}" alt="Telemedicine Hub" class="w-full h-80 object-cover rounded-2xl shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-4 rounded-xl border border-white/50">
                                <div class="text-gray-900 font-bold text-lg">4K Video Quality</div>
                                <div class="text-gray-600 text-sm">Crystal Clear Consultations</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Device 2: Smart Health Monitor -->
                <div class="premium-card hover-lift-strong">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="relative order-2 lg:order-1">
                            <img src="{{ asset('images/devices/smart-monitor.jpg') }}" alt="Smart Health Monitor" class="w-full h-80 object-cover rounded-2xl shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-4 rounded-xl border border-white/50">
                                <div class="text-gray-900 font-bold text-lg">30-Day Battery</div>
                                <div class="text-gray-600 text-sm">Continuous Monitoring</div>
                            </div>
                        </div>

                        <div class="device-content order-1 lg:order-2">
                            <div class="mb-6">
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Smart Health Monitor</h3>
                                <p class="text-lg text-gray-700 mb-6 leading-relaxed">Wearable IoT device for continuous health monitoring with predictive analytics, designed for long-term patient care and early disease detection.</p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center p-3 bg-green-50 rounded-lg border border-green-100">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">Continuous vital monitoring</span>
                                </div>
                                <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">Predictive health analytics</span>
                                </div>
                                <div class="flex items-center p-3 bg-red-50 rounded-lg border border-red-100">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">Emergency alert system</span>
                                </div>
                                <div class="flex items-center p-3 bg-purple-50 rounded-lg border border-purple-100">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                    <span class="text-gray-800 font-medium text-sm">30-day battery life</span>
                                </div>
                            </div>

                            <button class="btn-premium-purple">
                                Learn More
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-purple-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Women and Child Health Section - Premium Design -->
    <section class="py-24 bg-gradient-to-br from-purple-50 via-blue-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient-purple mb-6">Women & Child Health Excellence</h2>
                <p class="section-subtitle text-gray-600">Comprehensive healthcare solutions designed specifically for mothers and children with advanced medical technology</p>
            </div>

            <!-- Main Dashboard Section -->
            <div class="premium-card mb-12 p-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <img src="{{ asset('images/icons/womens-health-1.png') }}" alt="Women's Health Icon" class="w-20 h-20 mx-auto lg:mx-0 mb-6">
                            <h3 class="text-4xl font-bold text-gray-900 mb-4">Integrated Women's Health Dashboard</h3>
                            <p class="text-xl text-gray-700 mb-6 leading-relaxed">Comprehensive digital platform for tracking women's and children's health metrics, appointments, and care plans with real-time monitoring and AI-powered insights.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-purple-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/health-records-1.png') }}" alt="Records Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Digital Health Records</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Complete medical history and treatment tracking</p>
                            </div>
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/appointment-2.png') }}" alt="Appointment Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Smart Scheduling</h4>
                                </div>
                                <p class="text-gray-600 text-sm">AI-optimized appointment booking system</p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/care-plan-3.png') }}" alt="Care Plan Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Personalized Care Plans</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Customized treatment roadmaps and goals</p>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/progress-4.png') }}" alt="Progress Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Progress Tracking</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Real-time health monitoring and analytics</p>
                            </div>
                        </div>

                        <button class="btn-primary text-lg px-8 py-4">
                            Access Dashboard
                            <div class="w-5 h-5 ml-3 bg-white rounded-full flex items-center justify-center">
                                <div class="w-0 h-0 border-l-3 border-l-blue-600 border-y-2 border-y-transparent"></div>
                            </div>
                        </button>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('images/dashboard-main.jpg') }}" alt="Women's Health Dashboard" class="w-full h-250 object-cover rounded-2xl shadow-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">98%</div>
                                <div class="text-gray-600 text-xs">Satisfaction Rate</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">24/7</div>
                                <div class="text-gray-600 text-xs">Support Available</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">50K+</div>
                                <div class="text-gray-600 text-xs">Women Served</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specialized Care Services -->
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Maternal Care -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/maternal-1.png') }}" alt="Maternal Care Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Maternal Care Excellence</h3>
                        <p class="text-gray-700 mb-4">Advanced prenatal and postnatal care with AI-powered risk assessment and personalized treatment plans for expecting mothers.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <img src="{{ asset('images/icons/prenatal-1.png') }}" alt="Prenatal Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Comprehensive Prenatal Monitoring</span>
                        </div>
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <img src="{{ asset('images/icons/risk-2.png') }}" alt="Risk Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">AI-Powered Risk Assessment</span>
                        </div>
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <img src="{{ asset('images/icons/nutrition-3.png') }}" alt="Nutrition Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Personalized Nutrition Guidance</span>
                        </div>
                        <div class="flex items-center p-3 bg-red-50 rounded-lg">
                            <img src="{{ asset('images/icons/emergency-4.png') }}" alt="Emergency Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">24/7 Emergency Support</span>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/maternal-care.jpg') }}" alt="Maternal Care" class="w-full h-50 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-primary w-full">
                        Access Maternal Care
                        <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                            <div class="w-0 h-0 border-l-2 border-l-blue-600 border-y-1 border-y-transparent"></div>
                        </div>
                    </button>
                </div>

                <!-- Pediatric Care -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/pediatric-2.png') }}" alt="Pediatric Care Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Pediatric Care Solutions</h3>
                        <p class="text-gray-700 mb-4">Specialized healthcare services for children with age-appropriate treatments, growth monitoring, and family-centered care approaches.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <img src="{{ asset('images/icons/growth-1.png') }}" alt="Growth Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Advanced Growth Tracking</span>
                        </div>
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <img src="{{ asset('images/icons/vaccination-2.png') }}" alt="Vaccination Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Smart Vaccination Schedule</span>
                        </div>
                        <div class="flex items-center p-3 bg-yellow-50 rounded-lg">
                            <img src="{{ asset('images/icons/development-3.png') }}" alt="Development Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Developmental Assessment</span>
                        </div>
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <img src="{{ asset('images/icons/family-4.png') }}" alt="Family Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Family Support Services</span>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/pediatric-care.jpg') }}" alt="Pediatric Care" class="w-full h-50 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-secondary w-full">
                        Access Child Care
                        <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                            <div class="w-0 h-0 border-l-2 border-l-purple-600 border-y-1 border-y-transparent"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency and Accessibility Services Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Emergency & Accessibility Services</h2>
                <p class="section-subtitle text-gray-600">Rapid response healthcare services for critical situations and accessibility needs</p>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-6">
                <!-- Emergency Response -->
                <div class="premium-card hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/emergency-response-team.jpg') }}" alt="Emergency Response" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                        <div class="absolute top-4 left-4">
                            <img src="{{ asset('images/icons/emergency-1.png') }}" alt="Emergency Icon" class="w-12 h-12">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Emergency Response</h3>
                    <p class="text-gray-700 mb-4 text-sm">24/7 emergency medical response with trained paramedics and advanced life support equipment.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">24/7 Available</span>
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">Rapid Response</span>
                    </div>
                    <button class="btn-emergency w-full text-sm">Contact Emergency</button>
                </div>

                <!-- Critical Care Transport -->
                <div class="premium-card hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/emergency-critical-transport.jpg') }}" alt="Critical Care Transport" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                        <div class="absolute top-4 left-4">
                            <img src="{{ asset('images/icons/transport-2.png') }}" alt="Transport Icon" class="w-12 h-12">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Critical Care Transport</h3>
                    <p class="text-gray-700 mb-4 text-sm">Specialized medical transport for critical patients with ICU-level care during transit.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">ICU Equipment</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">GPS Tracking</span>
                    </div>
                    <button class="btn-primary w-full text-sm">Request Transport</button>
                </div>

                <!-- Disaster Response -->
                <div class="premium-card hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/emergency-disaster-response.jpg') }}" alt="Disaster Response" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                        <div class="absolute top-4 left-4">
                            <img src="{{ asset('images/icons/disaster-3.png') }}" alt="Disaster Icon" class="w-12 h-12">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Disaster Response</h3>
                    <p class="text-gray-700 mb-4 text-sm">Coordinated medical response for natural disasters and mass casualty incidents.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-medium">Mass Casualty</span>
                        <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-medium">Mobile Units</span>
                    </div>
                    <button class="btn-outline w-full text-sm">Learn More</button>
                </div>

                <!-- Accessibility Support -->
                <div class="premium-card hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/emergency-accessibility.jpg') }}" alt="Accessibility Support" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                        <div class="absolute top-4 left-4">
                            <img src="{{ asset('images/icons/accessibility-4.png') }}" alt="Accessibility Icon" class="w-12 h-12">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Accessibility Support</h3>
                    <p class="text-gray-700 mb-4 text-sm">Specialized healthcare services for patients with disabilities and mobility challenges.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Barrier-Free</span>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Adaptive Care</span>
                    </div>
                    <button class="btn-secondary w-full text-sm">Access Services</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Local Ambulance Services with Real Map -->
    <section class="py-24 bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Local Ambulance Network</h2>
                <p class="section-subtitle text-gray-600">Real-time ambulance tracking and emergency response coordination across Bangladesh</p>
            </div>

            <div class="premium-card p-8">
                <div class="grid lg:grid-cols-3 gap-12 items-center">
                    <div class="lg:col-span-2">
                        <div class="relative h-96 bg-gray-100 rounded-2xl overflow-hidden shadow-xl">
                            <!-- Real Map Background -->
                            <div class="absolute inset-0">
                                <img src="{{ asset('images/maps/bangladesh-map.jpg') }}" alt="Bangladesh Map" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-blue-500/10"></div>
                            </div>

                            <!-- Road Network Overlay -->
                            <div class="absolute inset-0">
                                <!-- Major Roads -->
                                <div class="absolute top-1/4 left-1/4 w-32 h-1 bg-gray-600 transform rotate-45"></div>
                                <div class="absolute top-1/2 left-1/3 w-24 h-1 bg-gray-600 transform -rotate-12"></div>
                                <div class="absolute bottom-1/3 right-1/4 w-28 h-1 bg-gray-600 transform rotate-12"></div>

                                <!-- Area Labels -->
                                <div class="absolute top-1/4 left-1/4 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Dhaka</div>
                                <div class="absolute top-1/2 right-1/3 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Chittagong</div>
                                <div class="absolute bottom-1/3 left-1/3 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Sylhet</div>
                                <div class="absolute top-2/3 right-1/4 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Khulna</div>
                            </div>

                            <!-- Ambulance Markers -->
                            <div class="absolute top-1/4 left-1/3 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                <img src="{{ asset('images/icons/ambulance.png') }}" alt="Available Ambulance" class="w-5 h-5">
                            </div>
                            <div class="absolute top-1/2 right-1/3 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                <img src="{{ asset('images/icons/ambulance-available.png') }}" alt="Available Ambulance" class="w-5 h-5">
                            </div>
                            <div class="absolute bottom-1/3 left-1/2 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center shadow-lg">
                                <img src="{{ asset('images/icons/ambulance-busy.png') }}" alt="Busy Ambulance" class="w-5 h-5">
                            </div>
                            <div class="absolute top-2/3 right-1/4 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                <img src="{{ asset('images/icons/ambulance-avg.png') }}" alt="Available Ambulance" class="w-5 h-5">
                            </div>

                            <!-- Map Controls -->
                            <div class="absolute top-4 right-4 space-y-2">
                                <button class="bg-white px-3 py-1 rounded shadow text-sm font-medium text-blue-600 border border-blue-200">All Units</button>
                                <button class="bg-white px-3 py-1 rounded shadow text-sm font-medium text-gray-600">Available</button>
                                <button class="bg-white px-3 py-1 rounded shadow text-sm font-medium text-gray-600">On Duty</button>
                            </div>

                            <!-- Live Status Indicator -->
                            <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-2 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                    <span class="text-sm font-medium text-gray-800">Live Tracking Active</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="text-center">
                            <img src="{{ asset('images/icons/ambulance-network-1.png') }}" alt="Network Icon" class="w-16 h-16 mx-auto mb-4">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Emergency Response Network</h3>
                            <p class="text-gray-700 mb-6">Real-time ambulance tracking and dispatch system for immediate emergency response across Bangladesh.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl border border-green-200">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('images/icons/available-units.png') }}" alt="Available Icon" class="w-6 h-6">
                                    <span class="font-semibold text-gray-900">Available Units</span>
                                </div>
                                <span class="text-2xl font-bold text-green-600">12</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl border border-red-200">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('images/icons/on-duty.png') }}" alt="On Duty Icon" class="w-6 h-6">
                                    <span class="font-semibold text-gray-900">On Duty</span>
                                </div>
                                <span class="text-2xl font-bold text-red-600">8</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl border border-blue-200">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset('images/icons/response-time.png') }}" alt="Response Time Icon" class="w-6 h-6">
                                    <span class="font-semibold text-gray-900">Avg Response</span>
                                </div>
                                <span class="text-2xl font-bold text-blue-600">4 min</span>
                            </div>
                        </div>

                        <button class="btn-emergency w-full text-lg py-4">
                            Request Emergency Ambulance
                            <div class="w-5 h-5 ml-2 bg-white rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/icons/emergency-call.png') }}" alt="Call Icon" class="w-3 h-3">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community and Connectivity Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Community & Connectivity</h2>
                <p class="section-subtitle text-gray-600">Building stronger healthcare communities through connection and collaboration</p>
            </div>

            <!-- Healthcare Community Hub - Full Width -->
            <div class="premium-card mb-8 p-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <img src="{{ asset('images/icons/community-hub-1.png') }}" alt="Community Hub Icon" class="w-20 h-20 mx-auto lg:mx-0 mb-6">
                            <h3 class="text-4xl font-bold text-gray-900 mb-4">Healthcare Community Hub</h3>
                            <p class="text-xl text-gray-700 mb-6 leading-relaxed">Open-source community platform bridging doctors and patients with collaborative healthcare solutions, knowledge sharing, and peer support networks.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-start space-x-4 p-4 bg-purple-50 rounded-xl">
                                <img src="{{ asset('images/icons/discussion-1.png') }}" alt="Discussion Icon" class="w-8 h-8 mt-1">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-2">Discussion Forums</h4>
                                    <p class="text-gray-600 text-sm">Join conversations about health topics, share experiences, and get advice from community members and healthcare professionals.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-4 bg-blue-50 rounded-xl">
                                <img src="{{ asset('images/icons/expert-network-2.png') }}" alt="Expert Network Icon" class="w-8 h-8 mt-1">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-2">Expert Network</h4>
                                    <p class="text-gray-600 text-sm">Connect directly with healthcare professionals and specialists for guidance, consultations, and medical advice.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-4 bg-green-50 rounded-xl">
                                <img src="{{ asset('images/icons/knowledge-sharing-3.png') }}" alt="Knowledge Sharing Icon" class="w-8 h-8 mt-1">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-2">Knowledge Sharing</h4>
                                    <p class="text-gray-600 text-sm">Access medical resources, research papers, and educational content contributed by the community.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-4 bg-orange-50 rounded-xl">
                                <img src="{{ asset('images/icons/open-source-4.png') }}" alt="Open Source Icon" class="w-8 h-8 mt-1">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-2">Open Source Solutions</h4>
                                    <p class="text-gray-600 text-sm">Collaborate on healthcare technology development and contribute to open-source medical solutions.</p>
                                </div>
                            </div>
                        </div>

                        <button class="btn-primary text-lg px-8 py-4">
                            Join Community Hub
                            <div class="w-5 h-5 ml-3 bg-white rounded-full flex items-center justify-center">
                                <div class="w-0 h-0 border-l-3 border-l-blue-600 border-y-2 border-y-transparent"></div>
                            </div>
                        </button>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('images/community-hub.jpg') }}" alt="Community Hub" class="w-full h-115 object-cover rounded-2xl shadow-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">25K+</div>
                                <div class="text-gray-600 text-xs">Active Members</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">500+</div>
                                <div class="text-gray-600 text-xs">Healthcare Experts</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">100%</div>
                                <div class="text-gray-600 text-xs">Open Source</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Community Response and Support Network -->
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Community Response Card -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/community-response-1.png') }}" alt="Community Response Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Community Response Network</h3>
                        <p class="text-gray-700 mb-4">Volunteer-driven emergency response network for immediate community support during health crises and natural disasters.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <img src="{{ asset('images/icons/volunteer-1.png') }}" alt="Volunteer Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Volunteer Coordination System</span>
                        </div>
                        <div class="flex items-center p-3 bg-red-50 rounded-lg">
                            <img src="{{ asset('images/icons/alert-2.png') }}" alt="Alert Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Emergency Alert Network</span>
                        </div>
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <img src="{{ asset('images/icons/resource-3.png') }}" alt="Resource Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Resource Sharing Platform</span>
                        </div>
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <img src="{{ asset('images/icons/training-4.png') }}" alt="Training Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Community Training Programs</span>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/community-response-network.jpg') }}" alt="Community Response" class="w-full h-55 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-secondary w-full">
                        Join Response Team
                        <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                            <div class="w-0 h-0 border-l-2 border-l-purple-600 border-y-1 border-y-transparent"></div>
                        </div>
                    </button>
                </div>

                <!-- Support Network Card -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/support-network-1.png') }}" alt="Support Network Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Support Network Services</h3>
                        <p class="text-gray-700 mb-4">Comprehensive peer support groups and mental health resources for patients and families facing health challenges and recovery journeys.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <img src="{{ asset('images/icons/peer-support-1.png') }}" alt="Peer Support Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Peer Support Groups</span>
                        </div>
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <img src="{{ asset('images/icons/mental-health-2.png') }}" alt="Mental Health Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Mental Health Resources</span>
                        </div>
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <img src="{{ asset('images/icons/counseling-3.png') }}" alt="Counseling Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Family Counseling Services</span>
                        </div>
                        <div class="flex items-center p-3 bg-orange-50 rounded-lg">
                            <img src="{{ asset('images/icons/crisis-4.png') }}" alt="Crisis Icon" class="w-6 h-6 mr-3">
                            <span class="text-gray-800 font-medium text-sm">Crisis Intervention Support</span>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/community-support-network.jpg') }}" alt="Support Network" class="w-full h-55 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-outline w-full">
                        Access Support Services
                        <div class="w-4 h-4 ml-2 bg-blue-500 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Health Monitoring and Resources Section -->
    <section class="py-24 bg-gradient-to-br from-purple-50 via-blue-50 to-white" x-data="healthMonitoringFixed">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Health Monitoring & Resources</h2>
                <p class="section-subtitle text-gray-600">Comprehensive health tracking and educational resources for better health outcomes</p>
            </div>

            <div class="monitoring-carousel-fixed">
                <div class="carousel-track-fixed" :style="`transform: translateX(-${currentSlide * 100}%)`">
                    <!-- Slide 1: Personal Health Dashboard -->
                    <div class="monitoring-slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/health-monitoring-dashboard-bg.jpg') }}'); background-size: cover; background-position: center;">
                        <div class="monitoring-card-fixed">
                            <h3 class="text-3xl font-bold text-white mb-6">Personal Health Dashboard</h3>
                            <p class="text-lg text-white/90 mb-8">Comprehensive health tracking with real-time monitoring of vital signs, medication schedules, and health goals with AI-powered insights.</p>
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Real-time Vital Monitoring</h4>
                                    <p class="text-sm text-white/80">Continuous tracking of heart rate, blood pressure, and other vital signs</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Medication Reminders</h4>
                                    <p class="text-sm text-white/80">Smart alerts and scheduling for medication adherence</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Health Goal Tracking</h4>
                                    <p class="text-sm text-white/80">Personalized health objectives and progress monitoring</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">AI Health Insights</h4>
                                    <p class="text-sm text-white/80">Predictive analytics and health recommendations</p>
                                </div>
                            </div>
                            <button class="btn-hero-primary">Access Dashboard</button>
                        </div>
                    </div>

                    <!-- Slide 2: Symptom Checker -->
                    <div class="monitoring-slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/health-monitoring-symptom-checker-bg.jpg') }}'); background-size: cover; background-position: center;">
                        <div class="monitoring-card-fixed">
                            <h3 class="text-3xl font-bold text-white mb-6">AI Symptom Checker</h3>
                            <p class="text-lg text-white/90 mb-8">Advanced AI-powered symptom analysis to help identify potential health issues and recommend appropriate care with 95% accuracy.</p>
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">AI-Powered Analysis</h4>
                                    <p class="text-sm text-white/80">Advanced machine learning for accurate symptom assessment</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Instant Recommendations</h4>
                                    <p class="text-sm text-white/80">Immediate care suggestions and next steps</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Risk Assessment</h4>
                                    <p class="text-sm text-white/80">Comprehensive health risk evaluation and alerts</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Medical History Integration</h4>
                                    <p class="text-sm text-white/80">Personalized analysis based on your health history</p>
                                </div>
                            </div>
                            <button class="btn-hero-secondary">Check Symptoms</button>
                        </div>
                    </div>

                    <!-- Slide 3: Health Library -->
                    <div class="monitoring-slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/health-monitoring-health-library-bg.jpg') }}'); background-size: cover; background-position: center;">
                        <div class="monitoring-card-fixed">
                            <h3 class="text-3xl font-bold text-white mb-6">Health Resource Library</h3>
                            <p class="text-lg text-white/90 mb-8">Comprehensive collection of health information, treatment guides, and wellness resources in multiple languages for Bangladesh.</p>
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Medical Encyclopedia</h4>
                                    <p class="text-sm text-white/80">Extensive database of medical conditions and treatments</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Treatment Guides</h4>
                                    <p class="text-sm text-white/80">Step-by-step treatment protocols and procedures</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Wellness Resources</h4>
                                    <p class="text-sm text-white/80">Preventive care and lifestyle guidance materials</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Multi-Language Support</h4>
                                    <p class="text-sm text-white/80">Available in Bengali, English, and regional languages</p>
                                </div>
                            </div>
                            <button class="btn-hero-primary">Browse Library</button>
                        </div>
                    </div>

                    <!-- Slide 4: Medication Management -->
                    <div class="monitoring-slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/health-monitoring-medication-bg.jpg') }}'); background-size: cover; background-position: center;">
                        <div class="monitoring-card-fixed">
                            <h3 class="text-3xl font-bold text-white mb-6">Medication Management</h3>
                            <p class="text-lg text-white/90 mb-8">Smart medication tracking with reminders, interaction checks, and refill notifications for better adherence and safety.</p>
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Smart Reminders</h4>
                                    <p class="text-sm text-white/80">Personalized medication alerts and scheduling</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Interaction Alerts</h4>
                                    <p class="text-sm text-white/80">Drug interaction warnings and safety checks</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Refill Notifications</h4>
                                    <p class="text-sm text-white/80">Automatic pharmacy refill reminders and ordering</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Adherence Tracking</h4>
                                    <p class="text-sm text-white/80">Monitor medication compliance and effectiveness</p>
                                </div>
                            </div>
                            <button class="btn-hero-secondary">Manage Medications</button>
                        </div>
                    </div>

                    <!-- Slide 5: Wellness Programs -->
                    <div class="monitoring-slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/health-monitoring-wellness-bg.jpg') }}'); background-size: cover; background-position: center;">
                        <div class="monitoring-card-fixed">
                            <h3 class="text-3xl font-bold text-white mb-6">Wellness Programs</h3>
                            <p class="text-lg text-white/90 mb-8">Personalized wellness programs including fitness tracking, nutrition guidance, and mental health support for holistic care.</p>
                            <div class="grid md:grid-cols-2 gap-4 mb-8">
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Fitness Tracking</h4>
                                    <p class="text-sm text-white/80">Activity monitoring and exercise recommendations</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Nutrition Guidance</h4>
                                    <p class="text-sm text-white/80">Personalized meal plans and dietary advice</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Mental Health Support</h4>
                                    <p class="text-sm text-white/80">Stress management and mindfulness programs</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-white">
                                    <h4 class="font-bold mb-2">Progress Analytics</h4>
                                    <p class="text-sm text-white/80">Comprehensive wellness tracking and insights</p>
                                </div>
                            </div>
                            <button class="btn-hero-primary">Join Programs</button>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <div class="carousel-controls-fixed">
                    <button @click="previousSlide()" class="carousel-btn-fixed">
                        <div class="w-0 h-0 border-r-4 border-r-white border-y-2 border-y-transparent"></div>
                    </button>

                    <div class="carousel-dots">
                        <template x-for="(slide, index) in totalSlides" :key="index">
                            <button @click="currentSlide = index"
                                    class="carousel-dot"
                                    :class="{ 'active': currentSlide === index }">
                            </button>
                        </template>
                    </div>

                    <button @click="nextSlide()" class="carousel-btn-fixed">
                        <div class="w-0 h-0 border-l-4 border-l-white border-y-2 border-y-transparent"></div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Integrated Health Dashboard Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Integrated Health Dashboard</h2>
                <p class="section-subtitle text-gray-600">Comprehensive health management platform with AI-powered insights and real-time monitoring</p>
            </div>

            <div class="premium-card p-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <img src="{{ asset('images/icons/dashboard-main-1.png') }}" alt="Dashboard Icon" class="w-20 h-20 mx-auto lg:mx-0 mb-6">
                            <h3 class="text-4xl font-bold text-gray-900 mb-4">Unified Health Management</h3>
                            <p class="text-xl text-gray-700 mb-6 leading-relaxed">Centralized platform integrating all your health data, medical records, appointments, and care plans with advanced AI analytics for personalized healthcare.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/health-records-1.png') }}" alt="Records Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Health Records</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Complete digital health history and medical documentation</p>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/ai-insights-2.png') }}" alt="AI Insights Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">AI Insights</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Predictive analytics and personalized health recommendations</p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/real-time-3.png') }}" alt="Real-time Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Real-time Monitoring</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Continuous health tracking and vital signs monitoring</p>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/care-coordination-4.png') }}" alt="Care Coordination Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Care Coordination</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Seamless communication between healthcare providers</p>
                            </div>
                        </div>

                        <button class="btn-primary text-lg px-8 py-4">
                            Access Dashboard
                            <div class="w-5 h-5 ml-3 bg-white rounded-full flex items-center justify-center">
                                <div class="w-0 h-0 border-l-3 border-l-blue-600 border-y-2 border-y-transparent"></div>
                            </div>
                        </button>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('images/dashboard-integrated.jpg') }}" alt="Integrated Dashboard" class="w-full h-96 object-cover rounded-2xl shadow-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">100K+</div>
                                <div class="text-gray-600 text-xs">Active Users</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">99.9%</div>
                                <div class="text-gray-600 text-xs">Uptime</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">24/7</div>
                                <div class="text-gray-600 text-xs">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LifeStream Network Section -->
    <section class="py-24 bg-gradient-to-br from-red-50 via-pink-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">LifeStream Network</h2>
                <p class="section-subtitle text-gray-600">Comprehensive blood donation and matching network saving lives across Bangladesh</p>
            </div>

            <!-- Main Blood Network Dashboard -->
            <div class="premium-card mb-8 p-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="text-center lg:text-left">
                            <img src="{{ asset('images/icons/lifestream-1.png') }}" alt="LifeStream Icon" class="w-20 h-20 mx-auto lg:mx-0 mb-6">
                            <h3 class="text-4xl font-bold text-gray-900 mb-4">Blood Donation Network</h3>
                            <p class="text-xl text-gray-700 mb-6 leading-relaxed">Advanced blood group profiling system connecting donors and patients with real-time availability, emergency requests, and AI-powered cross-matching for safe transfusions.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-red-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/blood-profile-1.png') }}" alt="Blood Profile Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Blood Group Profiling</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Comprehensive blood type analysis and compatibility matching</p>
                            </div>
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/donor-network-2.png') }}" alt="Donor Network Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Donor Network</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Real-time donor availability and location tracking</p>
                            </div>
                            <div class="bg-green-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/emergency-request-3.png') }}" alt="Emergency Request Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">Emergency Requests</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Instant blood request system for critical situations</p>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-xl">
                                <div class="flex items-center mb-3">
                                    <img src="{{ asset('images/icons/ai-matching-5.png') }}" alt="AI Matching Icon" class="w-8 h-8 mr-3">
                                    <h4 class="text-lg font-bold text-gray-900">AI Cross-Matching</h4>
                                </div>
                                <p class="text-gray-600 text-sm">Advanced compatibility analysis and safety verification</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="btn-primary flex-1">
                                Register as Donor
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                </div>
                            </button>
                            <button class="btn-emergency flex-1">
                                Request Blood
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-red-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('images/blood-network.jpg') }}" alt="Blood Network" class="w-full h-96 object-cover rounded-2xl shadow-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-red-600">15K+</div>
                                <div class="text-gray-600 text-xs">Active Donors</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-green-600">2.5K</div>
                                <div class="text-gray-600 text-xs">Lives Saved</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-blue-600">98%</div>
                                <div class="text-gray-600 text-xs">Match Success</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blood Services Grid -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Emergency Blood Request -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/blood-1.png') }}" alt="Emergency Blood Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Emergency Blood Request</h3>
                        <p class="text-gray-700 mb-4">Quick blood request system for critical patients with real-time donor matching and location-based availability.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="text-gray-700 text-sm">
                            <strong>Required Information:</strong>
                        </div>
                        <div class="text-gray-600 text-sm">• Patient name and contact</div>
                        <div class="text-gray-600 text-sm">• Blood group and quantity needed</div>
                        <div class="text-gray-600 text-sm">• Hospital location and urgency</div>
                        <div class="text-gray-600 text-sm">• Medical reason for transfusion</div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/request.jpg') }}" alt="Emergency Request" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-emergency w-full">
                        Submit Emergency Request
                        <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                        </div>
                    </button>
                </div>

                <!-- Rare Blood Database -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/rare-blood-2.png') }}" alt="Rare Blood Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Rare Blood Database</h3>
                        <p class="text-gray-700 mb-4">Specialized database for rare blood types including Rh-negative and other uncommon blood groups with dedicated donor network.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="bg-purple-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Rh-Negative Types</div>
                            <div class="text-xs text-gray-600">O-, A-, B-, AB-</div>
                        </div>
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Rare Variants</div>
                            <div class="text-xs text-gray-600">Duffy, Diego, Kidd negative</div>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Special Donors</div>
                            <div class="text-xs text-gray-600">500+ registered rare donors</div>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/rare-blood.jpg') }}" alt="Rare Blood" class="w-full h-55 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-secondary w-full">
                        Access Rare Blood Database
                        <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                            <div class="w-0 h-0 border-l-2 border-l-purple-600 border-y-1 border-y-transparent"></div>
                        </div>
                    </button>
                </div>

                <!-- AI Blood Test Analysis -->
                <div class="premium-card p-6">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/icons/ai-blood-test-3.png') }}" alt="AI Blood Test Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">AI Blood Test Analysis</h3>
                        <p class="text-gray-700 mb-4">Advanced AI-powered blood test report analysis and cross-matching verification for safe and compatible transfusions.</p>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Cross-Matching Analysis</div>
                            <div class="text-xs text-gray-600">AI-powered compatibility verification</div>
                        </div>
                        <div class="bg-green-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Report Analysis</div>
                            <div class="text-xs text-gray-600">Automated blood test interpretation</div>
                        </div>
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <div class="text-sm font-semibold text-gray-900">Safety Verification</div>
                            <div class="text-xs text-gray-600">Risk assessment and safety checks</div>
                        </div>
                    </div>

                    <div class="relative mb-6">
                        <img src="{{ asset('images/ai-analysis.jpg') }}" alt="AI Analysis" class="w-full h-48 object-cover rounded-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                    </div>

                    <button class="btn-outline w-full">
                        Upload Blood Test Report
                        <div class="w-4 h-4 ml-2 bg-blue-500 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Smart Distribution and Medical Access Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Smart Distribution & Medical Access</h2>
                <p class="section-subtitle text-gray-600">Intelligent healthcare distribution network ensuring equitable access to medical resources</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center mb-16">
                <div class="space-y-8">
                    <div class="space-y-6">
                        <img src="{{ asset('images/icons/distribution-1.png') }}" alt="Distribution Icon" class="w-16 h-16">
                        <h3 class="text-4xl font-bold text-gray-900">Revolutionizing Healthcare Distribution</h3>
                        <p class="text-xl text-gray-700 leading-relaxed">Our AI-powered distribution network ensures that medical supplies, medications, and healthcare services reach every corner of Bangladesh, especially the most underserved communities.</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-xl">
                            <img src="{{ asset('images/icons/rapid-deployment-1.png') }}" alt="Rapid Deployment Icon" class="w-8 h-8 mb-3">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Rapid Deployment</h4>
                            <p class="text-gray-600 text-sm">Emergency medical supplies delivered within hours to any location in Bangladesh.</p>
                        </div>

                        <div class="bg-purple-50 p-4 rounded-xl">
                            <img src="{{ asset('images/icons/smart-analytics-2.png') }}" alt="Smart Analytics Icon" class="w-8 h-8 mb-3">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Smart Analytics</h4>
                            <p class="text-gray-600 text-sm">AI-driven demand prediction and inventory optimization for efficient resource allocation.</p>
                        </div>

                        <div class="bg-green-50 p-4 rounded-xl">
                            <img src="{{ asset('images/icons/gps-tracking-3.png') }}" alt="GPS Tracking Icon" class="w-8 h-8 mb-3">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">GPS Tracking</h4>
                            <p class="text-gray-600 text-sm">Real-time tracking of medical supplies from warehouse to patient delivery.</p>
                        </div>

                        <div class="bg-orange-50 p-4 rounded-xl">
                            <img src="{{ asset('images/icons/quality-assurance-4.png') }}" alt="Quality Assurance Icon" class="w-8 h-8 mb-3">
                            <h4 class="text-lg font-bold text-gray-900 mb-2">Quality Assurance</h4>
                            <p class="text-gray-600 text-sm">Temperature-controlled storage and transport ensuring medication integrity.</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="btn-primary flex-1">
                            Request Medical Supplies
                            <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                <div class="w-0 h-0 border-l-2 border-l-blue-600 border-y-1 border-y-transparent"></div>
                            </div>
                        </button>
                        <button class="btn-outline flex-1">
                            Track Delivery
                            <div class="w-4 h-4 ml-2 bg-blue-500 rounded-full flex items-center justify-center">
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <img src="{{ asset('images/distribution-smart-network.jpg') }}" alt="Smart Distribution Network" class="w-full h-96 object-cover rounded-2xl shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>

                    <!-- Floating Stats -->
                    <div class="absolute bottom-6 left-6 right-6 grid grid-cols-3 gap-3">
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-2xl font-bold text-gray-900">98%</div>
                            <div class="text-gray-600 text-xs">On-time Delivery</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-2xl font-bold text-gray-900">24/7</div>
                            <div class="text-gray-600 text-xs">Availability</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-2xl font-bold text-gray-900">150+</div>
                            <div class="text-gray-600 text-xs">Locations</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rural Pharmacy Collaboration Map -->
            <div class="premium-card p-8">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/icons/pharmacy-network-1.png') }}" alt="Pharmacy Network Icon" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Rural Pharmacy Collaboration Network</h3>
                    <p class="text-lg text-gray-700">Strategic partnerships with rural pharmacies ensuring medication availability in remote areas</p>
                </div>

                <div class="relative h-80 bg-gray-100 rounded-2xl overflow-hidden shadow-xl">
                    <!-- Rural Map Background -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/maps/rural-bangladesh.jpg') }}" alt="Rural Bangladesh Map" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-green-500/10"></div>
                    </div>

                    <!-- Pharmacy Locations -->
                    <div class="absolute top-1/4 left-1/4 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <img src="{{ asset('images/icons/pharmacy-marker.png') }}" alt="Pharmacy" class="w-4 h-4">
                    </div>
                    <div class="absolute top-1/2 right-1/3 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <img src="{{ asset('images/icons/pharmacy-marker.png') }}" alt="Pharmacy" class="w-4 h-4">
                    </div>
                    <div class="absolute bottom-1/3 left-1/2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <img src="{{ asset('images/icons/pharmacy-marker.png') }}" alt="Pharmacy" class="w-4 h-4">
                    </div>
                    <div class="absolute top-2/3 right-1/4 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <img src="{{ asset('images/icons/pharmacy-marker.png') }}" alt="Pharmacy" class="w-4 h-4">
                    </div>

                    <!-- Area Labels -->
                    <div class="absolute top-1/4 left-1/4 mt-8 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Rangpur</div>
                    <div class="absolute top-1/2 right-1/3 mt-8 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Mymensingh</div>
                    <div class="absolute bottom-1/3 left-1/2 mt-8 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Barisal</div>
                    <div class="absolute top-2/3 right-1/4 mt-8 bg-white/90 px-2 py-1 rounded text-xs font-semibold text-gray-800">Comilla</div>

                    <!-- Network Stats -->
                    <div class="absolute bottom-4 left-4 right-4 grid grid-cols-3 gap-3">
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-lg font-bold text-green-600">85+</div>
                            <div class="text-gray-600 text-xs">Partner Pharmacies</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-lg font-bold text-blue-600">95%</div>
                            <div class="text-gray-600 text-xs">Rural Coverage</div>
                        </div>
                        <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                            <div class="text-lg font-bold text-purple-600">24h</div>
                            <div class="text-gray-600 text-xs">Max Delivery</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education and Awareness Section with Enhanced Layout -->
    <section class="py-24 bg-gradient-to-br from-blue-50 via-purple-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Education & Awareness</h2>
                <p class="section-subtitle text-gray-600">Stay informed with the latest medical news, health insights, and educational content</p>
            </div>

            <!-- Latest Medical News Row -->
            <div class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">Latest Medical News</h3>
                <div class="grid lg:grid-cols-4 gap-6">
                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/medical-breakthrough-1.jpg') }}" alt="Medical Breakthrough" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-bold">BREAKING</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Revolutionary Cancer Treatment Shows 95% Success Rate</h4>
                        <p class="text-gray-600 text-sm mb-3">New immunotherapy treatment developed in Bangladesh shows unprecedented success...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">2 hours ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read More</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/ai-diagnosis-2.jpg') }}" alt="AI Diagnosis" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-bold">TRENDING</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">AI Diagnostic Tool Reduces Misdiagnosis by 80%</h4>
                        <p class="text-gray-600 text-sm mb-3">Shifa's latest AI diagnostic scanner achieves remarkable accuracy...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">5 hours ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read More</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/rural-healthcare-3.jpg') }}" alt="Rural Healthcare" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-orange-500 text-white px-2 py-1 rounded-full text-xs font-bold">URGENT</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Rural Healthcare Access Improves by 300%</h4>
                        <p class="text-gray-600 text-sm mb-3">Government partnership with Shifa brings advanced medical care...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">1 day ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read More</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/vaccine-development-4.jpg') }}" alt="Vaccine Development" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-bold">RESEARCH</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">New Vaccine Development Program Launched</h4>
                        <p class="text-gray-600 text-sm mb-3">Bangladesh initiates comprehensive vaccine research initiative...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">2 days ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Health Blogs & Articles Row -->
            <div class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">Health Blogs & Articles</h3>
                <div class="grid lg:grid-cols-4 gap-6">
                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/nutrition-guide-1.jpg') }}" alt="Nutrition Guide" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">HEALTH BLOG</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Complete Nutrition Guide for Bangladeshi Families</h4>
                        <p class="text-gray-600 text-sm mb-3">Essential nutrition tips and meal planning strategies...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">3 days ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read Article</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/mental-health-2.jpg') }}" alt="Mental Health" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">HEALTH BLOG</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Mental Health Awareness: Breaking the Stigma</h4>
                        <p class="text-gray-600 text-sm mb-3">Understanding mental health challenges and available support...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">1 week ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read Article</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/diabetes-management-3.jpg') }}" alt="Diabetes Management" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">HEALTH BLOG</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Diabetes Management in Rural Bangladesh</h4>
                        <p class="text-gray-600 text-sm mb-3">Practical strategies for managing diabetes with limited resources...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">1 week ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read Article</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/preventive-care-4.jpg') }}" alt="Preventive Care" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-bold">HEALTH BLOG</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Preventive Healthcare: Your First Line of Defense</h4>
                        <p class="text-gray-600 text-sm mb-3">Importance of regular checkups and preventive measures...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">2 weeks ago</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Read Article</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Medical Events Row -->
            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">Upcoming Medical Events</h3>
                <div class="grid lg:grid-cols-4 gap-6">
                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/medical-conference-1.jpg') }}" alt="Medical Conference" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-bold">UPCOMING EVENT</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">International Healthcare Innovation Summit 2025</h4>
                        <p class="text-gray-600 text-sm mb-3">Join leading healthcare professionals for groundbreaking discussions...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">March 15, 2025</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Register</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/health-screening-2.jpg') }}" alt="Health Screening" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-bold">UPCOMING EVENT</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Free Community Health Screening Drive</h4>
                        <p class="text-gray-600 text-sm mb-3">Comprehensive health checkups for all community members...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">February 28, 2025</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Join Event</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/medical-training-3.jpg') }}" alt="Medical Training" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-bold">UPCOMING EVENT</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Advanced Medical Training Workshop</h4>
                        <p class="text-gray-600 text-sm mb-3">Professional development workshop for healthcare workers...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">April 10, 2025</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Enroll Now</button>
                        </div>
                    </div>

                    <div class="premium-card hover-lift-strong">
                        <div class="relative mb-4">
                            <img src="{{ asset('images/research-symposium-4.jpg') }}" alt="Research Symposium" class="w-full h-48 object-cover rounded-xl">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs font-bold">UPCOMING EVENT</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-2">Medical Research Symposium 2025</h4>
                        <p class="text-gray-600 text-sm mb-3">Latest research findings and clinical studies presentation...</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">May 20, 2025</span>
                            <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Journals & Insights Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Medical Journals & Insights</h2>
                <p class="section-subtitle text-gray-600">Access cutting-edge medical research and clinical insights from leading healthcare professionals</p>
            </div>

            <!-- Clinical Insights Full Width Card -->
            <div class="premium-card p-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="space-y-8">
                        <div>
                            <img src="{{ asset('images/icons/research-1.png') }}" alt="Research Icon" class="w-16 h-16 mb-6">
                            <h3 class="text-4xl font-bold text-gray-900 mb-6">Clinical Research & Insights</h3>
                            <p class="text-xl text-gray-700 mb-8 leading-relaxed">Access the latest peer-reviewed medical research, clinical studies, and healthcare insights specifically focused on improving healthcare outcomes in Bangladesh and similar developing regions.</p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <img src="{{ asset('images/icons/database-1.png') }}" alt="Database Icon" class="w-8 h-8 mb-3">
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Research Database</h4>
                                <p class="text-gray-600 text-sm">Comprehensive collection of medical research papers and clinical studies.</p>
                            </div>

                            <div class="bg-purple-50 p-4 rounded-xl">
                                <img src="{{ asset('images/icons/expert-analysis-2.png') }}" alt="Expert Analysis Icon" class="w-8 h-8 mb-3">
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Expert Analysis</h4>
                                <p class="text-gray-600 text-sm">In-depth analysis and commentary from leading medical professionals.</p>
                            </div>

                            <div class="bg-green-50 p-4 rounded-xl">
                                <img src="{{ asset('images/icons/real-time-updates-3.png') }}" alt="Updates Icon" class="w-8 h-8 mb-3">
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Real-time Updates</h4>
                                <p class="text-gray-600 text-sm">Stay updated with the latest medical breakthroughs and discoveries.</p>
                            </div>

                            <div class="bg-orange-50 p-4 rounded-xl">
                                <img src="{{ asset('images/icons/collaboration-4.png') }}" alt="Collaboration Icon" class="w-8 h-8 mb-3">
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Collaborative Platform</h4>
                                <p class="text-gray-600 text-sm">Connect with researchers and contribute to medical knowledge.</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="btn-primary flex-1">
                                Access Research Database
                                <div class="w-4 h-4 ml-2 bg-white rounded-full flex items-center justify-center">
                                    <div class="w-0 h-0 border-l-2 border-l-blue-600 border-y-1 border-y-transparent"></div>
                                </div>
                            </button>
                            <button class="btn-outline flex-1">
                                Submit Research
                                <div class="w-4 h-4 ml-2 bg-blue-500 rounded-full flex items-center justify-center">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="relative">
                        <img src="{{ asset('images/clinical-insights.jpg') }}" alt="Clinical Research" class="w-full h-80 object-cover rounded-2xl shadow-xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent rounded-2xl"></div>

                        <!-- Research Stats -->
                        <div class="absolute bottom-6 left-6 right-6 grid grid-cols-2 gap-3">
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">500+</div>
                                <div class="text-gray-600 text-xs">Research Papers</div>
                            </div>
                            <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-gray-900">50+</div>
                                <div class="text-gray-600 text-xs">Expert Contributors</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Government Collaboration Potential Section -->
    <section class="py-24 bg-gradient-to-br from-blue-50 via-white to-purple-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-6">Government Collaboration Impact</h2>
                <p class="text-2xl text-gray-600 mb-8 max-w-4xl mx-auto">Transforming Bangladesh's healthcare landscape through strategic government partnership</p>
            </div>

            <!-- Impact Statistics Grid -->
            <div class="grid lg:grid-cols-4 gap-6 mb-16">
                <div class="premium-card p-6 text-center hover:scale-105 transition-all duration-500">
                    <img src="{{ asset('images/icons/lives-lost-1.png') }}" alt="Lives Lost Icon" class="w-12 h-12 mx-auto mb-4">
                    <div class="text-4xl font-bold text-gray-900 mb-2">85,000+</div>
                    <div class="text-red-600 font-semibold mb-2">Lives Lost Annually</div>
                    <div class="text-sm text-gray-600">Due to lack of healthcare access in rural areas</div>
                </div>

                <div class="premium-card p-6 text-center hover:scale-105 transition-all duration-500">
                    <img src="{{ asset('images/icons/economic-losses-2.png') }}" alt="Economic Losses Icon" class="w-12 h-12 mx-auto mb-4">
                    <div class="text-4xl font-bold text-gray-900 mb-2">৳2.5B</div>
                    <div class="text-blue-600 font-semibold mb-2">Economic Losses</div>
                    <div class="text-sm text-gray-600">Annual healthcare-related economic burden</div>
                </div>

                <div class="premium-card p-6 text-center hover:scale-105 transition-all duration-500">
                    <img src="{{ asset('images/icons/mortality-reduction-3.png') }}" alt="Mortality Reduction Icon" class="w-12 h-12 mx-auto mb-4">
                    <div class="text-4xl font-bold text-gray-900 mb-2">75%</div>
                    <div class="text-purple-600 font-semibold mb-2">Mortality Reduction</div>
                    <div class="text-sm text-gray-600">Projected with Shifa implementation</div>
                </div>

                <div class="premium-card p-6 text-center hover:scale-105 transition-all duration-500">
                    <img src="{{ asset('images/icons/economic-returns-4.png') }}" alt="Economic Returns Icon" class="w-12 h-12 mx-auto mb-4">
                    <div class="text-4xl font-bold text-gray-900 mb-2">৳8.2B</div>
                    <div class="text-blue-600 font-semibold mb-2">Economic Returns</div>
                    <div class="text-sm text-gray-600">Projected 5-year government savings</div>
                </div>
            </div>

            <!-- Government Benefits Grid -->
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-16">
                <div class="space-y-8">
                    <div>
                        <img src="{{ asset('images/icons/government-benefits-1.png') }}" alt="Government Benefits Icon" class="w-16 h-16 mb-6">
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">Strategic Government Benefits</h3>
                        <p class="text-xl text-gray-700 leading-relaxed">Partnership with Shifa delivers unprecedented value to the Government of Bangladesh through reduced healthcare burden, economic growth, and improved citizen welfare.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 p-4 bg-blue-50 rounded-xl">
                            <img src="{{ asset('images/icons/cost-reduction-1.png') }}" alt="Cost Reduction Icon" class="w-8 h-8 mt-1">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Healthcare Cost Reduction</h4>
                                <p class="text-gray-700">Reduce government healthcare expenditure by 40% through preventive care and early intervention.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-purple-50 rounded-xl">
                            <img src="{{ asset('images/icons/employment-2.png') }}" alt="Employment Icon" class="w-8 h-8 mt-1">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Employment Generation</h4>
                                <p class="text-gray-700">Create 50,000+ direct and indirect jobs in healthcare technology and services sector.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-green-50 rounded-xl">
                            <img src="{{ asset('images/icons/recognition-3.png') }}" alt="Recognition Icon" class="w-8 h-8 mt-1">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">International Recognition</h4>
                                <p class="text-gray-700">Position Bangladesh as a global leader in healthcare innovation and digital transformation.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="premium-card p-8">
                        <h4 class="text-2xl font-bold text-gray-900 mb-8 text-center">5-Year Impact Projection</h4>

                        <div class="space-y-6">
                            <div class="flex items-center justify-between p-4 bg-purple-50 rounded-xl">
                                <span class="text-gray-900 font-semibold">Lives Saved</span>
                                <span class="text-2xl font-bold text-purple-600">425,000+</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                                <span class="text-gray-900 font-semibold">Healthcare Savings</span>
                                <span class="text-2xl font-bold text-blue-600">৳8.2B</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                                <span class="text-gray-900 font-semibold">GDP Contribution</span>
                                <span class="text-2xl font-bold text-green-600">৳15.6B</span>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-orange-50 rounded-xl">
                                <span class="text-gray-900 font-semibold">Rural Coverage</span>
                                <span class="text-2xl font-bold text-orange-600">95%</span>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-xl mt-6 text-center">
                            <h5 class="text-lg font-bold text-gray-900 mb-2">ROI for Government</h5>
                            <div class="text-3xl font-black text-purple-600">320%</div>
                            <p class="text-sm text-gray-600">Return on investment over 5 years</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center">
                <div class="premium-card p-8 max-w-4xl mx-auto">
                    <img src="{{ asset('images/icons/partnership-1.png') }}" alt="Partnership Icon" class="w-16 h-16 mx-auto mb-6">
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Ready to Transform Bangladesh's Healthcare?</h3>
                    <p class="text-xl text-gray-700 mb-8">Join us in creating a healthier, more prosperous Bangladesh through strategic healthcare innovation.</p>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center">
                        <button class="btn-primary text-xl px-12 py-4">
                            Schedule Government Meeting
                            <div class="w-5 h-5 ml-3 bg-white rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/icons/meeting-icon.png') }}" alt="Meeting Icon" class="w-3 h-3">
                            </div>
                        </button>
                        <button class="btn-outline text-xl px-12 py-4">
                            Download Proposal
                            <div class="w-5 h-5 ml-3 bg-blue-500 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/icons/download-icon.png') }}" alt="Download Icon" class="w-3 h-3">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Global Vision Section - Advanced Design -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-gradient mb-6">Our Global Vision</h2>
                <p class="section-subtitle text-gray-600">A comprehensive roadmap to revolutionize healthcare accessibility worldwide</p>
            </div>

            <!-- Vision Overview - Horizontal Layout -->
            <div class="premium-card p-8 mb-16">
                <div class="grid lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <img src="{{ asset('images/icons/foundation-phase-1.png') }}" alt="Foundation Phase Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Foundation Phase</h3>
                        <p class="text-gray-600 mb-4">2024-2025</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div>• Deploy 100 AI diagnostic units</div>
                            <div>• Train 5,000 healthcare workers</div>
                            <div>• Establish telemedicine network</div>
                            <div>• Serve 1 million patients</div>
                        </div>
                        <div class="mt-4 bg-blue-50 p-3 rounded-lg">
                            <div class="text-lg font-bold text-blue-600">Target: 50 Districts</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('images/icons/expansion-phase-2.png') }}" alt="Expansion Phase Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">National Expansion</h3>
                        <p class="text-gray-600 mb-4">2026-2027</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div>• Complete national coverage</div>
                            <div>• Launch AI surgery assistance</div>
                            <div>• Implement predictive analytics</div>
                            <div>• Serve 10 million patients</div>
                        </div>
                        <div class="mt-4 bg-purple-50 p-3 rounded-lg">
                            <div class="text-lg font-bold text-purple-600">Target: 100% Coverage</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('images/icons/regional-phase-3.png') }}" alt="Regional Phase Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Regional Leadership</h3>
                        <p class="text-gray-600 mb-4">2028-2029</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div>• Expand to 5 South Asian countries</div>
                            <div>• Establish research partnerships</div>
                            <div>• Launch medical tourism</div>
                            <div>• Serve 50 million patients</div>
                        </div>
                        <div class="mt-4 bg-green-50 p-3 rounded-lg">
                            <div class="text-lg font-bold text-green-600">Target: Regional Hub</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <img src="{{ asset('images/icons/global-phase-4.png') }}" alt="Global Phase Icon" class="w-16 h-16 mx-auto mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Global Impact</h3>
                        <p class="text-gray-600 mb-4">2030+</p>
                        <div class="space-y-2 text-sm text-gray-700">
                            <div>• Operate in 50+ countries</div>
                            <div>• Achieve universal healthcare access</div>
                            <div>• Lead WHO initiatives</div>
                            <div>• Serve 1 billion patients</div>
                        </div>
                        <div class="mt-4 bg-orange-50 p-3 rounded-lg">
                            <div class="text-lg font-bold text-orange-600">Target: Global Standard</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Meet Our Leadership Team -->
            <div class="text-center mb-12">
                <h3 class="text-4xl font-bold text-gray-900 mb-6">Meet Our Leadership Team</h3>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Visionary leaders driving healthcare innovation and transformation across Bangladesh and beyond</p>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-4 gap-8">
                <!-- Mr. Masum Howlader -->
                <div class="premium-card p-6 text-center hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/team/masum-howlader.jpg') }}" alt="Mr. Masum Howlader" class="w-32 h-32 rounded-full mx-auto object-cover shadow-xl">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/icons/professor-badge.png') }}" alt="Professor Badge" class="w-5 h-5">
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Mr. Masum Howlader</h4>
                    <p class="text-blue-600 font-semibold mb-3">Assistant Professor, UAP EEE</p>
                    <p class="text-gray-600 text-sm mb-4">Leading expert in electrical engineering and healthcare technology innovation with extensive research in medical device development.</p>
                    <div class="space-y-2 text-xs text-gray-700">
                        <div>• Master in Electrical Engineering</div>
                        <div>• 15+ years in medical technology</div>
                        <div>• 50+ published research papers</div>
                    </div>
                </div>

                <!-- Mahir Shariar Mahin -->
                <div class="premium-card p-6 text-center hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/team/mahir-shariar-mahin.jpg') }}" alt="Mahir Shariar Mahin" class="w-32 h-32 rounded-full mx-auto object-cover shadow-xl">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/icons/researcher-badge.png') }}" alt="Engineer Badge" class="w-5 h-5">
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Mahir Shariar Mahin</h4>
                    <p class="text-purple-600 font-semibold mb-3">Engineer-Researcher</p>
                    <p class="text-gray-600 text-sm mb-4">Specialist in real-time problem solving, AI implementation, and business strategy for healthcare technology solutions.</p>
                    <div class="space-y-2 text-xs text-gray-700">
                        <div>• AI & Machine Learning Expert</div>
                        <div>• Real-time Data Processing</div>
                        <div>• Healthcare Business Strategy</div>
                    </div>
                </div>

                <!-- Rayhan Mahmud -->
                <div class="premium-card p-6 text-center hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/team/rayhan-mahmud.jpg') }}" alt="Rayhan Mahmud" class="w-32 h-32 rounded-full mx-auto object-cover shadow-xl">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/icons/engineer-badge.png') }}" alt="Researcher Badge" class="w-5 h-5">
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Rayhan Mahmud</h4>
                    <p class="text-green-600 font-semibold mb-3">Engineer-Researcher</p>
                    <p class="text-gray-600 text-sm mb-4">Expert in real-time problem solving, AI systems, data analytics, and healthcare business development.</p>
                    <div class="space-y-2 text-xs text-gray-700">
                        <div>• Data Analytics & AI</div>
                        <div>• Healthcare System Design</div>
                        <div>• Business Development</div>
                    </div>
                </div>

                <!-- Avijeet Sarker -->
                <div class="premium-card p-6 text-center hover-lift-strong">
                    <div class="relative mb-6">
                        <img src="{{ asset('images/team/abhijet-sarker.jpg') }}" alt="Abhijet Sarker" class="w-32 h-32 rounded-full mx-auto object-cover shadow-xl">
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/icons/hardware-badge.png') }}" alt="Hardware Badge" class="w-5 h-5">
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Avijeet Sarker</h4>
                    <p class="text-orange-600 font-semibold mb-3">Engineer-Researcher</p>
                    <p class="text-gray-600 text-sm mb-4">Hardware specialist focusing on BOT development, IoT devices, and medical equipment engineering for rural healthcare.</p>
                    <div class="space-y-2 text-xs text-gray-700">
                        <div>• Hardware Engineering</div>
                        <div>• IoT & BOT Development</div>
                        <div>• Medical Device Design</div>
                    </div>
                </div>
            </div>

            <!-- Why Choose Shifa Section -->
            <div class="mt-16">
                <div class="premium-card p-8">
                    <h3 class="text-4xl font-bold text-gray-900 text-center mb-12">Why Choose Shifa Healthcare?</h3>

                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="text-center">
                            <img src="{{ asset('images/icons/expert-care-1.png') }}" alt="Expert Care Icon" class="w-16 h-16 mx-auto mb-4">
                            <h4 class="text-xl font-bold text-gray-900 mb-3">Expert Care</h4>
                            <p class="text-gray-600">Board-certified specialists with years of experience in their respective fields.</p>
                        </div>

                        <div class="text-center">
                            <img src="{{ asset('images/icons/advanced-tech-2.png') }}" alt="Advanced Technology Icon" class="w-16 h-16 mx-auto mb-4">
                            <h4 class="text-xl font-bold text-gray-900 mb-3">Advanced Technology</h4>
                            <p class="text-gray-600">State-of-the-art AI-powered diagnostic tools and treatment equipment.</p>
                        </div>

                        <div class="text-center">
                            <img src="{{ asset('images/icons/24-7-availability-3.png') }}" alt="24/7 Availability Icon" class="w-16 h-16 mx-auto mb-4">
                            <h4 class="text-xl font-bold text-gray-900 mb-3">24/7 Availability</h4>
                            <p class="text-gray-600">Round-the-clock emergency services and telemedicine consultations.</p>
                        </div>

                        <div class="text-center">
                            <img src="{{ asset('images/icons/compassionate-care-4.png') }}" alt="Compassionate Care Icon" class="w-16 h-16 mx-auto mb-4">
                            <h4 class="text-xl font-bold text-gray-900 mb-3">Compassionate Care</h4>
                            <p class="text-gray-600">Patient-centered approach with personalized treatment plans and support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-24 bg-gradient-to-br from-purple-100 via-blue-100 to-purple-50">
        <div class="container mx-auto px-6">
            <div class="text-center" x-data="newsletter">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Stay Connected with Shifa</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto">Get the latest healthcare insights, medical breakthroughs, and wellness tips delivered to your inbox.</p>

                <div class="max-w-2xl mx-auto">
                    <div x-show="!subscribed" class="flex flex-col sm:flex-row gap-4">
                        <input type="email"
                               x-model="email"
                               class="flex-1 px-8 py-4 rounded-2xl bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 text-lg border border-gray-200 shadow-lg"
                               placeholder="Enter your email address">
                        <button @click="subscribe"
                                class="btn-newsletter text-lg px-8 py-4"
                                :disabled="loading"
                                :class="{ 'opacity-50 cursor-not-allowed': loading }">
                            <span x-show="!loading">Subscribe</span>
                            <span x-show="loading" class="flex items-center">
                                <div class="animate-spin w-5 h-5 border-2 border-white border-t-transparent rounded-full mr-3"></div>
                                Subscribing...
                            </span>
                        </button>
                    </div>

                    <div x-show="subscribed" x-transition class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex items-center justify-center mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Thank You!</h3>
                        <p class="text-gray-600">You've successfully subscribed to our newsletter. Welcome to the Shifa community!</p>
                    </div>
                </div>

                <p class="text-sm text-gray-600 mt-6">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>
</div>
@endsection
