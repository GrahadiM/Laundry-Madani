@extends('layouts.adm.base')
@section('title', trans('menu.role.title'))

@push('style')

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">

@endpush

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <!-- summernote -->
    <script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins') }}/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/dropify') }}/dist/js/dropify.min.js"></script>
    <script type="text/javascript">
        $(".summernote").summernote({
            height:200,
            callbacks: {
            // callback for pasting text only (no formatting)
                onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                bufferText = bufferText.replace(/\r?\n/g, '<br>');
                document.execCommand('insertHtml', false, bufferText);
                }
            }
        })
        $(".summernote").on("summernote.enter", function(we, e) {
            $(this).summernote("pasteHTML", "<br><br>");
            e.preventDefault();
        });
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
        $('.dropify').dropify({
            messages: {
                default: 'Pilih Gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
        $('.title').keyup(function(){
            var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g,'-');
            $('.slug').val(title);
        });
    </script>

@endpush
