@extends('frontend.user.main')

@section('contentuser')
@include('dashboard.include.alert')
<h3 class="text-center">Tambah Alamat</h3>
<form method="POST" action="{{route('address.update',[$add->id])}}">
    @csrf
    @method('put')
    <input type="hidden" name="input_kota" id="input_kota">
    <input type="hidden" name="input_provinsi" id="input_provinsi">
    <div class="row">

        <div class="col-md-6">

            <div>
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" required id="alamat" name="alamat" value="{{$add->alamat}}">
            </div>
            <div>
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi" name="provinsi">
                    <option value="0">Pilih Provinsi</option>

                </select>
            </div>
            <div>
                <label for="kota">Kota</label>
                <select class="form-control" id="kota" name="kota">
                    <option value="0">Pilih kota</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <label for="kode_pos">Kode Pos</label>
                <input type="text" class="form-control" required id="kode_pos" name="kode_pos" value="{{$add->kode_pos}}">
            </div>
            <div>
                <label for="nomor_hp">Nomor Telepon</label>
                <input type="text" class="form-control" required id="nomor_hp" name="nomor_hp" value="{{$add->nomor_telepon}}">
            </div>
            <div>
                <label for="utama">Utama</label>
                <select class="form-control" id="utama" name="utama">
                    <option value="1" @if($add->utama == 1) selected @endif>Ya</option>
                    <option value="0" @if($add->utama == 0) selected @endif>Tidak</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </div>
    </div>
</form>


@endsection
@push('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#provinsi').select2()
        $('#kota').select2()

        var provinsi = "{{$add->provinsi}}";
        var kota = "{{$add->kota}}";
        var id_provinsi = 0;
        $.ajax({
            url:"https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            method:"GET",
            async:false,
            success:function(data){
                data = data['provinsi']
                data.forEach(element => {
                    if(provinsi ==element['nama']){
                        id_provinsi = element['id']
                        $('#provinsi').append('<option value="'+element['id']+'" selected>'+element['nama']+'</option>')
                    }else{
                        $('#provinsi').append('<option value="'+element['id']+'">'+element['nama']+'</option>')
                    }

                });
            }
        })


        $.ajax({
            url:"https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id_provinsi,
            method:"GET",
            success:function(data){
                data = data['kota_kabupaten']
                data.forEach(element => {
                    if(kota ==element['nama']){
                        $('#kota').append('<option value="'+element['id']+'" selected>'+element['nama']+'</option>')
                    }else{
                        $('#kota').append('<option value="'+element['id']+'">'+element['nama']+'</option>')
                    }

                });
            }
        })


        $('#provinsi').on('change', function () {
            var id = $(this).val()
            var nama = $(this).find(':selected').text()
            $("#kota").empty()
            $.ajax({
                url:"https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id,
                method:"GET",
                success:function(data){
                    $('#input_provinsi').val(nama)
                    $('#kota').append('<option value="0">Pilih kota</option>')
                    data = data['kota_kabupaten']
                    data.forEach(element => {
                        $('#kota').append('<option value="'+element['id']+'">'+element['nama']+'</option>')
                    });
                }
            })
         })

         $('#input_provinsi').val(provinsi)
         $('#input_kota').val(kota)
         $('#kota').on('change', function () {
             var nama = $(this).find(':selected').text()
             $('#input_kota').val(nama)
          })
     })
</script>

@endpush
