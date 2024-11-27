@extends("layouts.main")

@section('title')
Create 
@endsection

@section('content')
<form action="{{ route('post.store') }}" method="post">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input value="{{old('title')}}" type="text" class="form-control" name="title">
    @error('title')
    <p class='text-danger'>{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <input value="{{old('post_content')}}" type="text" class="form-control" name="post_content">
    @error('post_content')
    <p class='text-danger'>{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input value="{{old('image')}}" type="text" class="form-control" name="image">
    @error('image')
    <p class='text-danger'>{{ $message }}</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select id="category" class="form-select" name="category_id">
      @foreach($categories as $category)
        <option {{old('category_id') == $category->id ? 'selected' : ''}}
        value='{{$category->id}}'>{{ $category->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <select multiple id="tags" class="form-select" name="tags[]">
      @foreach($tags as $tag)
        <option value='{{$tag->id}}'>{{ $tag->title }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection