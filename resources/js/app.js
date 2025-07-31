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
            
            // Optional: Add smooth transition effect
            document.documentElement.style.transition = 'background-color 0.3s ease, color 0.3s ease';
            setTimeout(() => {
                document.documentElement.style.transition = '';
            }, 300);
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

// Initialize Alpine
Alpine.start();

// Additional utility functions for the admin panel
document.addEventListener('DOMContentLoaded', function() {
    
    // Auto-hide success/error messages after 5 seconds (only once per message)
    const alerts = document.querySelectorAll('[class*="bg-green-"], [class*="bg-red-"], [class*="bg-yellow-"]');
    alerts.forEach(alert => {
        // Check if this alert contains success/error keywords and hasn't been processed
        if (!alert.dataset.processed && (
            alert.textContent.includes('berhasil') || 
            alert.textContent.includes('error') || 
            alert.textContent.includes('success') ||
            alert.textContent.includes('dihapus') ||
            alert.textContent.includes('ditambahkan') ||
            alert.textContent.includes('diperbarui')
        )) {
            alert.dataset.processed = 'true'; // Mark as processed
            
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        if (alert.parentNode) {
                            alert.remove();
                        }
                    }, 500);
                }
            }, 5000);
        }
    });
    
    // Add loading state to forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                `;
                
                // Reset after 10 seconds (fallback)
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 10000);
            }
        });
    });
    
    // Enhanced delete confirmation
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"], form[action*="destroy"] button[type="submit"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Create custom confirmation modal (you can style this further)
            const confirmed = confirm('⚠️ Apakah Anda yakin ingin menghapus data ini?\n\nTindakan ini tidak dapat dibatalkan.');
            
            if (confirmed) {
                if (button.form) {
                    button.form.submit();
                } else {
                    // Handle onclick delete
                    eval(button.getAttribute('onclick'));
                }
            }
        });
    });
    
    // Add smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + D to toggle dark mode
        if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
            e.preventDefault();
            const darkModeToggle = document.querySelector('[x-data*="darkMode"]');
            if (darkModeToggle) {
                Alpine.store('darkMode').toggle();
            }
        }
        
        // Escape key to close modals or go back
        if (e.key === 'Escape') {
            const backButton = document.querySelector('a[href*="index"], a[href*="kembali"]');
            if (backButton && !document.querySelector('.modal:not(.hidden)')) {
                // Only trigger if no modal is open
                window.location.href = backButton.href;
            }
        }
    });
});

// Toast notification system for better UX
window.showToast = function(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' :
        type === 'error' ? 'bg-red-500 text-white' :
        type === 'warning' ? 'bg-yellow-500 text-black' :
        'bg-blue-500 text-white'
    }`;
    
    toast.innerHTML = `
        <div class="flex items-center">
            <span class="mr-2">${
                type === 'success' ? '✅' :
                type === 'error' ? '❌' :
                type === 'warning' ? '⚠️' :
                'ℹ️'
            }</span>
            <span>${message}</span>
            <button class="ml-4 text-white hover:text-gray-200" onclick="this.parentElement.parentElement.remove()">
                ✕
            </button>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.classList.remove('translate-x-full');
    }, 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    }, 5000);
};