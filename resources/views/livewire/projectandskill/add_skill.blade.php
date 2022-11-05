<div class="fixed inset-0 overflow-hidden {{$skill}}">
    <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

            <div class="pointer-events-auto relative w-screen max-w-lg">

                <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">

                </div>

                <div class="flex h-full flex-col overflow-y-scroll bg-white pb-6 shadow-xl">
                    <div class="px-4 py-10 sm:px-6 bg-blue-900 text-white">
                        <button type="button" class="float-right rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" wire:click="hideAddSkill()">
                            <span class="sr-only">Close panel</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="text-2xl font-serif text-x" id="add-skill">Add New Skill</h2>
                    </div>
                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                        <!-- Replace with your content -->
                        <div class="absolute inset-0 px-4 sm:px-6">
                            <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true">

                                <form class="p-2" method="dialog">
                                    
                                    <div class="mb-6" wire:ignore>
                                        <label for="skill" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enter Skill(s)</label>
                                        <textarea type="text" id="skill" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </form>

                            </div>
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>