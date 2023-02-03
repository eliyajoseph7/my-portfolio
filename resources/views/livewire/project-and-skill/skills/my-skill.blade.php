<div>
    <div class="border bg-white rounded-lg mb-5">
        <div class="p-5">
            @if (auth()->check())
                <div class="float-right">
                    <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }}" aria-labelledby="add-skill" role="dialog" aria-modal="true" wire:click="showAddSkill()"></i>
                </div>
            @endif
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$skill_flag}} " wire:click="hideAddSkill()"></div>

            @include('livewire.project-and-skill.skills.add_skill')
            <h3 class="text-left py-1 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif">Skills</h3>
            <hr>
            @forelse ($skills as $skill)
            <div class="flex justify-between skill cursor-pointer" rmv="skill{{ $loop->iteration }}" icn="skl{{ $loop->iteration }}">
                <p><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $skill->skill }}</p>
                @auth
                    <a href="#" class="text-white hidden" id="skill{{ $loop->iteration }}" wire:click="deleteSkill({{ $skill->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @empty
                <p>No any skill</p>
            @endforelse
        </div>
    </div>
</div>


<script>
    $(".skill").hover(function(){
        var id = $(this).attr('rmv');
        $('#' + id).css("display", "block");
        $('#' + $(this).attr('icn')).css("color", "#234B9F");
    }, function(){
        $('#' + $(this).attr('rmv')).css("display", "none");
        $('#' + $(this).attr('icn')).css("color", "black");
    });
</script>