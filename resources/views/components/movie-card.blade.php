<div>
    <div class="mt-8">
        <a href= {{ route('movies.show', $movie['id']) }}>
            <img class="hover:opacity-75 transition ease-in-out duration-150" src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="">
        </a>
        <div class="mt-2">
            <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $movie['title'] }}</a>
            <div class="flex item-center text-gray-400 text-sm mt-1">
                <svg class="fill-current w-4 text-orange-500 mt-0.5 ml-0.5" viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='32' height='32' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1.41 0 0 1.41 16 16)" >
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -11.74)" d="M 12 18.091 L 16.969 21.09 C 17.753 21.563 18.720000000000002 20.86 18.512 19.969 L 17.193 14.316000000000003 L 21.584000000000003 10.512000000000002 C 22.276000000000003 9.913000000000002 21.906000000000002 8.776000000000002 20.994000000000003 8.699000000000002 L 15.214000000000002 8.209000000000001 L 12.953000000000003 2.8740000000000014 C 12.596000000000004 2.0330000000000013 11.404000000000003 2.0330000000000013 11.047000000000002 2.8740000000000014 L 8.786 8.209 L 3.0059999999999993 8.699 C 2.0939999999999994 8.776 1.7239999999999993 9.913 2.4159999999999995 10.512 L 6.8069999999999995 14.316 L 5.4879999999999995 19.969 C 5.279999999999999 20.86 6.247 21.563000000000002 7.031 21.09 L 12 18.091 z" stroke-linecap="round" />
                    </g>
                </svg>
                <span class="ml-1">{{ $movie['vote_average'] * 10}}%</span>
                <span class="mx-2">|</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
            </div>
            <div class="text-gray-400 text-sm">
                @foreach ($movie['genre_ids'] as $genre)
                    {{ $genres[$genre] }}@if (!$loop->last), @endif
                @endforeach
            </div>
        </div>
    </div>
</div>