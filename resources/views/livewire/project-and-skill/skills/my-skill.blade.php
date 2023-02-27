<div class="w-screen md:w-full">
    <div class="border bg-white rounded-lg mb-3 skill-action">
        <div class="p-0">
            @if (auth()->check())
                <div class="float-right">
                    <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm actn-btn" aria-labelledby="add-skill" role="dialog" aria-modal="true" wire:click="showAddSkill()"></i>
                </div>
            @endif
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$skill_flag}} " wire:click="hideAddSkill()"></div>

            @include('livewire.project-and-skill.skills.add_skill')
            <h3 class="text-left px-5 py-3 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif"><i class="fa fa-code fa-sm text-gray-500"></i> Skills</h3>
            <hr>
            <div class="px-5 py-2">
                @forelse ($skills as $skill)
                <div class="flex justify-between skill cursor-pointer" rmv="skill{{ $loop->iteration }}" icn="skl{{ $loop->iteration }}">
                    @auth
                        <p aria-labelledby="add-skill" role="dialog" aria-modal="true" wire:click="showEditSkill({{ $skill->id }})"><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $skill->skill }}</p>
                    @endauth
                    @guest
                        <p aria-labelledby="add-skill" role="dialog" aria-modal="true"><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $skill->skill }}</p>
                    @endguest
                    @auth
                        <a href="#" class="text-white hidden" id="skill{{ $loop->iteration }}" wire:click="$emit('delete-skill', {{$skill->id}})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                    @endauth
                </div>
                @empty
                    <p>No any skill</p>
                @endforelse

            </div>
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


    $(".skill-action").hover(function(){
        $('.actn-btn').css("display", "inline-flex");
    }, function(){
        $('.actn-btn').css("display", "none");
    });

    Livewire.on('delete-skill', skillId => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteSkill', skillId)
                Swal.fire(
                    'Deleted!',
                    'Your skill has been deleted.',
                    'success'
                )
            }
        });
    })
</script>