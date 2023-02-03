
<div class="mb-5">
    <div class="block border-b-2 shadow-xs pb-32 rounded-t-xl rounded-b-md">
        <a href="#" class="block bg-clip-border w-100 pb-6 min-w-md bg-white rounded-t-xl border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 h-28 lg:h-48 bg-no-repeat bg-cover bg-center" style="background-image: url('assets/images/bg/pc-2.jpg');">
        </a>
        <div class="flex absolute top-32 lg:top-40">
            <img src="{{ url('assets/images/me.jpeg') }}" alt="me" class="rounded-full grayscale hover:grayscale-0 cursor-pointer border-4 border-white w-24 h-24 lg:w-48 lg:h-48 ring-8 ring-offset-0 ring-white ring-inset ml-28 lg:ml-56">
            <div class="grid lg:grid-cols-3 grid-cols-1 lg:grid-flow-col lg:gap-10 absolute top-24 lg:top-36 lg:left-96 lg:space-x-72">
                <div class=" lg:colspan-2 lg:ml-10 w-96 grid grid-flow-row">
                    <h3 class="w-full text-3xl font-bold uppercase cursor-pointer px-4 font-serif">{{ auth()->user()->name ?? 'Eliya Joseph' }}</h3>
                </div>
                <div class="lg:colspan-1 grid md:grid-rows-1 grid-flow-col gap-2 md:gap-4 px-4">
                    <a href="https://wa.me/255684710914" target="_blank" type="button" class="py-2.5 px-2 lg:px-8 mr-2 text-sm font-semibold text-gray-900 bg-white rounded-lg hover:text-blue-700 border border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center"><i class="fab fa-whatsapp fa-lg lg:fa-xl pr-1 lg:pr-2"></i> Message</a>
                    <a href="tel:255684710914" type="button" class="py-2.5 px-4 lg:px-10 mr-2 text-sm font-semibold text-gray-900 bg-white rounded-lg hover:text-blue-700 border border-gray-200 hover:bg-gray-100  focus:z-10 focus:ring-4 focus:outline-none focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 inline-flex items-center"><i class="fa fa-phone fa-m lg:fa-lg pr-1 lg:pr-2"></i> Call</a>
                </div>
            </div>
        </div>

    </div>
</div>