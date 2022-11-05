<div class="container mx-auto">
    <div class="grid grid-flow-row lg:grid-flow-col lg:grid-cols-4 gap-3 auto-cols-max md:auto-cols-min py-5">
        <div class="lg:col-span-3">
            @include('layouts.frontend.components.header')
            <div class="border bg-white shadow-sm rounded-lg mb-5 border-t-slate-300">
                <div class="p-5">
                    <h3 class="text-gray-800 py-1 tracking-tight hover:text-gray-900 cursor-pointer text-3xl font-bold dark:text-white font-mono">Professional Summary</h3>
                    <hr>
                    <div class="block lg:grid lg:grid-flow-col lg:grid-cols-3">
                        <p class="lg:col-span-2 text-gray-700 leading-relaxed text-lg dark:text-white w-full px-3 bg-slate-50 bg-clip-border">
                            Knowledgeable Software developer offering 4 + years leading cross-functional
                            teams and completing projects on-time. Seamlessly manages workloads and
                            meets challenging deadlines and quality benchmarks. Strong understanding of
                            common web technologies, languages and frameworks..
                        </p>
                        <a href="#" class="lg:col-span-1 block lg:ml-auto  w-96 pb-6 min-w-md bg-black rounded-t-xl  hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 h-32 lg:h-48 bg-no-repeat bg-cover bg-center" style="background-image: url('https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png');">
                        </a>
                        <!-- <img src="https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png" alt="me" class="rounded-md cursor-pointer border-4 img-fluid bg-cover border-white w-96 h-32 lg:w-96 lg:h-36 ring-8 ring-offset-0 ring-white ring-inset lg:m-auto"> -->
                        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore eos vitae nobis quasi cumque omnis!</p> -->
                    </div>
                </div>
            </div>
            <div class="border bg-white shadow-sm rounded-lg border-b-slate-200">
                <div class="p-5">
                    <div class="float-right">
                        <i class="fa fa-plus-circle fa-2xl cursor-pointer text-blue-700 hover:text-blue-800 p-3 relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" wire:click="showAddExperience()"></i>
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity {{$experience}}"></div>

                        <div class="fixed inset-0 overflow-hidden {{$experience}}">
                            <div class="absolute inset-0 overflow-hidden">
                                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

                                    <div class="pointer-events-auto relative w-screen max-w-md">

                                        <div class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">

                                        </div>

                                        <div class="flex h-full flex-col overflow-y-scroll bg-white pb-6 shadow-xl">
                                            <div class="px-4 py-10 sm:px-6 bg-blue-900 text-white">
                                                <button type="button" class="float-right rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white" wire:click="hideAddExperience()">
                                                    <span class="sr-only">Close panel</span>
                                                    <!-- Heroicon name: outline/x-mark -->
                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                                <h2 class="text-lg font-medium" id="slide-over-title">Add Experience</h2>
                                            </div>
                                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                                <!-- Replace with your content -->
                                                <div class="absolute inset-0 px-4 sm:px-6">
                                                    <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
                                                </div>
                                                <!-- /End replace -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-gray-800 py-1 hover:text-gray-900 tracking-tight cursor-pointer text-3xl font-bold dark:text-white font-mono">Work Experience</h3>
                    <hr>
                    <div class="">
                        @forelse ($experiences as $exp)
                        <h1 class="text-3xl font-serif italic"><i class="fa fa-star text-gray-500"></i> {{$exp['title']}} - {{ $exp['company'] }}</h1>
                        <p class="py-1 pl-10 text-lg">{{ $exp['location'] }} {{ $exp['from'] }} - {{ $exp['to'] }}</p>
                        <p class="py-1 pl-10 text-lg"></p>

                        <h2 class="pl-10 mb-2 text-lg font-semibold italic text-gray-900 dark:text-white">Achievements:</h2>
                        <ul class="space-y-1 p-5 list-inside text-gray-500 dark:text-gray-400">
                            @forelse ($exp['achievements'] as $task)
                                <li class="flex items-center pl-5">
                                    <i class="fa fa-check-circle w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0 " fill="currentColor"></i>
                                    {{ $task }}
                                </li>

                            @empty

                            @endforelse

                        </ul>

                        @empty

                        @endforelse
                    </div>
                    <p class="text-justify text-gray-900 dark:text-white">

                    </p>
                </div>
            </div>

        </div>
        <div class="lg:colspan-2">
            <div class="border bg-white rounded-lg mb-5">
                <div class="p-5">
                    <h3 class="text-left py-1 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif">Skills</h3>
                    <hr>
                </div>
            </div>


            <div class="border bg-white rounded-lg">
                <div class="p-5">
                    <h3 class="text-left py-1 font-bold text-3xl tracking-tight text-gray-800 hover:text-gray-900 cursor-pointer dark:text-white font-serif">Projects</h3>
                    <hr>
                </div>
            </div>

        </div>
    </div>
</div>