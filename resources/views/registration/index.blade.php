@extends('layouts.home')
@section('title_page','Data Pembayaran Pendaftaran Santri')
@section('content')

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                /*display: block;*/
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                /*display: block;*/
                text-align: center;
            }
        }
    </style>

    @if (Session::has('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('registration.create') }}" class="btn btn-primary">Bayar Pendaftaran</a><br><br>
        </div>
        <div class="col-md-4 mb-3">
            <form action="#" class="flex-sm">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary mr-2 rounded-right" type="submit"><i class="fas fa-search"></i></button>
                        <button onclick="window.location.href='{{ route('registration.index') }}'" type="button" class="btn btn-md btn-secondary rounded"><i class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th width="13%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $regist => $result)
                    <tr>
                        <td>{{ $regist + $data->firstitem() }}</td>
                        <td><a href="{{ route('santri.show',$result->santris->id) }}" target="blank">{{ $result->santris->name }}</a></td>
                        <td>{{ $result->santris->address }}</td>
                        <td>
                            @if($result->orders->payment_status == 1)
                                <span class="badge badge-warning">{{ $result->status }}</span>
                            @elseif($result->orders->payment_status == 2)
                                <span class="badge badge-success">{{ $result->status }}</span>
                            @else
                                <span class="badge badge-danger">Failed</span>
                            @endif
                        </td>
                        <td align="center">
                            @if ($result->orders->payment_status == 2)
                                <a href="{{ route('registration.print', $result->id) }}" type="button" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                            @endif
                                @if ($result->orders->payment_status == 1)
                                    <a href="javascript:void(0)" type="button" class="btn btn-sm btn-warning" id="pay-button" onclick="getSnapToken('{{$result->id}}')" data-id="{{$result->id}}" data-name="{{$regist + $data->firstitem()}}"
                                       data-pembangunan="{{number_format($result->construction,2,',','.')}}"
                                       data-fasilitas="{{number_format($result->facilities,2,',','.')}}"
                                       data-almari="{{number_format($result->wardrobe,2,',','.')}}"
                                       data-namasantri="{{$result->santris->name}}"
                                       data-total="{{number_format($result->construction+$result->facilities+$result->wardrobe, 2, ',', '.')}}"
                                       data-toggle="modal" data-target="#paymentModal"><i class="fa fa-credit-card"></i></a>
                                @endif
                            @if (Auth::user()->role == 'Administrator')
                                @if($result->orders->payment_status != 2)
                                    <a href="javascript:void(0)" id="btn-delete" class="btn btn-sm btn-danger" onclick="deleteData('{{ $result->id }}')" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-2 float-left">
        <span class="ml-3">Data Keseluruhan: <span class="text-primary font-weight-bold">{{ DB::table('registration_costs')->count() }}</span> Pembayaran pendaftar baru telah terdaftar.</span>
    </div>
    <div class="mt-3 float-right">
        {{ $data->links() }}
    </div>

@endsection

@section('modal')
    <div class="modal fade" id="paymentModal" tabindex="1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="javascript:void(0)" id="payForm" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Rincian Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="invoice-box">
                            <p>Biaya Pendaftaran <span id="reg-name"></p>
                            <table>
                                <tr class="heading">
                                    <td>Item</td>

                                    <td>Biaya</td>
                                </tr>

                                <tr class="item">
                                    <td>Pembangunan </span>
                                    <td>Rp. <span id="reg-pembangunan"></span></td>
                                </tr>
                                <tr>
                                    <td>Fasilitas </span>
                                    <td>Rp. <span id="reg-fasilitas"></span></td>
                                </tr>
                                <tr>
                                    <td>Alokasi Almari </span>
                                    <td>Rp. <span id="reg-almari"></span></td>
                                </tr>

                                <tr class="total">
                                    <td></td>
                                    <td>Total: Rp. <span id="reg-tot"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="pay-reg" class="btn btn-info" disabled>Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="javascript:void(0)" id="deleteForm" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="vcenter">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" onclick="formSubmit()" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        var snaptoken;
        var regcost_id
        $(document).on("click", "#pay-button", function () {
            regcost_id = $(this).data('id');
            var total = $(this).data('total');
            var name = $(this).data('namasantri');
            var pembangunan = $(this).data('pembangunan');
            var fasilitas = $(this).data('fasilitas');
            var almari = $(this).data('almari');
            $("#reg-name").empty().append(name);
            $("#reg-tot").empty().append(total);
            $("#reg-pembangunan").empty().append(pembangunan);
            $("#reg-fasilitas").empty().append(fasilitas);
            $("#reg-almari").empty().append(almari);
        });

        var request;
        function getSnapToken(id) {
            request = $.ajax({
                url: 'http://127.0.0.1:8000/api/v1/order-regcost',
                type: "post",
                data: {id:id}
            });
            request.done(function (response, textStatus, jqXHR){
                console.log(response.data)
                snaptoken = response.data.token
                $('#pay-reg').attr('onClick', "payment('"+snaptoken+"')");
                $('#pay-reg').prop("disabled", false);
            });
            request.fail(function (jqXHR, textStatus, errorThrown){
                // Log the error to the console
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
            });
        }
        function payment(snaptoken){
            snap.pay(snaptoken, {
                // Optional
                onSuccess: function(result) {
                    console.log(snaptoken)
                    console.log(result)
                    if (result.status_code == '200'){
                        request = $.ajax({
                            url: 'http://127.0.0.1:8000/api/v1/regcost-status',
                            type: "post",
                            data: {id:regcost_id}
                        });
                        request.done(function (response, textStatus, jqXHR){
                            window.location.href = "{{ route('registration.index')}}";
                        });
                        request.fail(function (jqXHR, textStatus, errorThrown){
                            // Log the error to the console
                            console.error(
                                "The following error occurred: "+
                                textStatus, errorThrown
                            );
                        });
                    }
                },
                // Optional
                onPending: function(result) {
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    console.log(result)
                }
            });
        }

        function deleteData(id) {
            let url = '{{ route("registration.destroy", ":id") }}';
            url     = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
