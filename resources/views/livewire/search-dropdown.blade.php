<div class="relative mt-3 md:mt-0" x-data="{ open: true }" @click.outside="open = false">
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class=" bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:ring-1 focus:ring-sky-500" 
        placeholder="Search"
        x-ref="search"
        @keydown.window="
            if(event.key === '/'){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @click="open = true"
        @keydown="open = true"
        @keydown.escape.window="open = false"
    >
    <div class="div absolute top-0 flex">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='32' height='32' stroke='none' fill='#000000' opacity='0'/>
            <g transform="matrix(0.64 0 0 0.64 16 16)" >
            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill-rule: nonzero; opacity: 1;" transform=" translate(-25.31, -24.81)" d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z" stroke-linecap="round" />
            </g>
        </svg>
    </div>

    <div wire:loading class="div absolute top-0 right-2 flex">
        <svg aria-hidden="true" class="w-4 h-4 mt-2 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>

    <div class="absolute bg-gray-800 rounded w-64 mt-4" x-show.transition.opacity="open">
        @if (strlen($search) >= 2)
            @foreach ($searchResults as $result)
                @if($loop->index < $num_dropdown)
                    <ul>
                        <li class="border-b border-gray-700">
                            <a 
                                href={{ route('movies.show', $result['id']) }} 
                                class="text-sm hover:bg-gray-700 px-3 py-3 flex items-center trastition ease-in-out duration-150"
                                @if ($loop->index >= $num_dropdown-1)
                                    @keydown.tab="open=false"
                                @endif
                            >
                                <img class="w-8" src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="">
                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    </ul>
                @endif        
            @endforeach
            @if(count($searchResults) < 1)
                <ul>
                    <li class="border-b border-gray-700">
                        <a href='#' class="text-sm block hover:bg-gray-700 px-3 py-3">No result for "{{ $search }}"</a>
                    </li>
                </ul>
            @endif
        @endif
    </div>
</div>

