<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Simplee Notes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
</head>

<body>
  <!-- Popup Add Data -->
  <div class="popup-box" id="addPopup">
    <div class="popup">
      <div class="content">
        <header>
          <p class="text-warning">Add a new Note</p>
          <i class="uil uil-times" onclick="closePopup('addPopup')"></i>
        </header>
        <form id="noteForm" action="{{ route('notes.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row title">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" spellcheck="false">
          </div>
          <div class="row description">
            <label for="content">Content</label>
            <textarea spellcheck="false" id="content" name="content"></textarea>
          </div>
          <button type="submit">Add Note</button>
        </form>
      </div>
    </div>
  </div>

  @foreach ($notes as $note)
  <!-- Popup Update for Each Note -->
  <div class="popup-box update-popup" id="updatePopup{{ $note->id }}">
    <div class="popup">
      <div class="content">
        <header>
          <p class="text-warning">Edit your Note</p>
          <i class="uil uil-times" onclick="closePopup('updatePopup{{ $note->id }}')"></i>
        </header>
        <form id="noteForm" action="{{ route('notes.update', $note->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="row title">
            <label for="updateTitle{{ $note->id }}">Title</label>
            <input type="text" id="updateTitle{{ $note->id }}" name="title" value="{{ $note->title }}" spellcheck="false">
          </div>
          <div class="row description">
            <label for="updateContent{{ $note->id }}">Content</label>
            <textarea spellcheck="false" id="updateContent{{ $note->id }}" name="content">{{ $note->content }}</textarea>
          </div>
          <button type="submit">Update Note</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  <!-- Header -->
  @include('page.part.header2')

  <!-- Content -->
  <div class="container-fluid container-fluid-custom pb-5 mb-5">
    <div class="row mb-4">
      <div class="col">
        <h1 class="name">Hey, {{ Auth::user()->name }}</h1>
      </div>
      <div class="col text-end delete-all">
        <form action="{{ route('notes.destroyAll') }}" method="post" onsubmit="return confirm('Are you sure you want to delete all notes? This action cannot be undone.')">
          @csrf
          @method('DELETE')
          <button class="btn btn-primary" type="submit">Delete All</button>
        </form>
      </div>
    </div>

    <div class="wrapper">
      <li class="add-box" onclick="showPopup('addPopup')">
        <div class="icon"><i class="uil uil-plus"></i></div>
        <p>Add new note</p>
      </li>
      @foreach ($notes as $note)
      <li class="note">
        <div class="details">
          <p>{{ $note->title }}</p>
          <span>{{ $note->content }}</span>
        </div>
        <div class="bottom-content">
          <span>{{ $note->created_at->format('M d, Y') }}</span>
          <div class="settings">
            <i class="uil uil-ellipsis-h" onclick="showMenu(this)"></i>
            <ul class="menu">
              <li>
                <a href="javascript:void(0);" onclick="updateNote('{{ $note->id }}', '{{ addslashes($note->title) }}', '{{ addslashes($note->content) }}')">
                  <i class="uil uil-pen"></i>Edit
                </a>
              </li>
              <li>
                <form action="{{ route('notes.destroy', $note->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this note?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"><i class="uil uil-trash"></i>Delete</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </li>
      @endforeach
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>