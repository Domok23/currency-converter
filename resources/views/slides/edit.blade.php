<!DOCTYPE html>
<html>
<head>
    <title>Edit Slide</title>
</head>
<body>
    <h1>Edit Slide</h1>
    <form action="{{ route('slides.update', $slide->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $slide->title }}" required>
        <label>Embed Link:</label>
        <input type="text" name="embed_link" value="{{ $slide->embed_link }}" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
