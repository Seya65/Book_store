<!-- resources/views/books/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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
        a[href*="create"] {
            display: inline-block;
            background: linear-gradient(90deg, #3a0ca3 0%, #4361ee 100%);
            color: #fff;
            padding: 10px 22px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(67,97,238,0.08);
            transition: background 0.3s, transform 0.2s;
        }
        a[href*="create"]:hover {
            background: linear-gradient(90deg, #4361ee 0%, #3a0ca3 100%);
            transform: translateY(-2px) scale(1.03);
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
            height: 80px;
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
        button, input[type="submit"] {
            background: linear-gradient(90deg, #3a0ca3 0%, #4361ee 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(67,97,238,0.08);
            transition: background 0.3s, transform 0.2s;
        }
        button:hover, input[type="submit"]:hover {
            background: linear-gradient(90deg, #4361ee 0%, #3a0ca3 100%);
            transform: translateY(-2px) scale(1.03);
        }
        @media (max-width: 700px) {
            table, th, td { font-size: 14px; padding: 8px; }
            img { height: 50px; }
        }
    </style>
</head>
<body>

    <h1>All Books</h1>
    <a href="{{ route('books.create') }}">Create New Book</a>

    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Cover</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" width="100">
                        @else
                            No cover image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                        <a href="{{ route('books.destroy', $book->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
