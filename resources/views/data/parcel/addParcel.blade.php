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

                <form action="{{ route('parcel.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="parcel_id" class="form-label">Parcel ID</label>
                        <input type="text" class="form-control" id="parcel_id" name="parcel_id" value="{{ old('parcel_id') }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="parcelName" class="form-label">Parcel Name</label>
                        <input type="text" class="form-control" id="parcelName" name="parcelName" value="{{ old('parcelName') }}">
                    </div>
                    <div class="mb-3">
                        <label for="parcelOccupant" class="form-label">Parcel Occupant</label>
                        <select class="form-select" id="parcelOccupant" name="parcelOccupant" placeholder="select">
                            <option value=""></option>
                            @foreach ($residents_table as $val)
                                <option value="{{ $val['id_resident'] }}" @if (old('parcelOccupant') == $val['id_resident']) selected @endif>
                                    {{ $val['resident_name'] }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="keywordTag" class="form-label">Tag</label>
                        <input type="text" id="multiSelectTag" name="multiSelectTag" value="[{{ implode(',', old('multiSelectTag', [])) }}]" />
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
