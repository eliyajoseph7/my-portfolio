<div class="p-5">
    @if (auth()->check())
    <div class="float-right">
        <button data-modal-target="summary-modal" data-modal-backdrop="dynamic" data-modal-toggle="summary-modal" class="block text-white " type="button">
            <i class="fa fa-plus-circle fa-2xl cursor-pointer text-blue-400 hover:text-blue-800 pr-3 relative {{ $hide }}"></i>
        </button>
    </div>
    @endif
    <h2 class="text-gray-800 py-1 tracking-tight hover:text-gray-900 cursor-pointer text-3xl font-bold dark:text-white font-mono">Professional Summary</h3>
    <hr>
    <div class="lg:grid lg:grid-flow-col lg:grid-cols-1 w-96 md:w-full">
        <div class="lg:col-span-2 col-span-1 text-gray-700 text-justify leading-relaxed text-lg dark:text-white w-96 md:w-full px-3 bg-slate-50 bg-clip-border">
            <a href="#" class="float-left flex lg:ml-auto  w-24 pb-6 min-w-md bg-black rounded-3xl ring-4 mr-5  hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 h-20 lg:h-24 bg-no-repeat bg-cover bg-center" style="background-image: url('https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png');">
            </a>
            {{ $mysummary }}
        </div>
        <!-- <img src="https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png" alt="me" class="rounded-md cursor-pointer border-4 img-fluid bg-cover border-white w-96 h-32 lg:w-96 lg:h-36 ring-8 ring-offset-0 ring-white ring-inset lg:m-auto"> -->
        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore eos vitae nobis quasi cumque omnis!</p> -->
    </div>
</div>


<!-- Main modal -->
<div id="summary-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-4xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button id="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="summary-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
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
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('summary_updated', () => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Professional summary updated successfully!'
        });
        // setInterval($('#closeModal').click(), 10000)
        // ;
        // $('#save-summary').click();
        $('#summary-modal').toggle();
    })
</script>