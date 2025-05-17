<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            color: #22223b;
            padding: 20px;
            min-height: 100vh;
        }
        h1 {
            color: #3a0ca3;
            margin-bottom: 24px;
            letter-spacing: 1px;
            font-weight: 700;
        }
        form {
            background: #fff;
            padding: 28px 32px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(58,12,163,0.08), 0 1.5px 6px rgba(58,12,163,0.04);
            max-width: 500px;
            margin-bottom: 48px;
            border: 1.5px solid #e0e7ff;
        }
        label {
            font-weight: 600;
            margin-bottom: 7px;
            display: block;
            color: #3a0ca3;
            letter-spacing: 0.2px;
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
        a {
            text-decoration: none;
            color: #3a0ca3;
            font-weight: 500;
            transition: color 0.2s;
        }
        a:hover {
            text-decoration: underline;
            color: #4361ee;
        }
        @media (max-width: 700px) {
            form { max-width: 100%; }
            input, button { width: 100%; }
        }
    </style>
</head>
<body>
    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" required>

        <label for="author">Author</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" required>

        <label for="genre">Genre</label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}" required>

        <label for="year">Published Year</label>
        <input type="number" name="year" value="{{ old('year', $book->published_year) }}" required>

        <label for="cover">Cover Photo (Optional)</label>
        <input type="file" name="cover">

        <button type="submit">Update Book</button>
    </form>

    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>
