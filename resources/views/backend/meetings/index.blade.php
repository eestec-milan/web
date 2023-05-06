@extends('backend.layout')


@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('content')
    <div class="flex w-4/5 justify-right mx-20 ml-96 items-center h-1/2">
        <div class="bg-white p-6 mx-20 my-32 rounded-md w-full">
            <h2 class="text-base p-8 pt-6 md:text-4xl md:pt-10 mb-4 font-bold">
                MEETINGS
            </h2>
            <button class="bg-black rounded text-white text-sm font-semibold uppercase p-2"><i class="fa-solid fa-plus"></i>Add</button>
            <table id="myTable">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                serverSide: true,
                ordering: false,
                lengthChange:false,
                pageLength: 5,
                language: {
                    search: "",
                    searchPlaceholder: "Search..."
                },
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route('dashboard.admin.meetings')}}',
                    type: 'POST'
                }
            } );
        });
        function deleteConfirm(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{route('dashboard.admin.meetings')}}/' + id,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        error: function (data) {

                        },
                        success: function (data) {
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }

        function showQR(link)
        {
            Swal.fire({
                title: 'QR code meeting',
                html: "<a class='text-red font-bold' href='"+link+"' download>Download QR</a>",
                imageUrl: link,
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Custom image',
            })
        }
    </script>

    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
@endsection