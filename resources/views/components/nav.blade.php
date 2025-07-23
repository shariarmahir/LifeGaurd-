<!-- Desktop Navigation -->
<nav class="hidden lg:block bg-gradient-to-r from-blue-50 to-purple-50 border-t border-gray-100 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Main Navigation Menu -->
            <ul class="flex items-center space-x-8">
                <!-- Home -->
                <li>
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 py-4 text-gray-700 hover:text-blue-600 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-600 {{ request()->routeIs('home') ? 'text-blue-600 border-blue-600' : '' }}">
                        <i class="fas fa-home text-base"></i>
                        <span class="font-medium">Home</span>
                    </a>
                </li>

                <!-- Our Devices -->
                <li class="relative group">
                    <a href="#" class="flex items-center space-x-2 py-4 text-gray-700 hover:text-blue-600 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-600">
                        <i class="fas fa-microchip text-base"></i>
                        <span class="font-medium">Our Devices</span>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-300 group-hover:rotate-180"></i>
                    </a>

                    <!-- Devices Dropdown -->
                    <div class="absolute left-0 top-full w-80 bg-white shadow-xl rounded-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Medical Devices</h3>
                            <div class="space-y-3">
                                <a href="#cardioguard" class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-200">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-heartbeat text-red-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">CardioGuard</h4>
                                        <p class="text-sm text-gray-600">ECG, EMG, BPM, SpO2 monitoring with AI</p>
                                    </div>
                                </a>

                                <a href="#vision-guard" class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-200">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-eye text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Vision Guard Navigator</h4>
                                        <p class="text-sm text-gray-600">For blind & autistic individuals</p>
                                    </div>
                                </a>

                                <a href="#smart-wheelchair" class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-200">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-wheelchair text-green-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Smart Wheelchair</h4>
                                        <p class="text-sm text-gray-600">AI-powered mobility solution</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Services -->
                <li class="relative group">
                    <a href="#" class="flex items-center space-x-2 py-4 text-gray-700 hover:text-blue-600 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-600">
                        <i class="fas fa-stethoscope text-base"></i>
                        <span class="font-medium">Services</span>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-300 group-hover:rotate-180"></i>
                    </a>

                    <!-- Services Mega Menu -->
                    <div class="absolute left-0 top-full w-screen max-w-4xl bg-white shadow-xl rounded-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="p-8">
                            <div class="grid grid-cols-3 gap-8">
                                <!-- Healthcare Services -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-hospital text-blue-600 mr-2"></i>
                                        Healthcare Services
                                    </h3>
                                    <div class="space-y-2">
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Pregnancy Monitoring</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Blood Group Profiling</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Dialysis Management</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Diabetes Monitoring</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Health Dashboard</a>
                                    </div>
                                </div>

                                <!-- Emergency Services -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-ambulance text-red-500 mr-2"></i>
                                        Emergency Services
                                    </h3>
                                    <div class="space-y-2">
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Emergency Corner</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Ambulance Dispatch</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Speed Boat Service</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Emergency Team</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Critical Delivery</a>
                                    </div>
                                </div>

                                <!-- Medicine & Supplies -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-pills text-green-500 mr-2"></i>
                                        Medicine & Supplies
                                    </h3>
                                    <div class="space-y-2">
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Medicine Dashboard</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Medical Kits</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Diabetes Kit</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">First-Aid Guide</a>
                                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Import Medicines</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Featured Service -->
                            <div class="mt-8 pt-6 border-t border-gray-100">
                                <div class="bg-gradient-to-r from-blue-50 via-purple-50 to-blue-50 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="font-semibold text-gray-900">Shifa Community</h4>
                                            <p class="text-sm text-gray-600">Connect with doctors and patients in our special community</p>
                                        </div>
                                        <a href="#shifa-community" class="btn-standard w-32 h-10 rounded-full flex items-center justify-center">
                                            <span>Join Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- About -->
                <li>
                    <a href="#about" class="flex items-center space-x-2 py-4 text-gray-700 hover:text-blue-600 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-600">
                        <i class="fas fa-info-circle text-base"></i>
                        <span class="font-medium">About</span>
                    </a>
                </li>

                <!-- Contact -->
                <li>
                    <a href="#contact" class="flex items-center space-x-2 py-4 text-gray-700 hover:text-blue-600 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-600">
                        <i class="fas fa-phone text-base"></i>
                        <span class="font-medium">Contact</span>
                    </a>
                </li>
            </ul>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                <!-- Live Support -->
                <div class="flex items-center space-x-2 text-sm">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-gray-600">Live Support Available</span>
                </div>

                <!-- CTA Button -->
                <a href="#emergency" class="btn-standard w-32 h-10 rounded-full flex items-center justify-center space-x-2">
                    <i class="fas fa-heartbeat text-base animate-pulse"></i>
                    <span>Get Help Now</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Navigation -->
