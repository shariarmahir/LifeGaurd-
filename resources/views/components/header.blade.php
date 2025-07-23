<!-- Top Header Bar -->
<div class="bg-blue-700 text-white py-2 hidden lg:block">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between text-sm">
            <!-- Left Side - Contact Info -->
            <div class="flex items-center space-x-4 sm:space-x-6">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-phone-alt text-xs"></i>
                    <span>Emergency: +880-1234-567890</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-envelope text-xs"></i>
                    <span>support@shieldmedical.bd</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-map-marker-alt text-xs"></i>
                    <span>Serving All Rural Areas of Bangladesh</span>
                </div>
            </div>

            <!-- Right Side - Social & Language -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <!-- Social Links -->
                <div class="flex items-center space-x-2">
                    <span class="text-xs">Follow Us:</span>
                    <a href="#" class="hover:text-blue-200 transition-colors duration-300" aria-label="Facebook">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition-colors duration-300" aria-label="Twitter">
                        <i class="fab fa-twitter text-xs"></i>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition-colors duration-300" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in text-xs"></i>
                    </a>
                    <a href="#" class="hover:text-blue-200 transition-colors duration-300" aria-label="YouTube">
                        <i class="fab fa-youtube text-xs"></i>
                    </a>
                </div>

                <!-- Language Selector -->
                <div class="relative" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        @click.away="open = false"
                        class="flex items-center space-x-1 hover:text-blue-200 transition-colors duration-300"
                        aria-haspopup="true"
                        :aria-expanded="open"
                    >
                        <i class="fas fa-globe text-xs"></i>
                        <span>EN</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute right-0 top-full mt-1 bg-white text-gray-900 shadow-lg rounded-md py-1 z-50 min-w-[80px]"
                        style="display: none;"
                    >
                        <a href="#" class="block px-3 py-1 text-xs hover:bg-gray-100 transition-colors duration-200">EN</a>
                        <a href="#" class="block px-3 py-1 text-xs hover:bg-gray-100 transition-colors duration-200">বাংলা</a>
                    </div>
                </div>

                <!-- Quick Access -->
                <div class="border-l border-blue-400 pl-3 sm:pl-4">
                    <a href="#" class="text-xs hover:text-blue-200 transition-colors duration-300">
                        <i class="fas fa-user-md mr-1"></i>
                        Doctor Portal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-lg sticky top-0 z-40 transition-all duration-300" x-data="globalData" :class="isScrolled ? 'shadow-xl' : 'shadow-lg'">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between py-3 sm:py-4">
            <!-- Logo -->
            <div class="flex items-center ml-4 sm:ml-6">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <!-- Logo Image -->
                    <img src="{{ asset('images/logo.png') }}" alt="LifeGuard+ Logo" class="h-12 sm:h-16 md:h-18 brightness-180 transition-all duration-300 transform group-hover:scale-110 group-hover:brightness-140">
                </a>
            </div>

            <!-- Desktop Search Bar -->
            <div class="hidden lg:flex flex-1 max-w-md mx-6 lg:mx-8">
                <div class="relative w-full" x-data="{ focused: false }">
                    <input
                        type="text"
                        placeholder="Search services, doctors, devices..."
                        @focus="focused = true"
                        @blur="focused = false"
                        class="w-full px-4 py-2 pl-10 pr-12 bg-gray-50 border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all duration-300"
                        :class="focused ? 'bg-white shadow-md' : ''"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-base"></i>
                    <button class="btn-standard w-8 h-8 absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full flex items-center justify-center hover:from-blue-700 hover:to-purple-700 transition-all duration-300">
                        <span class="text-sm font-medium">Go</span>
                    </button>
                </div>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <!-- Emergency Button -->
                <button class="hidden md:flex items-center space-x-2 bg-red-500 hover:bg-red-600 text-white px-3 sm:px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-exclamation-triangle text-sm animate-pulse"></i>
                    <span>Emergency</span>
                </button>

                <!-- Patient Portal -->
                <a href="#" class="hidden lg:flex items-center space-x-2 bg-blue-100 text-blue-700 px-3 sm:px-4 py-2 rounded-full text-sm font-medium hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white transition-all duration-300">
                    <i class="fas fa-user-injured text-sm"></i>
                    <span>Patient Portal</span>
                </a>

                <!-- Appointment Button -->
                <a href="#" class="hidden md:flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 sm:px-6 py-2 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-calendar-plus text-sm"></i>
                    <span>Book Appointment</span>
                </a>

                <!-- Mobile Search Toggle -->
                <button
                    @click="searchOpen = !searchOpen"
                    class="lg:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors duration-300"
                    aria-label="Toggle search"
                >
                    <i class="fas fa-search text-lg"></i>
                </button>

                <!-- Mobile Menu Toggle -->
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors duration-300"
                    aria-label="Toggle mobile menu"
                >
                    <div class="relative w-6 h-6">
                        <span class="absolute block w-6 h-0.5 bg-current transition-all duration-300 transform" :class="mobileMenuOpen ? 'rotate-45 top-3' : 'top-1'"></span>
                        <span class="absolute block w-6 h-0.5 bg-current transition-all duration-300 top-3" :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                        <span class="absolute block w-6 h-0.5 bg-current transition-all duration-300 transform" :class="mobileMenuOpen ? '-rotate-45 top-3' : 'top-5'"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Search Bar -->
        <div
            x-show="searchOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="lg:hidden pb-3 sm:pb-4"
            style="display: none;"
        >
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search services, doctors, devices..."
                    class="w-full px-4 py-3 pl-10 pr-12 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all duration-300"
                >
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white w-10 h-10 rounded-full flex items-center justify-center hover:from-blue-700 hover:to-purple-700 transition-colors duration-300 shadow-md">
                    <i class="fas fa-rocket text-base font-bold"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Access Bar -->
    <div class="border-t border-gray-100 bg-violet-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="hidden lg:flex items-center justify-between py-2 sm:py-3">
                <!-- Quick Services -->
                <div class="flex items-center space-x-4 sm:space-x-6">
                    <span class="text-sm text-gray-600 font-medium">Quick Access:</span>
                    <a href="#cardioguard" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-blue-600 transition-colors duration-300">
                        <i class="fas fa-heartbeat text-red-500"></i>
                        <span>CardioGuard</span>
                    </a>
                    <a href="#vision-guard" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-blue-600 transition-colors duration-300">
                        <i class="fas fa-eye text-blue-500"></i>
                        <span>Vision Guard</span>
                    </a>
                    <a href="#smart-wheelchair" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-blue-600 transition-colors duration-300">
                        <i class="fas fa-wheelchair text-green-500"></i>
                        <span>Smart Wheelchair</span>
                    </a>
                    <a href="#shifa-community" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-purple-600 transition-colors duration-300">
                        <i class="fas fa-users text-purple-500"></i>
                        <span>Shifa Community</span>
                    </a>
                </div>

                <!-- Service Status -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm text-gray-600">All Services Online</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-clock text-gray-400 text-sm"></i>
                        <span class="text-sm text-gray-600">24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
