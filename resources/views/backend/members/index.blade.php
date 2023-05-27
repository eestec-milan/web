@extends('backend.layout')


@section('extra-css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="flex w-4/5 justify-right mx-20 ml-96 items-center h-1/2">
        <div class="bg-white p-6 mx-20 my-32 rounded-md w-full">
            <h2 class="text-base p-8 pt-6 md:text-4xl md:pt-10 font-bold">
                MEMBERS <br>
            </h2>
            <a href="{{route('member.create')}}" class="bg-green-600 rounded text-white text-sm font-semibold uppercase p-2 ml-8"><i class="fa-solid fa-plus"></i> Add</a>
            <table id="myTable">
                    <thead>
                    <tr>
                        <th class="w-1/3">Full name</th>
                        <th >Attendences out of {{$meetingCount}}</th>
                        <th >Consecutive absences</th>
                        <th class="w-1/3">Action</th>
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
                    url: '{{route('dashboard.admin.users')}}',
                    type: 'POST'
                },
                "initComplete": function(settings, json) {
                    var dropdownButtons = document.getElementsByClassName('dropdown-button');
                    var dropdownMenus = document.getElementsByClassName('dropdown-menu');

                    Array.from(dropdownButtons).forEach(function(button, index) {
                        button.addEventListener('click', function() {
                            var menu = dropdownMenus[index];
                            var expanded = this.getAttribute('aria-expanded');
                            this.setAttribute('aria-expanded', expanded === 'true' ? 'false' : 'true');
                            menu.classList.toggle('hidden');
                        });
                    });
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
                        url: '{{route('dashboard.admin.users')}}/' + id,
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        error: function (data) {

                        },
                        success: function (data) {
                            $('#myTable').DataTable().ajax.reload();
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
@endsection