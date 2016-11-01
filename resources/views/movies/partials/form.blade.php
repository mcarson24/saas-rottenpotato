{{ csrf_field() }}
<label for="title">Title</label>
<input type="text" name="title" value="{{ $movie->title ?? '' }}">
<label for="title">Rating</label>
<select name="rating" id="rating">
    @foreach ($ratings as $rating)
        @if (isset($movie))
            <option value="{{ $rating }}" {{ $movie->rating == $rating ? 'selected' : '' }}>{{ $rating }}</option>
        @else
            <option value="{{ $rating }}">{{ $rating }}</option>
        @endif
    @endforeach
</select>
<label for="release_date">Release Date</label>
<input type="date" name="release_date" value="{{ $movie->release_date ?? '' }}">
<button type="submit">{{ $buttonText }}</button>