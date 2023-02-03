
<x-add-project-skill class="fixed inset-0 overflow-hidden {{$project_flag}} z-30" compname="project">

    <form class="p-2" method="dialog" wire:submit.prevent="addProject">
        <div class="mb-6" wire:ignore>
            <label for="project" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enter Project(s)</label>
            <input type="text" name="project" wire:model.debounce.500ms="project" id="project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter new project" />
            <!-- <textarea type="text" id="project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea> -->
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
    </form>
                                    
</x-add-project-skill>


