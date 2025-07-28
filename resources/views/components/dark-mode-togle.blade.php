<div x-data="darkMode" class="flex items-center space-x-2">
    <div class="relative">
        <input type="checkbox" 
               class="sr-only" 
               :checked="isDark"
               @change="toggle()">
        <button @click="toggle()" 
                class="relative inline-flex h-6 w-11 items-center rounded-full transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 select-none"
                :class="{ 
                    'bg-blue-600': isDark, 
                    'bg-gray-300 dark:bg-gray-600': !isDark 
                }"
                type="button"
                aria-label="Toggle dark mode">
            <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 ease-in-out shadow-lg"
                  :class="{ 
                    'translate-x-6': isDark, 
                    'translate-x-1': !isDark 
                  }">
            </span>
        </button>
    </div>
    <span class="text-sm font-medium text-gray-600 dark:text-gray-400 select-none min-w-[35px]" 
          x-text="isDark ? 'Dark' : 'Light'"></span>
</div>