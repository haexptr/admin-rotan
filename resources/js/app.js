import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Dark Mode Functionality
document.addEventListener('alpine:init', () => {
    Alpine.data('darkMode', () => ({
        isDark: false,
        
        init() {
            // Check for saved theme preference or default to system preference
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                this.isDark = true;
                document.documentElement.classList.add('dark');
            } else {
                this.isDark = false;
                document.documentElement.classList.remove('dark');
            }
            
            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (!localStorage.getItem('theme')) {
                    this.isDark = e.matches;
                    this.updateTheme();
                }
            });
        },
        
        toggle() {
            this.isDark = !this.isDark;
            this.updateTheme();
            
            // Save preference to localStorage
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
        },
        
        updateTheme() {
            if (this.isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }));
});

Alpine.start();