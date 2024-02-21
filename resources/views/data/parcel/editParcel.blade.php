<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    @include('component.styleGeneral')

    <style>

    </style>

    <title>Parcel Data</title>
</head>

<body>
    <!-- HEADER -->
    @include('component.header_dashboard')

    <main>
        <div class="container ">
            <div class="row justify-content-center  m-2 p-3">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @php
                    $tags = json_decode($parcel_table['tag'], true);
                    $tag = implode(', ', array_map(fn($value) => $value['id_keyword'], $tags));
                @endphp

                <form action="{{ route('parcel.update', ['parcel_id' => $parcel_table['parcel_id']]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="ObjectID" class="form-label">Object ID</label>
                        <input type="text" class="form-control" id="ObjectID" name="ObjectID" autocomplete="off" value="{{ $parcel_table['id'] }}" disabled required>
                    </div>

                    <div class="mb-3">
                        <label for="parcelIdNew" class="form-label">Parcel ID</label>
                        <input type="hidden" class="form-control" id="parcelId" name="parcelId" autocomplete="off" value="{{ $parcel_table['parcel_id'] }}" required>
                        <input type="text" class="form-control" id="parcelIdNew" name="parcelIdNew" autocomplete="off" value="{{ $parcel_table['parcel_id'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="parcelName" class="form-label">Parcel Name</label>
                        <input type="text" class="form-control" id="parcelName" name="parcelName" autocomplete="off" value="{{ $parcel_table['parcel_name'] }}">
                    </div>

                    <div class="mb-3">
                        <label for="parcelOccupant" class="form-label">Parcel Occupant</label>
                        <select class="form-select form-select" id="parcelOccupant" name="parcelOccupant" placeholder="select">
                            <option value=""></option>
                            @foreach ($residents_table as $val)
                                <option value="{{ $val['id_resident'] }}" {{ $val['id_resident'] == $parcel_table['parcel_occupant'] ? 'selected' : '' }}>
                                    {{ $val['resident_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keywordTag" class="form-label">Tag</label>
                        <input type="text" id="multiSelectTag" name="multiSelectTag" value="[{{ $tag }}]" />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    @include('component.scriptGeneral')

    <script>
        $(document).ready(function() {
            const tagData = [
                <?php foreach ($uri_table as $row) : ?> {
                    id: <?= $row['id_keyword'] ?>,
                    name: '<?= $row['word_name'] ?>'
                },
                <?php endforeach ?>
            ];
            $('#multiSelectTag').magicSuggest({
                data: tagData,
                allowFreeEntries: false, // Set true if you want to allow free text entries
                maxSelection: null, // Set to null to remove the limit
                noSuggestionText: 'No suggestions',
                placeholder: 'Type or click here',
            });
        });
    </script>



</body>

</html>
