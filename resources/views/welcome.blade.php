<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <form action="product_upload" method="POST">
            @method("POST")
            @csrf
            <label class="form-control-label" for="question_name">Upload question file</label>
            <input id="upload" type=file name="files[]" class="form-control" onChange="handleFileSelect(this)" />
            <table>
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
            <!-- <div id=" questions_list" class="row">
            </div> -->
            <button type="submit">save</button>

        </form>



        <form action="">
            <div class="col-8 form-group ">

            </div>
        </form>

    </div>
</body>
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

</html>