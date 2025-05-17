<!DOCTYPE html>
<html>
<head>
    <title>Book Manager</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            color: #22223b;
            padding: 20px;
            min-height: 100vh;
        }
        h2 {
            color: #3a0ca3;
            margin-bottom: 20px;
            letter-spacing: 1px;
            font-weight: 700;
        }
        form {
            background: #fff;
            padding: 28px 32px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(58,12,163,0.08), 0 1.5px 6px rgba(58,12,163,0.04);
            max-width: 600px;
            margin-bottom: 48px;
            border: 1.5px solid #e0e7ff;
        }
        input, button {
            width: 94%;
            padding: 13px 16px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1.5px solid #bdb2ff;
            font-size: 17px;
            background: #f8fafc;
            transition: border 0.2s, box-shadow 0.2s;
        }
        input:focus {
            border-color: #3a0ca3;
            outline: none;
            box-shadow: 0 0 0 2px #bdb2ff44;
        }
        button {
            background: linear-gradient(90deg, #3a0ca3 0%, #4361ee 100%);
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(67,97,238,0.08);
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: linear-gradient(90deg, #4361ee 0%, #3a0ca3 100%);
            transform: translateY(-2px) scale(1.03);
        }
        label {
            font-weight: 600;
            margin-bottom: 7px;
            display: block;
            color: #3a0ca3;
            letter-spacing: 0.2px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: #fff;
            box-shadow: 0 4px 18px rgba(67,97,238,0.06);
            border-radius: 16px;
            overflow: hidden;
        }
        th {
            background: linear-gradient(90deg, #3a0ca3 0%, #4361ee 100%);
            color: white;
            padding: 16px;
            text-align: left;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        td {
            padding: 16px;
            border-top: 1px solid #e0e7ff;
            vertical-align: middle;
        }
        tr:hover {
            background-color: #e0e7ff44;
            transition: background 0.2s;
        }
        img {
            height: 100px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(67,97,238,0.10);
            transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
        }
        img:hover {
            transform: scale(1.08) rotate(-2deg);
            box-shadow: 0 6px 24px rgba(67,97,238,0.18);
        }
        a {
            text-decoration: none;
            margin-right: 12px;
            color: #3a0ca3;
            font-weight: 500;
            transition: color 0.2s;
        }
        a:hover {
            text-decoration: underline;
            color: #4361ee;
        }
        @media (max-width: 700px) {
            form, table { max-width: 100%; }
            th, td { padding: 10px; }
            input, button { width: 100%; }
        }
    </style>
</head>
<body>

<h2>{{ $editMode ? 'Edit Book' : 'Add a New Book' }}</h2>

<form method="POST" enctype="multipart/form-data" action="{{ $editMode ? route('books.update', $editBook->id) : route('books.store') }}">
    @csrf
    @if($editMode) @method('PUT') @endif

    <label>Title</label>
    <input name="title" value="{{ old('title', $editBook->title ?? '') }}" required>

    <label>Author</label>
    <input name="author" value="{{ old('author', $editBook->author ?? '') }}" required>

    <label>Genre</label>
    <input name="genre" value="{{ old('genre', $editBook->genre ?? '') }}" required>

    <label>Year</label>
    <input name="year" type="number" value="{{ old('year', $editBook->published_year ?? '') }}" required>

    <label>Cover Image {{ $editMode ? '(leave blank to keep existing)' : '' }}</label>
    <input type="file" name="cover" accept=".jpg,.jpeg,.png" {{ $editMode ? '' : 'required' }}>

    <button type="submit">{{ $editMode ? 'Update Book' : 'Add Book' }}</button>
</form>

<h2>All Books</h2>
<table>
    <tr>
        <th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Cover</th><th>Actions</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->genre }}</td>
        <td>{{ $book->published_year }}</td>
        <td>
            @if ($book->cover_photo)
                <img src="{{ asset($book->cover_photo) }}" alt="Cover">
            @else
                No cover
            @endif
        </td>
        <td>
            <a href="{{ route('books.edit', $book->id) }}">✏️ Edit</a>
           
                
<form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display:inline;" onsubmit="return confirm('Delete this book?')" width="20px">
    @csrf
    @method('DELETE')
    <button type="submit" style="border:none; background:none; width:70px; height:16px;color:#3498db; cursor:pointer;">🗑 Delete</button>
</form>



            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
