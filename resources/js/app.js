// Enhanced Alpine.js Data Components with Premium Features
document.addEventListener('alpine:init', () => {
    // Enhanced Main app component with advanced features
    Alpine.data('app', () => ({
        mobileMenuOpen: false,
        scrolled: false,
        videoPlaying: true,
        videoMuted: true,
        darkMode: false,
        isLoading: false,

        init() {
            this.handleScroll();
            window.addEventListener('scroll', this.debounce(() => this.handleScroll(), 100));
            this.initSmoothScroll();
            this.initDynamicTextColor();
            this.initVideoControls();
            this.initScrollAnimations();
            this.initIntersectionObserver();
            this.initPerformanceMonitoring();
            this.initAccessibility();
        },

        handleScroll() {
            this.scrolled = window.pageYOffset > 50;
        },

        initSmoothScroll() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = anchor.getAttribute('href');
                    const target = document.querySelector(targetId);
                    if (target) {
                        const headerHeight = document.querySelector('.header-container')?.offsetHeight || 0;
                        this.scrollToElement(targetId, headerHeight + 20);
                        this.closeMobileMenu();
                    }
                });
            });
        },

        initVideoControls() {
            const video = document.querySelector('.hero-video');
            if (video) {
                video.addEventListener('loadeddata', () => {
                    video.play().catch(e => {
                        console.log('Video autoplay prevented by browser policy');
                        this.videoPlaying = false;
                    });
                });

                // Add intersection observer for video performance
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            video.play().catch(() => {});
                        } else {
                            video.pause();
                        }
                    });
                }, { threshold: 0.5 });

                observer.observe(video);
            }
        },

        toggleVideo() {
            const video = document.querySelector('.hero-video');
            if (video) {
                if (this.videoPlaying) {
                    video.pause();
                    this.videoPlaying = false;
                } else {
                    video.play().catch(() => {});
                    this.videoPlaying = true;
                }
            }
        },

        toggleMute() {
            const video = document.querySelector('.hero-video');
            if (video) {
                video.muted = !video.muted;
                this.videoMuted = video.muted;

                // Show visual feedback
                this.showNotification(
                    video.muted ? 'Video muted' : 'Video unmuted',
                    'info',
                    2000
                );
            }
        },

        initDynamicTextColor() {
            // Enhanced dynamic text color adaptation for better visibility
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const container = entry.target;
                        const video = container.querySelector('video');
                        const img = container.querySelector('img');

                        if (video || img) {
                            this.adaptTextColor(container, video || img);
                        }
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -10% 0px' });

            document.querySelectorAll('[data-dynamic-text]').forEach(container => {
                observer.observe(container);
            });
        },

        initScrollAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animate-fade-in-up');

                            // Add stagger effect for child elements
                            const children = entry.target.querySelectorAll('.feature-item-premium, .premium-card > *');
                            children.forEach((child, childIndex) => {
                                setTimeout(() => {
                                    child.style.opacity = '1';
                                    child.style.transform = 'translateY(0)';
                                }, childIndex * 100);
                            });
                        }, index * 150);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.premium-card, .device-card-premium, .emergency-card-premium, .moving-card, .timeline-phase').forEach(el => {
                observer.observe(el);

                // Set initial state for stagger animation
                const children = el.querySelectorAll('.feature-item-premium, .premium-card > *');
                children.forEach(child => {
                    child.style.opacity = '0';
                    child.style.transform = 'translateY(20px)';
                    child.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                });
            });
        },

        initIntersectionObserver() {
            // Enhanced intersection observer for better performance and user experience
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');

                        // Trigger any media elements to start
                        const videos = entry.target.querySelectorAll('video[data-autoplay]');
                        videos.forEach(video => {
                            video.play().catch(() => {});
                        });
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -20% 0px'
            });

            // Observe all premium elements
            document.querySelectorAll('.premium-card, .device-card-premium, .emergency-card-premium').forEach(el => {
                observer.observe(el);
            });
        },

        initPerformanceMonitoring() {
            // Monitor and optimize performance
            if ('performance' in window && 'PerformanceObserver' in window) {
                try {
                    const observer = new PerformanceObserver((list) => {
                        list.getEntries().forEach(entry => {
                            if (entry.entryType === 'largest-contentful-paint') {
                                console.log('LCP:', entry.startTime);
                            }
                        });
                    });

                    observer.observe({ entryTypes: ['largest-contentful-paint'] });
                } catch (e) {
                    console.log('Performance monitoring not supported');
                }
            }
        },

        initAccessibility() {
            // Enhanced accessibility features
            document.addEventListener('keydown', (e) => {
                // Escape key handling
                if (e.key === 'Escape') {
                    this.closeMobileMenu();

                    // Close any open modals or dropdowns
                    const openModals = document.querySelectorAll('.modal.open, .dropdown.open');
                    openModals.forEach(modal => {
                        modal.classList.remove('open');
                    });
                }

                // Tab navigation enhancement
                if (e.key === 'Tab') {
                    document.body.classList.add('keyboard-navigation');
                }
            });

            // Remove keyboard navigation class on mouse use
            document.addEventListener('mousedown', () => {
                document.body.classList.remove('keyboard-navigation');
            });

            // Add skip links functionality
            const skipLink = document.querySelector('.skip-link');
            if (skipLink) {
                skipLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = document.querySelector(skipLink.getAttribute('href'));
                    if (target) {
                        target.focus();
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }
        },

        adaptTextColor(container, media) {
            if (!media) return;

            const processMedia = () => {
                try {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = 100;
                    canvas.height = 100;

                    // Handle video frames
                    if (media.tagName === 'VIDEO') {
                        // Wait for video to have data
                        if (media.readyState < 2) {
                            media.addEventListener('loadeddata', processMedia, { once: true });
                            return;
                        }
                    }

                    ctx.drawImage(media, 0, 0, 100, 100);
                    const imageData = ctx.getImageData(0, 0, 100, 100);
                    const data = imageData.data;

                    let brightness = 0;
                    let totalPixels = 0;

                    // Sample pixels for brightness calculation
                    for (let i = 0; i < data.length; i += 16) {
                        const r = data[i];
                        const g = data[i + 1];
                        const b = data[i + 2];
                        const alpha = data[i + 3];

                        if (alpha > 128) {
                            brightness += (r * 0.299 + g * 0.587 + b * 0.114);
                            totalPixels++;
                        }
                    }

                    if (totalPixels > 0) {
                        brightness = brightness / totalPixels;

                        // Apply dynamic text color based on background brightness
                        const textElements = container.querySelectorAll('[data-overlay-text] *');
                        textElements.forEach(textEl => {
                            if (brightness > 140) {
                                textEl.classList.add('dynamic-text-dark');
                                textEl.classList.remove('dynamic-text-light');
                            } else {
                                textEl.classList.add('dynamic-text-light');
                                textEl.classList.remove('dynamic-text-dark');
                            }
                        });
                    }
                } catch (error) {
                    console.warn('Could not analyze media color:', error);
                    // Fallback to light text for safety
                    const textElements = container.querySelectorAll('[data-overlay-text] *');
                    textElements.forEach(textEl => {
                        textEl.classList.add('dynamic-text-light');
                    });
                }
            };

            // Process immediately if media is ready
            if (media.complete || media.readyState >= 2) {
                processMedia();
            } else {
                media.addEventListener('load', processMedia, { once: true });
                media.addEventListener('loadeddata', processMedia, { once: true });
            }
        },

        showNotification(message, type = 'info', duration = 5000) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

            const bgColor = {
                'success': 'bg-green-500',
                'error': 'bg-red-500',
                'warning': 'bg-yellow-500',
                'info': 'bg-blue-500'
            }[type] || 'bg-blue-500';

            notification.classList.add(bgColor);

            notification.innerHTML = `
                <div class="flex items-center justify-between text-white">
                    <p class="text-sm font-medium pr-4">${message}</p>
                    <button onclick="this.parentElement.parentElement.remove()"
                            class="text-white hover:text-gray-200 ml-4 flex-shrink-0 focus:outline-none">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, duration);
        },

        debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        throttle(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },

        closeMobileMenu() {
            this.mobileMenuOpen = false;
        },

        scrollToElement(selector, offset = 0) {
            const element = document.querySelector(selector);
            if (element) {
                const elementPosition = element.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }
    }));

    // Enhanced Newsletter component with validation and user feedback
    Alpine.data('newsletter', () => ({
        email: '',
        loading: false,
        subscribed: false,
        errors: {},

        async subscribe() {
            this.errors = {};

            if (!this.email || !this.isValidEmail(this.email)) {
                this.errors.email = 'Please enter a valid email address';
                this.showNotification('Please enter a valid email address', 'warning');
                return;
            }

            this.loading = true;
            try {
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1500));

                const subscribers = this.getStorage('newsletter_subscribers', []);
                if (subscribers.includes(this.email)) {
                    this.showNotification('You are already subscribed to our newsletter', 'info');
                    this.subscribed = true;
                } else {
                    subscribers.push(this.email);
                    this.setStorage('newsletter_subscribers', subscribers);
                    this.subscribed = true;
                    this.showNotification('Welcome to Shifa! You\'ve successfully subscribed to our newsletter.', 'success');
                }

                this.email = '';
            } catch (error) {
                console.error('Newsletter subscription error:', error);
                this.showNotification('Failed to subscribe. Please try again.', 'error');
            } finally {
                this.loading = false;
            }
        },

        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        showNotification(message, type = 'info') {
            window.dispatchEvent(new CustomEvent('show-notification', {
                detail: { message, type }
            }));
        },

        getStorage(key, defaultValue = null) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : defaultValue;
            } catch (error) {
                return defaultValue;
            }
        },

        setStorage(key, value) {
            try {
                localStorage.setItem(key, JSON.stringify(value));
                return true;
            } catch (error) {
                return false;
            }
        }
    }));

    // Enhanced Statistics Counter with smooth animations
    Alpine.data('statsCounter', () => ({
        stats: [
            { label: 'Patients Served', value: 0, target: 10000, suffix: '+', prefix: '', duration: 2000 },
            { label: 'Healthcare Providers', value: 0, target: 500, suffix: '+', prefix: '', duration: 1800 },
            { label: 'Rural Areas Covered', value: 0, target: 150, suffix: '+', prefix: '', duration: 1600 },
            { label: 'Success Rate', value: 0, target: 98, suffix: '%', prefix: '', duration: 2200 }
        ],
        animated: false,

        init() {
            this.observeStats();
        },

        observeStats() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.animated) {
                        this.animateStats();
                        this.animated = true;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(this.$el);
        },

        animateStats() {
            this.stats.forEach((stat, index) => {
                setTimeout(() => {
                    this.animateValue(index, 0, stat.target, stat.duration);
                }, index * 200);
            });
        },

        animateValue(index, start, end, duration) {
            const startTime = performance.now();
            const animate = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Easing function for smooth animation
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);

                this.stats[index].value = Math.floor(start + (end - start) * easeOutCubic);

                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    this.stats[index].value = end;
                }
            };
            requestAnimationFrame(animate);
        }
    }));

    // Enhanced Stories Carousel Component
    Alpine.data('storiesCarousel', () => ({
        currentVideoIndex: 0,
        currentPhotoIndex: 0,
        videoStories: [
            {
                title: "Rural Community Transformation",
                description: "How Shifa's telemedicine brought specialist care to remote villages in Rangpur",
                video: "rural-transformation.mp4",
                thumbnail: "rural-transformation-thumb.jpg"
            },
            {
                title: "Emergency Response Success",
                description: "Life-saving emergency response in critical situations using AI diagnostics",
                video: "emergency-response.mp4",
                thumbnail: "emergency-response-thumb.jpg"
            },
            {
                title: "Maternal Health Journey",
                description: "Supporting mothers through pregnancy and childbirth with advanced monitoring",
                video: "maternal-health.mp4",
                thumbnail: "maternal-health-thumb.jpg"
            }
        ],
        photoStories: [
            {
                title: "Community Health Fair",
                story: "Bringing free health checkups and awareness to rural communities",
                photo: "community-health-fair.jpg"
            },
            {
                title: "Children's Vaccination Drive",
                story: "Ensuring every child receives essential vaccines for a healthy future",
                photo: "vaccination-drive.jpg"
            },
            {
                title: "Medical Training Program",
                story: "Training local healthcare workers to serve their communities better",
                photo: "training-program.jpg"
            },
            {
                title: "Technology in Action",
                story: "AI-powered diagnostics providing instant health assessments",
                photo: "technology-action.jpg"
            },
            {
                title: "Family Care Success",
                story: "Comprehensive family healthcare improving quality of life",
                photo: "family-care.jpg"
            }
        ],

        init() {
            // Auto-advance photo stories every 4 seconds
            setInterval(() => {
                this.nextPhoto();
            }, 4000);
        },

        selectVideo(index) {
            this.currentVideoIndex = index;
        },

        nextPhoto() {
            this.currentPhotoIndex = (this.currentPhotoIndex + 1) % this.photoStories.length;
        },

        previousPhoto() {
            this.currentPhotoIndex = this.currentPhotoIndex === 0
                ? this.photoStories.length - 1
                : this.currentPhotoIndex - 1;
        }
    }));

    // Enhanced Health Monitoring Carousel
    Alpine.data('healthMonitoringFixed', () => ({
        currentSlide: 0,
        totalSlides: [0, 1, 2, 3, 4],
        autoPlayInterval: null,
        isPlaying: true,

        init() {
            this.startAutoPlay();
            this.setupKeyboardNavigation();
        },

        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides.length;
        },

        previousSlide() {
            this.currentSlide = this.currentSlide === 0 ? this.totalSlides.length - 1 : this.currentSlide - 1;
        },

        goToSlide(index) {
            this.currentSlide = index;
            this.resetAutoPlay();
        },

        startAutoPlay() {
            this.autoPlayInterval = setInterval(() => {
                if (this.isPlaying) {
                    this.nextSlide();
                }
            }, 5000);
        },

        stopAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.isPlaying = false;
            }
        },

        resetAutoPlay() {
            this.stopAutoPlay();
            this.startAutoPlay();
            this.isPlaying = true;
        },

        setupKeyboardNavigation() {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    this.previousSlide();
                    this.resetAutoPlay();
                } else if (e.key === 'ArrowRight') {
                    this.nextSlide();
                    this.resetAutoPlay();
                }
            });
        },

        destroy() {
            this.stopAutoPlay();
        }
    }));
});

// Enhanced initialization when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log('🏥 Shifa Healthcare - Enhanced Application Loaded');

    // Enhanced global notification system
    window.addEventListener('show-notification', (e) => {
        const { message, type } = e.detail;
        showGlobalNotification(message, type);
    });

    // Enhanced intersection observer for animations with performance optimization
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-fade-in-up');
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -10% 0px'
        });

        document.querySelectorAll('.premium-card, .device-card-premium, .emergency-card-premium, .moving-card, .timeline-phase').forEach(el => {
            observer.observe(el);
        });
    }

    // Enhanced smooth scrolling with better performance
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 20;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Enhanced performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', () => {
            const loadTime = performance.now();
            console.log('📊 Page load time:', Math.round(loadTime) + 'ms');

            // Report performance metrics
            if (loadTime > 3000) {
                console.warn('⚠️ Page load time is above optimal threshold');
            }
        });
    }

    // Enhanced error handling with user feedback
    window.addEventListener('error', (e) => {
        console.error('JavaScript error:', e.error);

        // Only show user-facing errors for critical issues
        if (e.error && e.error.message.includes('critical')) {
            showGlobalNotification('Something went wrong. Please refresh the page.', 'error');
        }
    });

    // Enhanced accessibility features
    initializeAccessibility();

    // Initialize lazy loading for better performance
    initializeLazyLoading();

    // Initialize service worker for progressive web app features
    initializeServiceWorker();

    // Initialize Google Maps
    initializeGoogleMaps();
});

// Google Maps Integration
function initializeGoogleMaps() {
    // This function will be called when Google Maps API is loaded
    window.initMap = function() {
        const mapOptions = {
            center: { lat: 23.8103, lng: 90.4125 }, // Dhaka, Bangladesh
            zoom: 12,
            styles: [
                {
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [{"weight": "2.00"}]
                },
                {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#9c9c9c"}]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [{"visibility": "on"}]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{"color": "#f2f2f2"}]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{"saturation": -100}, {"lightness": 45}]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#eeeeee"}]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#7b7b7b"}]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [{"color": "#ffffff"}]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{"visibility": "simplified"}]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#c8d7d4"}]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#070707"}]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [{"color": "#ffffff"}]
                }
            ]
        };

        const map = new google.maps.Map(document.getElementById('ambulance-map'), mapOptions);

        // Sample ambulance locations
        const ambulanceLocations = [
            { lat: 23.8103, lng: 90.4125, status: 'available', id: 'AMB001' },
            { lat: 23.7805, lng: 90.4258, status: 'busy', id: 'AMB002' },
            { lat: 23.8223, lng: 90.3654, status: 'available', id: 'AMB003' },
            { lat: 23.7956, lng: 90.4078, status: 'emergency', id: 'AMB004' },
            { lat: 23.8456, lng: 90.3987, status: 'available', id: 'AMB005' },
            { lat: 23.7689, lng: 90.4356, status: 'busy', id: 'AMB006' },
            { lat: 23.8567, lng: 90.3789, status: 'available', id: 'AMB007' },
            { lat: 23.7834, lng: 90.4456, status: 'available', id: 'AMB008' }
        ];

        // Add ambulance markers
        ambulanceLocations.forEach(location => {
            const marker = new google.maps.Marker({
                position: { lat: location.lat, lng: location.lng },
                map: map,
                title: `Ambulance ${location.id} - ${location.status}`,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 15,
                    fillColor: getAmbulanceColor(location.status),
                    fillOpacity: 1,
                    strokeColor: '#ffffff',
                    strokeWeight: 4
                }
            });

            // Add info window
            const infoWindow = new google.maps.InfoWindow({
                content: `
                    <div class="p-3">
                        <h4 class="font-bold text-gray-800 mb-2">Ambulance ${location.id}</h4>
                        <p class="text-sm text-gray-600 mb-2">Status: <span class="font-semibold ${getStatusClass(location.status)}">${location.status.toUpperCase()}</span></p>
                        <button class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-lg text-sm hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                            Request Ambulance
                        </button>
                    </div>
                `
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });

            // Add pulsing animation for emergency ambulances
            if (location.status === 'emergency') {
                const pulseMarker = new google.maps.Marker({
                    position: { lat: location.lat, lng: location.lng },
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 25,
                        fillColor: getAmbulanceColor(location.status),
                        fillOpacity: 0.2,
                        strokeColor: getAmbulanceColor(location.status),
                        strokeWeight: 2,
                        strokeOpacity: 0.5
                    },
                    zIndex: 1
                });

                // Animate the pulse
                let scale = 25;
                let growing = false;
                setInterval(() => {
                    if (growing) {
                        scale += 2;
                        if (scale >= 35) growing = false;
                    } else {
                        scale -= 2;
                        if (scale <= 25) growing = true;
                    }

                    pulseMarker.setIcon({
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: scale,
                        fillColor: getAmbulanceColor(location.status),
                        fillOpacity: 0.2 - (scale - 25) * 0.01,
                        strokeColor: getAmbulanceColor(location.status),
                        strokeWeight: 2,
                        strokeOpacity: 0.5 - (scale - 25) * 0.02
                    });
                }, 100);
            }
        });

        // Add map controls
        const filterButtons = document.querySelectorAll('.map-filter-btn');
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Filter logic
                const filter = button.dataset.filter;
                ambulanceLocations.forEach((location, index) => {
                    const marker = markers[index];
                    if (filter === 'all' || location.status === filter) {
                        marker.setVisible(true);
                    } else {
                        marker.setVisible(false);
                    }
                });
            });
        });

        // Real-time updates simulation
        setInterval(() => {
            // Simulate ambulance status changes
            const randomIndex = Math.floor(Math.random() * ambulanceLocations.length);
            const statuses = ['available', 'busy', 'emergency'];
            const newStatus = statuses[Math.floor(Math.random() * statuses.length)];

            ambulanceLocations[randomIndex].status = newStatus;

            // Update marker color
            const marker = markers[randomIndex];
            marker.setIcon({
                path: google.maps.SymbolPath.CIRCLE,
                scale: 15,
                fillColor: getAmbulanceColor(newStatus),
                fillOpacity: 1,
                strokeColor: '#ffffff',
                strokeWeight: 4
            });
        }, 30000); // Update every 30 seconds
    };

    // Load Google Maps API with your API key
    if (!window.google) {
        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=${window.googleMapsApiKey || 'YOUR_API_KEY'}&callback=initMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);

        script.onerror = () => {
            console.warn('Google Maps API failed to load. Using fallback map.');
            // Fallback to a static map or alternative
            const mapContainer = document.getElementById('ambulance-map');
            if (mapContainer) {
                mapContainer.innerHTML = `
                    <div class="flex items-center justify-center h-full bg-gray-100 rounded-xl">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="text-gray-600">Interactive map will be available soon</p>
                            <p class="text-sm text-gray-500 mt-2">Real-time ambulance tracking coming online</p>
                        </div>
                    </div>
                `;
            }
        };
    }
}

function getAmbulanceColor(status) {
    switch (status) {
        case 'available': return '#10b981';
        case 'busy': return '#f59e0b';
        case 'emergency': return '#ef4444';
        default: return '#6b7280';
    }
}

function getStatusClass(status) {
    switch (status) {
        case 'available': return 'text-green-600';
        case 'busy': return 'text-yellow-600';
        case 'emergency': return 'text-red-600';
        default: return 'text-gray-600';
    }
}

// Enhanced accessibility initialization
function initializeAccessibility() {
    // Enhanced skip link functionality
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(skipLink.getAttribute('href'));
            if (target) {
                target.focus();
                target.scrollIntoView();
            }
        });
    }

    // Enhanced keyboard navigation
    document.querySelectorAll('[role="button"]').forEach(button => {
        button.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                button.click();
            }
        });
    });

    // Enhanced modal and dropdown handling
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.modal.open, .dropdown.open');
            openModals.forEach(modal => {
                modal.classList.remove('open');
            });
        }
    });

    // Screen reader announcements
    const announcer = document.createElement('div');
    announcer.setAttribute('aria-live', 'polite');
    announcer.setAttribute('aria-atomic', 'true');
    announcer.className = 'sr-only';
    document.body.appendChild(announcer);

    window.announceToScreenReader = (message) => {
        announcer.textContent = message;
        setTimeout(() => announcer.textContent = '', 1000);
    };

    // Focus management for better keyboard navigation
    let lastFocusedElement = null;

    document.addEventListener('focusin', (e) => {
        lastFocusedElement = e.target;
    });

    window.returnFocus = () => {
        if (lastFocusedElement) {
            lastFocusedElement.focus();
        }
    };
}

// Initialize lazy loading for images and videos
function initializeLazyLoading() {
    if ('IntersectionObserver' in window) {
        const lazyObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;

                    if (element.dataset.src) {
                        element.src = element.dataset.src;
                        element.removeAttribute('data-src');
                    }

                    if (element.dataset.srcset) {
                        element.srcset = element.dataset.srcset;
                        element.removeAttribute('data-srcset');
                    }

                    element.classList.remove('lazy');
                    lazyObserver.unobserve(element);
                }
            });
        }, {
            rootMargin: '50px 0px'
        });

        document.querySelectorAll('img[data-src], video[data-src]').forEach(element => {
            lazyObserver.observe(element);
        });
    }
}

// Initialize service worker for PWA features
function initializeServiceWorker() {
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => {
                    console.log('SW registered: ', registration);
                })
                .catch(registrationError => {
                    console.log('SW registration failed: ', registrationError);
                });
        });
    }
}

// Enhanced utility functions
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            timeout = null;
            if (!immediate) func(...args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func(...args);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Enhanced global notification system with better UX
function showGlobalNotification(message, type = 'info', duration = 5000) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 max-w-md p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full`;

    const bgColor = {
        'success': 'bg-green-500',
        'error': 'bg-red-500',
        'warning': 'bg-yellow-500',
        'info': 'bg-blue-500'
    }[type] || 'bg-blue-500';

    notification.classList.add(bgColor);

    const icon = {
        'success': '✓',
        'error': '✕',
        'warning': '⚠',
        'info': 'ℹ'
    }[type] || 'ℹ';

    notification.innerHTML = `
        <div class="flex items-center justify-between text-white">
            <div class="flex items-center">
                <span class="mr-3 text-lg">${icon}</span>
                <p class="text-sm font-medium">${message}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()"
                    class="text-white hover:text-gray-200 ml-4 flex-shrink-0 focus:outline-none focus:ring-2 focus:ring-white/50 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => notification.remove(), 300);
    }, duration);

    if (window.announceToScreenReader) {
        window.announceToScreenReader(message);
    }
}

// Enhanced export functions for global use
window.ShifaHealthcare = {
    debounce,
    throttle,
    initializeAccessibility,
    showGlobalNotification,
    initializeLazyLoading,
    version: '2.0.0'
};

// Performance optimization: Preload critical resources
function preloadCriticalResources() {
    const criticalImages = [
        '/images/hero-poster.jpg',
        '/images/devices/heartbeat-sanctuary-1.jpg',
        '/images/devices/guiding-light-1.jpg',
        '/images/devices/wings-freedom-1.jpg'
    ];

    criticalImages.forEach(imageSrc => {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = imageSrc;
        document.head.appendChild(link);
    });
}

// Initialize critical resource preloading
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', preloadCriticalResources);
} else {
    preloadCriticalResources();
}
