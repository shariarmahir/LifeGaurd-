/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/**/*.html",
  ],
  theme: {
    extend: {
      fontFamily: {
        'inter': ['Inter', 'sans-serif'],
        'vietnam': ['Be Vietnam Pro', 'sans-serif'],
        'hanken': ['Hanken Grotesk', 'sans-serif'],
      },
      colors: {
        'shifa-blue': '#2946cf',
        'shifa-red': '#f4594e',
        'soft-violet': '#97a3e6',
        'soft-green': '#6de7a1',
        'dark-blue': '#001888',
        'light-blue': '#3379cc',
        'light-green': '#57e59e',
        'sky': '#76b5ff',
        'studio': {
          'ai': '#F4594E',
          'blockchain': '#D348EA',
          'data': '#96C5FF',
          'firmware': '#FFB600',
          'platform': '#2946CF',
          'design': '#A248EA',
          'management': '#3379CC',
          'qa': '#00BD5F',
          'sre': '#0D5BFF',
        }
      },
      boxShadow: {
        '3xl': '0 35px 80px rgba(0, 0, 0, 0.25)',
        'premium': '0 25px 60px rgba(41, 70, 207, 0.15), 0 10px 30px rgba(0, 0, 0, 0.1)',
      },
      animation: {
        'float': 'float 6s ease-in-out infinite',
        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
        'scroll-down': 'scrollDown 2s infinite',
        'pulse-glow': 'pulse-glow 3s ease-in-out infinite',
        'slide-in-right': 'slide-in-right 0.6s ease-out forwards',
        'bounce-gentle': 'bounce-gentle 2s infinite',
        'scroll': 'scroll 60s linear infinite',
        'scroll-right': 'scrollRight 60s linear infinite',
        'scroll-left': 'scrollLeft 60s linear infinite',
        'scroll-right-slow': 'scrollRightSlow 90s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-20px)' }
        },
        fadeInUp: {
          'from': { opacity: '0', transform: 'translateY(40px)' },
          'to': { opacity: '1', transform: 'translateY(0)' }
        },
        scrollDown: {
          '0%, 20%': { transform: 'translateY(0)', opacity: '0' },
          '50%': { opacity: '1' },
          '80%, 100%': { transform: 'translateY(15px)', opacity: '0' }
        },
        'pulse-glow': {
          '0%, 100%': { opacity: '0.8', transform: 'scale(1)' },
          '50%': { opacity: '1', transform: 'scale(1.05)' }
        },
        'slide-in-right': {
          'from': { opacity: '0', transform: 'translateX(50px)' },
          'to': { opacity: '1', transform: 'translateX(0)' }
        },
        'bounce-gentle': {
          '0%, 20%, 50%, 80%, 100%': { transform: 'translateY(0)' },
          '40%': { transform: 'translateY(-15px)' },
          '60%': { transform: 'translateY(-8px)' }
        },
        scroll: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' }
        },
        scrollRight: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' }
        },
        scrollLeft: {
          '0%': { transform: 'translateX(-50%)' },
          '100%': { transform: 'translateX(0)' }
        },
        scrollRightSlow: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-33.33%)' }
        }
      },
      backdropBlur: {
        'strong': '20px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
