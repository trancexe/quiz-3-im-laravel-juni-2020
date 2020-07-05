@extends('layouts.master')

@section('content')
<div class="card shadow mb-4 mx-auto" style="width: 80%;">
    <div class="card-body">
        <div class="card bg-light mb-2 border-0">
            <div class="card-body">
              <p>
                <h3>Judul: {{ $articles->title }}</h3>
                <p>
                    slug: {{ $articles->slug }}
                </p>
                <p>
                   {{ $articles->content }}
                </p>
                <p>
                    @foreach ($articles->tag as $key => $value)
                <input type="" class="btn btn-sm btn-success" value="{{$value}}">
                    @endforeach
                 </p>
              </p>
            </div>
            <div class="card-footer p-0">
                <form
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Move book to trash?')"
                      action="{{route('article.destroy', [$articles->id])}}"
                      >@csrf
                      <input
                      type="hidden"
                      value="DELETE"
                      name="_method">
                      <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                        <a class="" href="{{ route('article.index', [$articles->id  ])}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </button>
                      </form>
                      <p class='float-right'>
                        <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                          <a class="" href="{{ route('article.edit',$articles->id)}}">
                            <i class="fas fa-edit"></i>
                          </a>
                        </button>
                      </p>
                      <p class='float-right'>
                        <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                          <a class="" href="{{route('article.index')}}">
                            <i class="fas fa-arrow-left"></i>
                          </a>
                        </button>
                      </p>
            </div>
        </div>
        <div>
        </div>

    </div>
</div>
@endsection