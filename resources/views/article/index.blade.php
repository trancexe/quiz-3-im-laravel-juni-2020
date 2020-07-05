@extends('layouts.master')

@section('content')
<div class="card shadow mb-4 mx-auto" style="width: 80%;">
    <div class="card-header pb-0">
        <p class='d-flex align-content-center mb-0'>
            <button type="sumbit" class="btn float-right shadow-none" value="Trash">
              <a class="" href="{{ route('article.create')}}">
                <i class="fa fa-edit"></i>
                Tulis Artikel
              </a>
            </button>
          </p>
    </div>
    <div class="card-body">
        @foreach($articles as $article)
        <div class="card bg-light mb-2 border-0 text-center">
            <div class="card-header border-0">
                <h3><b>{{ $article->title }}</b></h3>
            </div>
            <div class="card-body">
              <p>
                {{ $article->content }}
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
                      <p class='float-right'>
                        <button type="sumbit" class="btn float-right shadow-none" value="Trash">
                          <a class="" href="{{ route('article.show',$article->id)}}">
                            <i class="fas fa-eye"></i>
                          </a>
                        </button>
                      </p>
            </div>
        </div>
        <div>
        </div>
        @endforeach
        {{$articles->links()}}
    </div>
  </div>
@endsection

@push('scripts')
<script>
  Swal.fire({
      title: 'Berhasil!',
      text: 'Memasangkan script sweet alert',
      icon: 'success',
      confirmButtonText: 'Cool'
  })
</script>
@endpush