<nav
    class="lg:hidden fixed inset-x-0 top-0 bg-gradient-to-r from-blue-50 to-purple-50 shadow-xl z-50 transform transition-transform duration-300"
    :class="mobileMenuOpen ? 'translate-y-0' : '-translate-y-full'"
    x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-full"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-full"
    style="display: none;"
>
    <div class="h-screen overflow-y-auto">
        <!-- Mobile Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shield-alt text-white"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900">Shifa</h2>
                    <p class="text-xs text-gray-600">Medical Platform</p>
                </div>
            </div>
            <button @click="mobileMenuOpen = false" class="btn-social w-10 h-10 flex items-center justify-center rounded-full text-gray-600 hover:text-blue-600">
                <i class="fas fa-times text-base"></i>
            </button>
        </div>

        <!-- Mobile Menu Items -->
        <div class="p-4">
            <!-- Emergency Button -->
            <div class="mb-6">
                <a href="#emergency" class="btn-standard w-32 h-10 rounded-full flex items-center justify-center space-x-2">
                    <i class="fas fa-exclamation-triangle text-base animate-pulse"></i>
                    <span>Emergency Help</span>
                </a>
            </div>

            <!-- Main Menu -->
            <div class="space-y-2" x-data="{ openSubmenu: null }">
                <!-- Home -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-50 to-purple-50 text-blue-600' : 'text-gray-700' }} hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-home text-base w-6"></i>
                    <span class="font-medium">Home</span>
                </a>

                <!-- Our Devices -->
                <div>
                    <button
                        @click="openSubmenu = openSubmenu === 'devices' ? null : 'devices'"
                        class="w-full flex items-center justify-between p-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300"
                    >
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-microchip text-base w-6"></i>
                            <span class="font-medium">Our Devices</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-300" :class="openSubmenu === 'devices' ? 'rotate-180' : ''"></i>
                    </button>
                    <div
                        x-show="openSubmenu === 'devices'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="ml-6 mt-2 space-y-2"
                        style="display: none;"
                    >
                        <a href="#cardioguard" class="flex items-center space-x-3 p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-heartbeat text-red-500"></i>
                            <span>CardioGuard</span>
                        </a>
                        <a href="#vision-guard" class="flex items-center space-x-3 p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-eye text-blue-500"></i>
                            <span>Vision Guard Navigator</span>
                        </a>
                        <a href="#smart-wheelchair" class="flex items-center space-x-3 p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">
                            <i class="fas fa-wheelchair text-green-500"></i>
                            <span>Smart Wheelchair</span>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <button
                        @click="openSubmenu = openSubmenu === 'services' ? null : 'services'"
                        class="w-full flex items-center justify-between p-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300"
                    >
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-stethoscope text-base w-6"></i>
                            <span class="font-medium">Services</span>
                        </div>
                        <i class="fas fa-chevron-down transition-transform duration-300" :class="openSubmenu === 'services' ? 'rotate-180' : ''"></i>
                    </button>
                    <div
                        x-show="openSubmenu === 'services'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="ml-6 mt-2 space-y-2"
                        style="display: none;"
                    >
                        <a href="#" class="block p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Pregnancy Monitoring</a>
                        <a href="#" class="block p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Blood Group Profiling</a>
                        <a href="#" class="block p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Emergency Services</a>
                        <a href="#" class="block p-2 text-sm text-gray-600 hover:text-blue-600 transition-colors duration-200">Medicine Dashboard</a>
                        <a href="#shifa-community" class="block p-2 text-sm text-gray-600 hover:text-purple-600 transition-colors duration-200">Shifa Community</a>
                    </div>
                </div>

                <!-- About -->
                <a href="#about" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-info-circle text-base w-6"></i>
                    <span class="font-medium">About</span>
                </a>

                <!-- Contact -->
                <a href="#contact" class="flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:text-blue-600 transition-all duration-300">
                    <i class="fas fa-phone text-base w-6"></i>
                    <span class="font-medium">Contact</span>
                </a>
            </div>

            <!-- Mobile Actions -->
            <div class="mt-8 space-y-3">
                <a href="#" class="btn-standard w-32 h-10 rounded-full flex items-center justify-center space-x-2">
                    <i class="fas fa-calendar-plus text-base"></i>
                    <span>Book Appointment</span>
                </a>
                <a href="#" class="btn-standard w-32 h-10 rounded-full flex items-center justify-center space-x-2">
                    <i class="fas fa-user-injured text-base"></i>
                    <span>Patient Portal</span>
                </a>
            </div>

            <!-- Contact Info -->
            <div class="mt-8 pt-6 border-t border-gray-100">
                <h3 class="font-semibold text-gray-900 mb-3">Get in Touch</h3>
                <div class="space-y-2">
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-phone text-blue-600 text-base"></i>
                        <span>+880-1234-567890</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-envelope text-blue-600 text-base"></i>
                        <span>support@shifamedical.bd</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                        <i class="fas fa-clock text-blue-600 text-base"></i>
                        <span>24/7 Emergency Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div
    x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="mobileMenuOpen = false"
    class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
    style="display: none;"
></div>
