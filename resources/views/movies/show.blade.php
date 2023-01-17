@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{$movie['poster_path']}}" alt="poster" class="w-96">
            <div class="md:ml-24">
                <h2 class="pt-3 md:pt-0 text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current w-4 text-orange-500 mt-0.5 ml-0.5" viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='32' height='32' stroke='none' fill='#000000' opacity='0'/>
                        <g transform="matrix(1.41 0 0 1.41 16 16)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -11.74)" d="M 12 18.091 L 16.969 21.09 C 17.753 21.563 18.720000000000002 20.86 18.512 19.969 L 17.193 14.316000000000003 L 21.584000000000003 10.512000000000002 C 22.276000000000003 9.913000000000002 21.906000000000002 8.776000000000002 20.994000000000003 8.699000000000002 L 15.214000000000002 8.209000000000001 L 12.953000000000003 2.8740000000000014 C 12.596000000000004 2.0330000000000013 11.404000000000003 2.0330000000000013 11.047000000000002 2.8740000000000014 L 8.786 8.209 L 3.0059999999999993 8.699 C 2.0939999999999994 8.776 1.7239999999999993 9.913 2.4159999999999995 10.512 L 6.8069999999999995 14.316 L 5.4879999999999995 19.969 C 5.279999999999999 20.86 6.247 21.563000000000002 7.031 21.09 L 12 18.091 z" stroke-linecap="round" />
                        </g>
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span> {{$movie['genres']}} </span>
                </div>
                <p class="text-gray-300 mt-8 text-justify">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movie['crew'] as $crew)
                            @if($loop->index < 2)
                                <div class="pr-8"> 
                                    <div>{{$crew['name']}}</div>
                                    <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{ open: false }">
                    <div class="mt-12">
                        @if($movie['videos']['results'])
                            <button 
                                @click="open = true"
                                class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                                <svg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='32' height='32' stroke='none' fill='#000000' opacity='0'/>
                                    <g transform="matrix(1.4 0 0 1.4 16 16)" >
                                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 12 2 C 6.477 2 2 6.477 2 12 C 2 17.523 6.477 22 12 22 C 17.523 22 22 17.523 22 12 C 22 6.477 17.523 2 12 2 z M 12 4 C 16.411 4 20 7.589 20 12 C 20 16.411 16.411 20 12 20 C 7.589 20 4 16.411 4 12 C 4 7.589 7.589 4 12 4 z M 10 7.5 L 10 16.5 L 16 12 L 10 7.5 z" stroke-linecap="round" />
                                    </g>
                                </svg>
                                <span class="pl-2">Play Trailer</span>
                            </button>
    
                            <template x-if="open">
                                <div
                                    style="background-color: rgba(0, 0, 0, .5);"
                                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                >
                                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                        <div class="bg-gray-900 rounded">
                                            <div class="flex justify-end pr-4 pt-2">
                                                <button
                                                    @click="open = false"
                                                    @keydown.escape.window="open = false"
                                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body px-8 py-8">
                                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                    <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="movie-cast border-t border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach($movie['cast'] as $cast)
                        <div class="mt-8">
                            <a href={{route('actors.show', $cast['id'])}}>
                                <img class="hover:opacity-75 transition ease-in-out duration-150" src="https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}" alt="">
                            </a>
                            <div class="mt-2">
                                <a href={{route('actors.show', $cast['id'])}} class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                                <div class="flex item-center text-gray-400 text-sm ">
                                    {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="movie-images" x-data="{ open: false, image: ''}">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($movie['images'] as $image)
                            <div class="mt-8">
                                <a
                                    @click.prevent="
                                        open = true
                                        image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                                    "
                                    href="#"
                                >
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                    @endforeach
                </div>
    
                <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    x-show="open"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                    @click="open = false"
                                    @keydown.escape.window="open = false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="poster">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection