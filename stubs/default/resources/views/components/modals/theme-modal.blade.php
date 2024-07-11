<div x-show="themeModalOpen" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-light-500 bg-opacity-75 transition-opacity z-50">
        <div class="bg-white dark:bg-light-800 rounded-lg p-6 space-y-4 w-80">
            <h3 class="text-lg font-medium text-light-900 dark:text-light-100">Choose Theme</h3>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="radio" name="theme" value="system" class="form-radio text-primary-600" x-model="currentTheme" @change="setTheme('system')" />
                    <span class="ml-2 text-sm text-light-900 dark:text-light-100">System Default</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="theme" value="light" class="form-radio text-primary-600" x-model="currentTheme" @change="setTheme('light')" />
                    <span class="ml-2 text-sm text-light-900 dark:text-light-100">Light</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="theme" value="dark" class="form-radio text-primary-600" x-model="currentTheme" @change="setTheme('dark')" />
                    <span class="ml-2 text-sm text-light-900 dark:text-light-100">Dark</span>
                </label>
            </div>
            <div class="flex justify-end space-x-2">
                <button @click="themeModalOpen = false" class="px-4 py-2 text-sm font-medium text-light-900 dark:text-light-100 bg-light-200 dark:bg-light-700 rounded-md">Cancel</button>
                <button @click="themeModalOpen = false" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-md">OK</button>
            </div>
        </div>
    </div>
</div>