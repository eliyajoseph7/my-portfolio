<div>
    <div class="border bg-white rounded-lg mb-3 interest-action w-screen md:w-full">
        <div class="p-0">
            @if (auth()->check())
                <div class="float-right">
                    <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm interest-btn" aria-labelledby="add-interest" role="dialog" aria-modal="true" wire:click="showAddInterest()"></i>
                </div>
            @endif
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$interest_flag}} " wire:click="hideAddInterest()"></div>

            @include('livewire.interests.add-interest')
            <h3 class="text-left px-5 py-3 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif"><i class="fa fa-thumbs-up fa-sm text-gray-500"></i> Interests</h3>
            <hr>
            <div class="px-5 py-2">
                @forelse ($interests as $interest)
                <div class="flex justify-between interest cursor-pointer" rmv="interest{{ $loop->iteration }}" icn="skl{{ $loop->iteration }}">
                    <p aria-labelledby="add-interest" role="dialog" aria-modal="true" wire:click="showEditInterest({{ $interest->id }})"><i class="fa fa-check-circle pr-1" id="skl{{ $loop->iteration }}"></i>{{ $interest->interest }}</p>
                    @auth
                        <a href="#" class="text-white hidden" id="interest{{ $loop->iteration }}" wire:click="$emit('delete-interest', {{$interest->id}})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                    @endauth
                </div>
                @empty
                    <p>No any interest</p>
                @endforelse

            </div>
        </div>
    </div>
</div>


<script>
    $(".interest").hover(function(){
        var id = $(this).attr('rmv');
        $('#' + id).css("display", "block");
        $('#' + $(this).attr('icn')).css("color", "#234B9F");
    }, function(){
        $('#' + $(this).attr('rmv')).css("display", "none");
        $('#' + $(this).attr('icn')).css("color", "black");
    });


    $(".interest-action").hover(function(){
        $('.interest-btn').css("display", "inline-flex");
    }, function(){
        $('.interest-btn').css("display", "none");
    });

    Livewire.on('delete-interest', interestId => {
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
                Livewire.emit('deleteInterest', interestId)
                Swal.fire(
                    'Deleted!',
                    'Your interest has been deleted.',
                    'success'
                )
            }
        });
    })
</script>