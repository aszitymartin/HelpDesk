<header class="w-full p-4 gap-4 text-sm flex-col header">

    <nav class="flex flex-row items-center space-between w-full">
        
        <form class="max-w-4xl w-2xl mx-auto">   
            <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                </div>
                <input type="search" id="search" class="block w-full p-3 pl-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="Search" required />
            </div>
        </form>

        <section class="bg-dark">
            <div class="container">
                <!-- Account Dropdown Style One -->
                <div x-data="{showDropdown: false}" class="flex justify-center">
                <div
                    @click.outside="showDropdown = false"
                    class="relative inline-block"
                >
                    <button
                    @click="showDropdown = !showDropdown"
                    class="inline-flex w-full gap-2 justify-center items-center cursor-pointer gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5 hover:bg-white/10"
                    >
                    <div class="flex items-center gap-3 px-2 py-1">
                        <div class="relative aspect-square w-10 rounded-full">
                            <img
                                src="https://cdn.tailgrids.com/2.2/assets/core-components/images/account-dropdowns/image-1.jpg"
                                alt="account"
                                class="w-full rounded-full object-cover object-center"
                            />
                        </div>
                        <div class="text-left">
                            <p class="text-sm font-semibold text-dark dark:text-white">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm text-body-color text-gray-400">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                    <span
                        :class="showDropdown ? '-scale-y-100' : ''"
                        class="duration-100"
                    >
                        <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400"><path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" /></svg>
                    </span>
                    </button>
                    <div
                    :class="showDropdown ? 'block' : 'hidden'"
                    class="item-bg item-bg-fill absolute right-0 top-[120%] w-60 divide-y divide-stroke overflow-hidden rounded-lg divide-dark-3 bg-dark-2"
                    >
                    <div>
                        <a
                            href="/profile"
                            class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                            View profile
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                            Settings
                        </a>
                        <a
                            href="javascript:void(0)"
                            class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                            Keyboard shortcuts
                            <span class="text-xs text-dark-5"> ⌘K </span>
                        </a>
                    </div>
                    <div>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Company profile
                        </a>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Team
                        </a>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Invite colleagues
                        </a>
                    </div>
                    <div>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Changelog
                        </a>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Slack Community
                        </a>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        Support
                        </a>
                        <a
                        href="javascript:void(0)"
                        class="flex w-full items-center justify-between px-4 py-2.5 text-sm font-medium text-dark hover:bg-gray-50 dark:text-white dark:hover:bg-white/5"
                        >
                        API
                        </a>
                    </div>
                    <div>
                        <span class="flex w-full items-center justify-between px-4 py-2.5">
                            <x-toggle value="1" text="Vacation mode" />
                        </span>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}" class="w-full cursor-pointer block px-4 py-2.5 text-sm text-red-400 font-bold focus:bg-white/5 focus:text-white focus:outline-hidden">
                            @csrf
                            <button type="submit" class="cursor-pointer w-full text-left">Log out</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </section>


    </nav>

    {{-- <hr />

    {{ Breadcrumbs::render() }} --}}

</div>

</header>