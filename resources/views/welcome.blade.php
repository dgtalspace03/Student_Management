<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Welcome') }} - {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
 

    @fonts

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

    <x-app.nav-bar />
   <div class="d-flex container align-items-center justify-content-between mt-5">
   <h2 class="h2">{{__('home.all_courses')}}</h2>
   <div class="d-flex align-items-center justify-content-center gap-3">
    <input type="text" class="form-control" placeholder="Search Course">
    <select name="" id="" class="form-control">
        <option value="all">All</option>
        <option value="academic">Academic</option>
        <option value="skill">Skill</option>
    </select>
   </div>
   </div>
    <div class="container d-flex align-items-center gap-3 flex-wrap mt-3">
        @foreach (config('constant.courses') as $course)
         {{-- @php
        dd($course);
    @endphp --}}
            <x-app.course-card
             title="{{ $course['title'] }}"
              description="{{ $course['description']}}"
               img="{{$course['img']}}"
               price="{{ $course['price'] }}"
               category="{{ $course['category'] }}"
               enrolled="{{ $course['enrolled'] }}" />
        @endforeach
    </div>
</body>

</html>
