@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-8">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold"> Actor and Actress</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-20">
                @foreach($popularActors as $actor)
                    <div class="actor mt-8 ">
                        <a href={{route('actors.show', $actor['id'])}}>
                            <img src={{$actor['profile_path']}} alt="">
                        </a>
                        <div class="mt-2">
                            <a href={{route('actors.show', $actor['id'])}} class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                            <div class="text-sm truncate text-gray-400">{{$actor['known_for']}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
                        
            <div class="flex justify-center mt-16 mb-20">
                @if ($previous)
                    <a href="/actors/page/{{ $previous }}">Prev</a>
                @endif
                @if ($next)
                    <a href="/actors/page/{{ $next }}">Next</a>
                @endif
                
            </div> 
            <div class="flex justify-center mt-16 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px">
                    <li>
                        <a href="/actors/page/{{ $previous }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    @if($page > 500-5)
                        @for ($i = 500-5; $i <= 500; $i++)
                            <li>
                                <a href="/actors/page/{{ $i }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$i}}</a>
                            </li>
                        @endfor                        
                    @else
                        @for ($i = $page; $i < $page+6; $i++)
                            <li>
                                <a href="/actors/page/{{ $i }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$i}}</a>
                            </li>
                        @endfor
                    @endif
                    <li>
                        <a href="/actors/page/{{ $next }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                    </ul>
                </nav>
            </div> 
            
           
            
        </div>
    </div>
    <script>
        const bottomVisible = () =>
        window.clientHeight + window.scrollY >=(document.documentElement.scrollHeight || window.clientHeight);
        console.log(bottomVisible());
        document.getElementById("bottom").innerHTML += bottomVisible()
     </script>
@endsection

