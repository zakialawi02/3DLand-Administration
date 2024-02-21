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
        <div class="container">
            <div class="row justify-content-center  m-2 p-3">
                <div class="row gap-2 ">

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

                    <div class="col-md-6">
                        <a href="{{ route('parcel.create') }}" class="btn btn-primary">Add Parcel Data</a>
                    </div>
                    <div class="row p-3 m-2">
                        <div class="col-md-12">
                            <table id="datatable" class="table table-bordered table-striped table-hover" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ObjectID</th>
                                        <th scope="col">Parcel id</th>
                                        <th scope="col">Parcel Name</th>
                                        <th scope="col">Parcel Occupant</th>
                                        <th scope="col">Tag</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $row) : ?>
                                    <?php $tags = json_decode($row['tag'], true); ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['parcel_id'] ?></td>
                                        <td><?= $row['parcel_name'] ?></td>
                                        <td><?= $row['resident_name'] ?? '-' ?></td>
                                        <td>
                                            <?php foreach ($tags as $tag) : ?>
                                            <span class="badge rounded-pill bg-secondary"> <?= $tag['word_name'] ?></span>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row gap-1">
                                                <a href="{{ route('parcel.edit', ['parcel_id' => $row['parcel_id']]) }}" class="btn xs-btn btn-secondary bi bi-pencil-square"></a>
                                                <form id="delete-{{ $row['parcel_id'] }}" action="{{ route('parcel.delete', ['parcel_id' => $row['parcel_id']]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="asbn btn btn-danger bi bi-trash delete-btn" data-id="{{ $row['parcel_id'] }}"></button>
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

    @include('component.scriptGeneral')

    <script>
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            const userId = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-' + userId).submit();
                }
            });
        });

        const datatable = new DataTable('#datatable');
    </script>


</body>

</html>
