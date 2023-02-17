
<div class="border bg-white rounded-lg mb-3 certificate-action">
    <div class="p-0">
        @if (auth()->check())
            <div class="float-right">
                    <i wire:click="$emit('delete_certificate')" class="fa fa-trash-alt fa-lg items-center cursor-pointer text-red-400 hover:text-red-800 p-2 relative  btn-certificate hidden border rounded-md shadow-sm hover:shadow-md py-4" aria-labelledby="add-experience" role="dialog" aria-modal="true"></i>
                <i class="fa fa-plus-circle fa-xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative  {{ $hide }} hidden border rounded-md p-4 hover:shadow-sm btn-certificate" aria-labelledby="add-certificate" role="dialog" aria-modal="true" wire:click="showAddCertificate()"></i>
            </div>
        @endif
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$certificate_flag}} " wire:click="hideAddCertificate()"></div>

        @include('livewire.certificates.add_certificate')
        <h3 class="text-gray-800 px-5 py-3 hover:text-gray-900 font-bold text-3xl tracking-tight cursor-pointer dark:text-white font-mono">
            Certificates
        </h3>
        <hr>
        <div class="px-5 py-2">
            @if ($certificates)
            <div class="flex justify-between certificate cursor-pointer" rmv="certificate" icn="prj">
                <div class="flex" aria-labelledby="add-certificate" role="dialog" aria-modal="true" wire:click="showAddCertificate)">
                    <p>
                        <!-- <i class="fa fa-angle-right pr-1" id="prj"></i> -->
                        {!! $certificates->certificate !!}
                    </p>
                </div>
                @auth
                    <a href="#" class="text-white hidden" id="certificate" wire:click="deleteCertificate{{ $certificates->id }})"><i class="fa fa-minus fa-md px-2 py-1 bg-red-700 hover:bg-red-800 rounded-md "></i></a>
                @endauth
            </div>
            @else
                <p>No any certificate</p>
            @endif

        </div>
    </div>
</div>

<script>

    Livewire.on('delete_certificate', () => {
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
                Livewire.emit('deleteCertificate')
                Swal.fire(
                    'Deleted!',
                    'Your certificate has been deleted.',
                    'success'
                )
            }
        });
    });

    $(".certificate-action").hover(function(){
        $('.btn-certificate').css("display", "inline-flex");
    }, function(){
        $('.btn-certificate').css("display", "none");
    });
</script>


<style> 
    .certificate-action ul {
        padding-left: 1em;
    }

    .certificate-action ol {
        padding-left: 1em;
    }
    .certificate-action li {
        list-style: none !important;
        list-style-position: outside;
        padding-left: 1em;
    }

    .certificate-action li:before {
        content: "\f058"; /* FontAwesome Unicode */
        font-family: FontAwesome;
        margin-left: -2em;
        /* margin-right: 15px; */
        padding: 5px;
        /* background-color: orange; */
    }
</style>
