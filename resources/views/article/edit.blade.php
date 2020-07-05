@extends('layouts.master')

@section('content')
<div class="card shadow mb-4 mx-auto" style="width: 80%;">
  <div class="card-body">
    <div class="card bg-light mb-2 border-0 text-center">
      <form action="{{ route('article.update', [$articles[0]->id])}}" method="POST">
        @method("PUT")
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" class="form-control" id="tittle" name="title" placeholder="Judul" value='{{$articles[0]->title}}')>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Isi</label>
            <textarea class="form-control" rows="3" placeholder="Isi Pertanyaan" id="content" name="content">{{$articles[0]->content}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag dipisahkan koma - satu, dua , tiga" value="{{$articles[0]->tag}}">
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-sm btn-success">Submit</button>
          <a href="{{route('article.index')}}" class="btn btn-sm btn-primary">Kembali</a>
        </div> 
      </form>
    </div>
    <div>
    </div>
  </div>
</div>
@endsection