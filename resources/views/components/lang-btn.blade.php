
<div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Language
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    @foreach (config('constant.languages') as $code => $render)
        <li>
           <form action="{{ route('setLanguage',$code) }}" method="POST">
            @csrf
             <button type="submit" class="dropdown-item">
             {!! $render['flag'] !!}
              {{$render['text']}}
            </button>
           </form>
        </li>
    @endforeach
  </ul>
</div>