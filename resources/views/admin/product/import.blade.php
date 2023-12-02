@extends('layouts.app', ['page_title'=>'Product'])

@section('content')
<div class="container">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    @if (Session::has('product-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('product-attribute') }}
    </div>
    @endif
    <!-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif -->
    <form class="form" id="productform" method="POST" action="{{ route('products.import') }}" enctype="multipart/form-data">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Import Products
                        <i class="mr-2"></i>
                        {{-- <small class="">Import Products .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    @csrf
                    <a href="{{ route('products.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>Save</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Produst`s Info:</h3>
                            <div class="form-group row">
                                <label class="col-3">Exel File</label>
                                <div class="col-9">
                                    <input id="upload" type=file name="files" class="form-control" onChange="handleFileSelect(this)" />
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Gst Rate</th>
                                    <th>Hsn Code</th>
                                    <th>Carton Capacity</th>
                                </thead>
                                <tbody id="questions_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    var ExcelToJSON = function() {
        this.parseExcel = function(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    // Here is your object
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    var json_object = JSON.stringify(XL_row_object);
                    XL_row_object.forEach(item => {
                        addNewQuestion(item)
                    })
                })
            };
            reader.onerror = function(ex) {
                console.log(ex);
            };
            reader.readAsBinaryString(file);
        };
    };

    function addNewQuestion(questionDetails = null) {
        let html = ``;
        html += `<tr>`;
        html += `<td><input type='text' class='form-control  ' name='name[]' placeholder='Enter Name' value="` + (questionDetails.Name ? questionDetails.Name : '') + `"></td>`;
        html += `<td><input type='text' class='form-control  ' name='short_name[]' placeholder='Enter Name' value="` + (questionDetails.St ? questionDetails.St : '') + `"></td>`;
        html += `<td><input type='text' class='form-control  ' name='category[]' placeholder='Enter Name' value="` + (questionDetails.cat ? questionDetails.cat : '') + `"></td>`;
        html += `<td><input type='text' class='form-control  ' name='price[]' placeholder='Enter Name' value="` + (questionDetails.MRP ? questionDetails.MRP : '') + `"></td>`;
        html += `<td><input type='text' class='form-control  ' name='gst_rate[]' placeholder='Enter Name' value="18"></td>`;
        html += `<td><input type='text' class='form-control  ' name='hsn_code[]' placeholder='Enter Name' value="39241090"></td>`;
        html += `<td><input type='text' class='form-control  ' name='carton_capacity[]' placeholder='Enter Name' value="` + (questionDetails.MASTER ? questionDetails.MASTER : '') + `"></td>`;
        html += `</tr>`;
        $('#questions_list').append(html);
    }

    function handleFileSelect(evt) {
        var files = event.target.files; // FileList object
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }
</script>
@endsection