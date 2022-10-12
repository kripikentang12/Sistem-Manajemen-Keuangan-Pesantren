@extends('layouts.home')
@section('title_page','Syahriah (SPP) Santri')
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
            <a href="{{ route('syahriah.create') }}" class="btn btn-primary">Bayar Syahriah (SPP)</a><br><br>
        </div>
        <div class="col-md-4 mb-3">
            <form action="#" class="flex-sm">
                <div class="input-group">
                    <select class="form-control select2" name="year" id="year">
                        @for ($year = (int) date('Y'); 1900 <= $year; $year--)
                            <option value="{{ $year }}" @if ($year == $now) selected @endif>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary mr-2 rounded-right" type="submit"><i class="fas fa-search"></i></button>
                        <button onclick="window.location.href='{{ route('syahriah.index') }}'" type="button" class="btn btn-md btn-secondary rounded"><i class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr align="center">
                    <th colspan="14">{{ $now }}</th>
                </tr>
                <tr align="center">
                    <th width="5%">No</th>
                    <th class="w-25">Nama Santri</th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>May</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sep</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $syahriah => $result)
                    <tr align="center">
                        <td>{{ $syahriah + 1 }}</td>
                        <td><a href="{{ route('santri.show', $result->id) }}" target="blank">{{ $result->name }}</a></td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Jan')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Feb')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Mar')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Apr')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'May')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Jun')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Jul')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Aug')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Sep')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Oct')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Nov')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox" style="display: flex">
                                <input type="checkbox" class="custom-control-input" id="cbx-2" disabled @if (\App\Models\Syahriah::where('santri_id', $result->id)->where('month', 'Dec')->where('year', $now)->exists()) checked @endif>
                                <label class="custom-control-label" for="cbx-2"></label>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <br><br><br>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-8">
                <h4>Riwayat Pembayaran</h4>
            </div>
            <div class="col-md-4">
                <form action="#" class="flex-sm">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Search" value="{{ Request::get('keyword') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary mr-2 rounded-right" type="submit"><i class="fas fa-search"></i></button>
                            <button onclick="window.location.href='{{ route('syahriah.index') }}'" type="button" class="btn btn-md btn-secondary rounded"><i class="fas fa-sync-alt"></i></button>
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
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Tanggal Bayar</th>
                        <th>Status</th>
                        <th width="13%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($syahriahs as $syahriah => $result)
                        <tr>
                            <td>{{ $syahriah + $syahriahs->firstitem() }}</td>
                            <td><a href="{{ route('santri.show',$result->santris->id) }}" target="blank">{{ $result->santris->name }}</a></td>
                            <td>{{ $result->santris->address }}</td>
                            <td>{{ $result->month }}</td>
                            <td>{{ $result->year }}</td>
                            <td>{{ $result->date }}</td>
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
                                <a href="{{ route('syahriah.print', $result->id) }}" type="button" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-print"></i></a>
                                @endif
                                @if ($result->orders->payment_status == 1)
                                    <a href="javascript:void(0)" type="button" class="btn btn-sm btn-warning" id="pay-button" onclick="getSnapToken('{{$result->id}}')" data-id="{{$result->id}}" data-month="{{$result->month}}" data-year="{{$result->year}}" data-spp="{{number_format($result->spp, 2, ',', '.')}}" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-credit-card"></i></a>
                                @endif
                                @if (auth()->user()->role == 'Administrator')
                                    @if($result->orders->payment_status != 2)
                                        <a href="javascript:void(0)" id="btn-delete" class="btn btn-sm btn-danger" onclick="deleteData('{{ $result->id }}')" data-toggle="modal" data-target="#deleteSyahriahModal"><i class="fas fa-trash"></i></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-2 float-left">
            <span class="ml-3">Data Keseluruhan: <span class="text-primary font-weight-bold">{{ DB::table('syahriahs')->count() }}</span> Pembayaran Syahriah telah terdaftar.</span>
        </div>
        <div class="mt-3 float-right">
            {{ $syahriahs->links() }}
        </div>
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
                            <table>
                                <tr class="heading">
                                    <td>Item</td>

                                    <td>Biaya</td>
                                </tr>

                                <tr class="item">
                                    <td>SPP <span id="spp-month"></span> <span id="spp-year"></span></td>
                                    <td>Rp. <span id="spp-pay"></span></td>
                                </tr>

                                <tr class="total">
                                    <td></td>
                                    <td>Total: Rp. <span id="spp-tot"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="pay-syahriah" class="btn btn-info" disabled>Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="deleteSyahriahModal" tabindex="-1" role="dialog">
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
        var syahriah_id
        $(document).on("click", "#pay-button", function () {
            syahriah_id = $(this).data('id');
            var month = $(this).data('month');
            var year = $(this).data('year');
            var spp = $(this).data('spp');
            $("#spp-month").empty().append(month);
            $("#spp-year").empty().append(year);
            $("#spp-pay").empty().append(spp);
            $("#spp-tot").empty().append(spp);
        });

        var request;
        var syahriah
        function getSnapToken(id) {
            request = $.ajax({
                url: 'http://127.0.0.1:8000/api/v1/order',
                type: "post",
                data: {id:id}
            });
            request.done(function (response, textStatus, jqXHR){
                snaptoken = response.data.token
                $('#pay-syahriah').attr('onClick', "payment('"+snaptoken+"')");
                $('#pay-syahriah').prop("disabled", false);
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
                    console.log(result)
                    if (result.status_code == '200'){
                        request = $.ajax({
                            url: 'http://127.0.0.1:8000/api/v1/syahriah-status',
                            type: "post",
                            data: {id:syahriah_id}
                        });
                        request.done(function (response, textStatus, jqXHR){
                            window.location.href = "{{ route('syahriah.index')}}";
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
            let url = '{{ route("syahriah.destroy", ":id") }}';
            url     = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }
        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
