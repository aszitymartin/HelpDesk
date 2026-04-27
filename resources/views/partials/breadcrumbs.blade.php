@unless ($breadcrumbs->isEmpty())
<nav class="flex p-3 bg-slate-800 border border-slate-700 rounded-md w-fc" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">

        @foreach ($breadcrumbs as $breadcrumb)

            {{-- FIRST ITEM --}}
            @if ($loop->first)
                <li class="inline-flex items-center">
                    <a href="{{ $breadcrumb->url ?? '#' }}"
                       class="inline-flex items-center text-sm font-medium text-gray-400">

                        
                        <x-icon name="dashboard-4" class="svg-icon icon-small mr-1.5" />

                        {{ $breadcrumb->title }}

                    </a>
                </li>

            {{-- LAST ITEM --}}
            @elseif ($loop->last)
                <li aria-current="page">
                    <div class="flex items-center space-x-1.5">

                        <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>

                        <span class="inline-flex items-center text-sm font-medium text-gray-500">
                            {{ $breadcrumb->title }}
                        </span>
                    </div>
                </li>

            {{-- MIDDLE ITEMS --}}
            @else
                <li>
                    <div class="flex items-center space-x-1.5">

                        <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>

                        <a href="{{ $breadcrumb->url }}"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            {{ $breadcrumb->title }}
                        </a>
                    </div>
                </li>
            @endif

        @endforeach

    </ol>
</nav>
@endunless