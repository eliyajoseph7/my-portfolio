<div>
    <div class="border bg-white rounded-lg mb-5">
        <div class="p-5">
            @if (auth()->check())
                <div class="float-right">
                    <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative {{ $hide }} " aria-labelledby="add-project" role="dialog" aria-modal="true" wire:click="showAddProject()"></i>
                </div>
            @endif
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$project_flag}} " wire:click="hideAddProject()"></div>

            @include('livewire.project-and-skill.projects.add_project')
            
            <h3 class="text-gray-800 py-1 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-serif">Projects</h3>
            <hr>
            @forelse ($projects as $project)
            <div class="flex justify-between project cursor-pointer" rmv="project{{ $loop->iteration }}" icn="prj{{ $loop->iteration }}">
                <p><i class="fa fa-check-circle pr-1" id="prj{{ $loop->iteration }}"></i>{{ $project->project }}</p>
                @auth
                    <a href="#" class="text-white hidden" id="project{{ $loop->iteration }}" wire:click="deleteProject({{ $project->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @empty
                <p>No any project</p>
            @endforelse
        </div>
    </div>
</div>


<script>
    $(".project").hover(function(){
        var id = $(this).attr('rmv');
        $('#' + id).css("display", "block");
        $('#' + $(this).attr('icn')).css("color", "#234B9F");
    }, function(){
        $('#' + $(this).attr('rmv')).css("display", "none");
        $('#' + $(this).attr('icn')).css("color", "black");
    });
</script>
