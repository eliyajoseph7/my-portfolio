
<x-add-project-skill class="fixed inset-0 overflow-hidden {{$summary_flag}} z-30" compname="summary" :actions="$action">

    <h3 class="mb-4 text-2xl font-large text-gray-900 dark:text-white">Professional Summary</h3>
    <form class="space-y-6" role="dialog" wire:submit.prevent="updateSummary(Object.fromEntries(new FormData($event.target)))">
        <div>
            <label for="summary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
            <textarea type="text" rows="7" name="summary" id="summary" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>{!! $mysummary !!}</textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" id="save-summary" data-mod al-toggle="summary-modal" class="w-24 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </div>
    </form>
                                    
</x-add-project-skill>

<script>
    
</script>
