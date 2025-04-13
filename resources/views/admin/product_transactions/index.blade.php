<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row w-full justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm sm:rounded-lg">


                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <div>
                            <p class="text-base text-slate-500">
                                Total Transaksi
                            </p>
                            <h3 class="text-2xl font-bold text-indigo-950">
                                Rp 18,000
                            </h3>
                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Date
                        </p>
                        <h3 class="text-2xl font-bold text-indigo-950">
                            25 January 2025
                        </h3>
                    </div>
                    <span class="py-1 px-3 rounded-full text-white bg-orange-500">
                        <p class="text-with font-bold text-sm">
                            Pending
                        </p>
                    </span>
                </div>
                <hr class="my-3">

                <h3 class="text-2xl font-bold text-indigo-950">
                    Lis of Items
                </h3>

                <div class="grid-cols-4 grid gap-x-10">
                    <div class="flex flex-col gap-y-5 col-span-2">
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-950">
                                        Tolang Angin
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp. 500000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamins
                            </p>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-950">
                                        Tolang Angin
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp. 500000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamins
                            </p>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-950">
                                        Tolang Angin
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp. 500000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamins
                            </p>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-950">
                                        Tolang Angin
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp. 500000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamins
                            </p>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-950">
                                        Tolang Angin
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp. 500000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamins
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-5 col-span-2">
                        <img src="#" alt="" class="w-[300px] bg-red-300 h-[400px]">
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
