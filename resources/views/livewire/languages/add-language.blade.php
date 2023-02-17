
<x-add-project-skill class="fixed inset-0 overflow-hidden {{$language_flag}} z-30" compname="language" :actions="$action">
    <form class="p-2" method="dialog" wire:submit.prevent="{{ lcfirst($action) }}Language">
        <div class="mb-6" wire:ignore>
            <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enter Language(s)</label>
            <input type="text" name="language" wire:model.debounce.500ms="language" id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter new language" />
            <!-- <textarea type="text" id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea> -->
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ $action }}</button>
    </form>
                                    
</x-add-project-skill>