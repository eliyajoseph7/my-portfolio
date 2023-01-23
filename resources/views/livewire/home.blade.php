<div class="container mx-auto w-sc">
    <div class="grid grid-flow-row lg:grid-flow-col lg:grid-cols-4 lg:gap-3 auto-cols-max md:auto-cols-auto py-5">
        <div class="lg:col-span-3">
            <div class="border bg-white shadow-sm rounded-lg mb-5 border-t-slate-300">
                <div class="p-0">
                    @include('layouts.frontend.components.header')
                </div>
                <div class="p-5">
                    <h3 class="text-gray-800 py-1 tracking-tight hover:text-gray-900 cursor-pointer text-3xl font-bold dark:text-white font-mono">Professional Summary</h3>
                    <hr>
                    <div class="lg:grid lg:grid-flow-col lg:grid-cols-1 w-96 md:w-full">
                        <div class="lg:col-span-2 col-span-1 text-gray-700 text-justify leading-relaxed text-lg dark:text-white w-96 md:w-full px-3 bg-slate-50 bg-clip-border">
                            <a href="#" class="float-left flex lg:ml-auto  w-24 pb-6 min-w-md bg-black rounded-3xl ring-4 mr-5  hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 h-20 lg:h-24 bg-no-repeat bg-cover bg-center" style="background-image: url('https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png');">
                            </a>
                            Knowledgeable Software developer offering 4 + years leading cross-functional
                            teams and completing projects on-time. Seamlessly manages workloads and
                            meets challenging deadlines and quality benchmarks. Strong understanding of
                            common web technologies, languages and frameworks..
                        </div>
                        <!-- <img src="https://www.classicinformatics.com/hubfs/custom%20software%20development%20company%20%281%29.png" alt="me" class="rounded-md cursor-pointer border-4 img-fluid bg-cover border-white w-96 h-32 lg:w-96 lg:h-36 ring-8 ring-offset-0 ring-white ring-inset lg:m-auto"> -->
                        <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore eos vitae nobis quasi cumque omnis!</p> -->
                    </div>
                </div>
            </div>
            @livewire('experiences.experience')

        </div>
        <div class="lg:colspan-1 mt-5 lg:mt-0">
            @livewire('project-and-skill')

        </div>
    </div>
</div>