@extends('layouts.master')

@section('content')
<div class="card shadow mb-4 mx-auto" style="width: 80%;">
    <div class="card-body">
        @foreach($articles as $article)
        <div class="card bg-light mb-2 border-0">
            <div class="card-body">
              <p>
                <h3>Judul: {{ $article->title }}</h3>
                <p>
                    slug: {{ $article->slug }}
                </p>
                <p>
                   {{ $article->content }}
                </p>
                <p>
                    {{ $article->tag }}
                 </p>
              </p>
            </div>
            <div class="card-footer p-0">
                <form
                      method="POST"
                      class="d-inline"
                      onsubmit="return confirm('Move book to trash?')"
                      action="{{route('article.destroy', [$article->id])}}"
                      >@csrf
                      <input
                      type="hidden"
                      value="DELETE"
                      name="_method">
                      <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                        <a class="" href="{{ route('article.index', [$article->id  ])}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </button>
                      </form>
                      <p class='float-right'>
                        <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                          <a class="" href="{{ route('article.edit',$article->id)}}">
                            <i class="fas fa-edit"></i>
                          </a>
                        </button>
                      </p>
            </div>
        </div>
        <div>
        </div>
        @endforeach

    </div>
</div>
@endsection