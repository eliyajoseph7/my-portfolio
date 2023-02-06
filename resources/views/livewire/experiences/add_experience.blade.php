<div class="fixed inset-0 overflow-hidden {{$experience}} z-50">

    @if ($action == 'add')
        <x-experiences.form :showEnd='$showEnd' :toPresent='$toPresent' :achievementRows='$achievementRows'>
            <div class="d-flex items-center justify-between grid grid-flow-col mb-3">
                <div class="col-span-10" wire:ignore>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Achievement(s)</label>
                    <textarea type="text"rows="1" name="achievements" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..........."> </textarea>
                </div>
                <!-- <div class="float-right col-span-1 pr-1">
                    <a wire:click="addAchievementRow" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md px-2 py-1"><i class="fa fa-plus"></i></a>
                </div> -->
            </div>
        </x-experiences.form>
        @else
        <x-experiences.form :showEnd='$showEnd' :toPresent='$toPresent' :achievementRows='$achievementRows'>
            <div class="d-flex items-center justify-between grid grid-flow-col mb-3">
                <div class="col-span-10" wire:ignore>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Achievement(s) </label>
                    <textarea type="text"rows="1" wire:model="achievements" name="achievements" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> {!! $achievements !!} </textarea>
                </div>
            </div>
        </x-experiences.form>
    @endif
</div>


