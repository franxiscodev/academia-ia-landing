/**
 * Configuración Custom de Tailwind CSS
 * Academia de Habilidades Digitales con IA
 * 
 * Esta configuración debe incluirse en un <script> tag en el HTML:
 * 
 * <script>
 *   tailwind.config = { ... este contenido ... }
 * </script>
 */

tailwind.config = {
  theme: {
    extend: {
      colors: {
        // Paleta principal basada en la infografía
        'mint': {
          50: '#f0fdf9',
          100: '#ccfbef',
          200: '#99f6e0',
          300: '#5fe9ce',
          400: '#7DD3C0', // Color principal de la infografía
          500: '#14b8a6',
          600: '#0d9488',
          700: '#0f766e',
          800: '#115e59',
          900: '#134e4a',
        },
        'coral': {
          50: '#fff5f3',
          100: '#ffe9e5',
          200: '#ffd6cf',
          300: '#ffb8ac',
          400: '#FF8B7B', // Acento coral de la infografía
          500: '#f97066',
          600: '#e5503f',
          700: '#c13f2f',
          800: '#a0362a',
          900: '#843228',
        },
        'sky-soft': {
          50: '#f0f9ff',
          100: '#e0f2fe',
          200: '#bae6fd',
          300: '#A8D8EA', // Azul cielo suave
          400: '#38bdf8',
          500: '#0ea5e9',
          600: '#0284c7',
          700: '#0369a1',
          800: '#075985',
          900: '#0c4a6e',
        },
        'sunshine': {
          50: '#fffef7',
          100: '#fffbeb',
          200: '#fef3c7',
          300: '#FFD97D', // Amarillo pastel
          400: '#fbbf24',
          500: '#f59e0b',
          600: '#d97706',
          700: '#b45309',
          800: '#92400e',
          900: '#78350f',
        },
        'cream': '#FAFBF8',
        'slate-dark': '#2C3E50',
      },
      fontFamily: {
        'display': ['Poppins', 'sans-serif'],
        'body': ['Inter', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        'hero': ['3.5rem', { lineHeight: '1.1', fontWeight: '700' }],
        'hero-mobile': ['2.5rem', { lineHeight: '1.2', fontWeight: '700' }],
      },
      borderRadius: {
        'card': '1.5rem',
        'button': '0.75rem',
      },
      boxShadow: {
        'soft': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
        'card': '0 10px 30px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
        'lift': '0 20px 40px -10px rgba(0, 0, 0, 0.15), 0 8px 12px -4px rgba(0, 0, 0, 0.08)',
        'inner-soft': 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
      },
      backgroundImage: {
        'gradient-mint-coral': 'linear-gradient(135deg, #7DD3C0 0%, #FF8B7B 100%)',
        'gradient-sky-mint': 'linear-gradient(135deg, #A8D8EA 0%, #7DD3C0 100%)',
        'gradient-sunshine-coral': 'linear-gradient(135deg, #FFD97D 0%, #FF8B7B 100%)',
        'gradient-radial': 'radial-gradient(circle, var(--tw-gradient-stops))',
        'mesh-gradient': `
          radial-gradient(at 40% 20%, rgba(125, 211, 192, 0.3) 0px, transparent 50%),
          radial-gradient(at 80% 0%, rgba(168, 216, 234, 0.3) 0px, transparent 50%),
          radial-gradient(at 0% 50%, rgba(255, 139, 123, 0.3) 0px, transparent 50%),
          radial-gradient(at 80% 50%, rgba(255, 217, 125, 0.3) 0px, transparent 50%),
          radial-gradient(at 0% 100%, rgba(168, 216, 234, 0.3) 0px, transparent 50%),
          radial-gradient(at 80% 100%, rgba(125, 211, 192, 0.3) 0px, transparent 50%)
        `,
      },
      animation: {
        'fade-in': 'fadeIn 0.6s ease-out',
        'slide-up': 'slideUp 0.6s ease-out',
        'slide-in-left': 'slideInLeft 0.6s ease-out',
        'slide-in-right': 'slideInRight 0.6s ease-out',
        'scale-in': 'scaleIn 0.5s ease-out',
        'pulse-soft': 'pulseSoft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'float': 'float 3s ease-in-out infinite',
        'gradient-shift': 'gradientShift 8s ease infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(30px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        slideInLeft: {
          '0%': { transform: 'translateX(-30px)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        slideInRight: {
          '0%': { transform: 'translateX(30px)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        scaleIn: {
          '0%': { transform: 'scale(0.95)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
        pulseSoft: {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.8' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        gradientShift: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
    },
  },
  plugins: [],
}
