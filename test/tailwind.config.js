/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php',
    './public/assets/js/**/*.js',
  ],
  darkMode: ['selector', '[data-theme="dark"]'],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#0f766e',
          50: '#f0fdfa',
          100: '#ccfbf1',
          200: '#99f6e4',
          300: '#5eead4',
          400: '#2dd4bf',
          500: '#14b8a6',
          600: '#0f766e',
          700: '#0d5d52',
          800: '#115e59',
          900: '#134e4a',
        },
        gold: {
          DEFAULT: '#d4af37',
          muted: 'rgba(212, 175, 55, 0.16)',
        },
        success: '#16a34a',
        danger: '#dc2626',
        warning: '#d97706',
        canvas: {
          DEFAULT: '#f8fafc',
          soft: '#f1f5f9',
        },
        ink: {
          DEFAULT: '#0f172a',
          soft: '#475569',
          muted: '#64748b',
        },
        sidebar: {
          DEFAULT: '#0c2922',
          hover: 'rgba(15, 118, 110, 0.22)',
        },
      },
      fontFamily: {
        sans: ['Cairo', 'Tajawal', 'Inter', 'system-ui', 'sans-serif'],
        heading: ['Cairo', 'Tajawal', 'Inter', 'sans-serif'],
        latin: ['Inter', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        'display-lg': ['3.5rem', { lineHeight: '1.05', letterSpacing: '-0.03em', fontWeight: '800' }],
        'display-md': ['2.75rem', { lineHeight: '1.08', letterSpacing: '-0.025em', fontWeight: '800' }],
        'display-sm': ['2rem', { lineHeight: '1.15', letterSpacing: '-0.02em', fontWeight: '700' }],
        title: ['1.5rem', { lineHeight: '1.25', fontWeight: '700' }],
        subtitle: ['1.125rem', { lineHeight: '1.5', fontWeight: '600' }],
        body: ['1rem', { lineHeight: '1.75' }],
        caption: ['0.875rem', { lineHeight: '1.6' }],
        micro: ['0.75rem', { lineHeight: '1.4', letterSpacing: '0.08em' }],
      },
      spacing: {
        0.5: '0.125rem',
        1: '0.25rem',
        2: '0.5rem',
        3: '0.75rem',
        4: '1rem',
        5: '1.25rem',
        6: '1.5rem',
        8: '2rem',
        10: '2.5rem',
        12: '3rem',
        16: '4rem',
        18: '4.5rem',
        22: '5.5rem',
      },
      borderRadius: {
        sm: '0.5rem',
        DEFAULT: '0.75rem',
        md: '0.75rem',
        lg: '1rem',
        xl: '1.25rem',
        '2xl': '1.5rem',
      },
      boxShadow: {
        xs: '0 1px 2px rgba(15, 23, 42, 0.05)',
        soft: '0 4px 24px rgba(15, 23, 42, 0.06)',
        card: '0 8px 32px rgba(15, 23, 42, 0.08)',
        elevated: '0 16px 48px rgba(15, 23, 42, 0.12)',
        glow: '0 0 0 1px rgba(15, 118, 110, 0.08), 0 12px 40px rgba(15, 118, 110, 0.12)',
        'gold-ring': '0 0 0 1px rgba(212, 175, 55, 0.2)',
      },
      transitionDuration: {
        fast: '200ms',
        DEFAULT: '250ms',
        slow: '300ms',
      },
      transitionTimingFunction: {
        smooth: 'cubic-bezier(0.4, 0, 0.2, 1)',
        bounce: 'cubic-bezier(0.34, 1.56, 0.64, 1)',
      },
      animation: {
        fadeup: 'fadeup 0.6s ease forwards',
        'fadeup-delay': 'fadeup 0.6s ease 0.1s forwards',
        push: 'push 0.15s ease',
        shimmer: 'shimmer 1.4s ease infinite',
        'modal-in': 'modalIn 0.28s ease forwards',
      },
      keyframes: {
        fadeup: {
          '0%': { opacity: '0', transform: 'translateY(16px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        push: {
          '0%': { transform: 'scale(1)' },
          '50%': { transform: 'scale(0.98)' },
          '100%': { transform: 'scale(1)' },
        },
        shimmer: {
          '0%': { backgroundPosition: '-200% 0' },
          '100%': { backgroundPosition: '200% 0' },
        },
        modalIn: {
          '0%': { opacity: '0', transform: 'scale(0.96) translateY(8px)' },
          '100%': { opacity: '1', transform: 'scale(1) translateY(0)' },
        },
      },
      backdropBlur: {
        glass: '12px',
      },
    },
  },
  plugins: [],
};
