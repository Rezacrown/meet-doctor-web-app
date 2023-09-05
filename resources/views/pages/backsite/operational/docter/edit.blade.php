@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Docter')

@section('content')
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
            @if ($errors->any())
                <div class="mb-2 alert bg-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="mb-2 content-header-left col-md-6 col-12 breadcrumb-new">
                    <h3 class="mb-0 content-header-title d-inline-block">Edit Docter</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Docter</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="mb-0 list-inline">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Please complete the input <code>required</code>, before you click the submit button.</p>
                                        </div>
                                        <form class="form form-horizontal" action="{{ route("backsite.docter.update", [$docter->id]) }}" method="POST" enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-body">

                                                    <h4 class="form-section"><i class="fa fa-edit"></i> Form Docter</h4>

                                                    <div class="form-group row {{ $errors->has('specialist_id') ? 'has-error' : '' }}">
                                                        <label class="col-md-3 label-control">Specialist <code style="color:red;">required</code></label>
                                                        <div class="mx-auto col-md-9">
                                                            <select name="specialist_id"
                                                                    id="specialist_id"
                                                                    class="form-control select2" required>
                                                                    <option value="{{ '' }}" disabled selected>Choose</option>
                                                                @foreach($specialist as $key => $specialist_item)
                                                                    <option value="{{ $specialist_item->id }}" {{ $docter->specialist_id == $specialist_item->id ? 'selected' : '' }}>{{ $specialist_item->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @if($errors->has('specialist_id'))
                                                                <p style="font-style: bold; color: red;">{{ $errors->first('specialist_id') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="name">Name <code style="color:red;">required</code></label>
                                                        <div class="mx-auto col-md-9">
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="example dentist or dermatology" value="{{ old('name', isset($specialist) ? $docter->name : '') }}" autocomplete="off" required>

                                                            @if($errors->has('name'))
                                                                <p style="font-style: bold; color: red;">{{ $errors->first('name') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="fee">Fee <code style="color:red;">required</code></label>
                                                        <div class="mx-auto col-md-9">
                                                            <input type="text" id="fee" name="fee" class="form-control" placeholder="example fee 10000" value="{{ old('fee', isset($specialist) ? $docter->fee : '') }}" autocomplete="off" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': 0, 'prefix': 'IDR ', 'placeholder': '0'" required>

                                                            @if($errors->has('fee'))
                                                                <p style="font-style: bold; color: red;">{{ $errors->first('fee') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="photo">Photo <code style="color:green;">optional</code></label>
                                                        <div class="mx-auto col-md-9">
                                                            <div class="custom-file">
                                                                <input type="file" accept="image/png, image/svg, image/jpeg" class="custom-file-input" id="photo" name="photo">
                                                                <label class="custom-file-label" for="photo" aria-describedby="photo">Choose File</label>
                                                            </div>

                                                            <p class="text-muted"><small class="text-danger">Hanya dapat mengunggah 1 file</small><small> dan yang dapat digunakan JPEG, SVG, PNG & Maksimal ukuran file hanya 10 MegaBytes</small></p>

                                                            @if($errors->has('photo'))
                                                                <p style="font-style: bold; color: red;">{{ $errors->first('photo') }}</p>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="text-right form-actions">
                                                    <a href="{{ route('backsite.docter.index') }}" style="width:120px;" class="mr-1 text-white btn bg-blue-grey" onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                        <i class="ft-x"></i> Cancel
                                                    </a>
                                                    <button type="submit" style="width:120px;" class="btn btn-cyan" onclick="return confirm('Are you sure want to save this data ?')">
                                                        <i class="la la-check-square-o"></i> Submit
                                                    </button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
<!-- END: Content-->

@endsection


@push('after-script')

    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        $(function() {
            $(":input").inputmask();
        });
    </script>

@endpush
