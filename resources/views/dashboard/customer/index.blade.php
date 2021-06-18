@extends('dashboard.main')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Master Customer</h4>

                    </div>
                    <div class="pull-right">
                        <a href="{{route('customer.create')}}" class="btn btn-primary btn-sm scroll-click"  role="button">Tambah Customer</a>
                    </div>
                </div>
                @include('dashboard.include.alert')
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customer as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nama_lengkap}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="{{route('customer.edit',[$item->id])}}" class="btn btn-info">Edit</a>
                                    <button type="button"
                                        class="btn btn-danger deletedata" data-id="{{$item->id}}">Hapus</button></td>
                            </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>

            </div>


        </div>

    </div>
@endsection
@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function(){

    function ajax()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    $(document).on('click','.deletedata', function(){
        var id = $(this).data('id');

        swal({
            title: "Apa kamu yakin untuk menghapus data customer?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    ajax();
                    $.ajax({
                        url:"{{url('admin/customer/')}}/"+id,
                        method:"DELETE",
                        success:function(data){
                            if(data['message'] == "true"){
                                swal("Data customer berhasil dihapus!", {
                                    icon: "success",
                                    });
                               setTimeout(function(){ window.location.href = "{{route('customer.index')}}";},1500)
                            }
                        }
                    })


                }
        });

    })
})
</script>
@endpush
