@extends("layouts.main")

@section('title')
Edit 
@endsection

@section('content')
<form action="{{ route('admin.post.update', $post->id) }}" method="post">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" value="{{ $post->title }}" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <input type="text" class="form-control" value="{{ $post->post_content }}" name="post_content">
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="text" class="form-control" value="{{ $post->image }}" name="image">
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select id="category" class="form-select" name="category_id">
      @foreach($categories as $category)
        <option 
          {{$category->id === $post->category->id ? 'selected': ''}}
       value='{{$category->id}}'>{{ $category->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <select multiple id="tags" class="form-select" name="tags[]">
      @foreach($tags as $tag)
        <option 
          @foreach ($post->tags as $postTag)
          {{$tag->id === $postTag->id ? 'selected' : ''}}
          @endforeach
        value='{{$tag->id}}'>{{ $tag->title }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection